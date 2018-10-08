<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfirmOrderRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\ModelResource;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\SupplierPayment;
use App\Notifications\OrderConfirmation;
use DateTime;
use Notification;

class OrderController extends Controller
{

    public function __construct()
    {

    }


    public function all()
    {
        // all
        return ModelResource::collection(Order::paginate(config('main.JsonResultCount')));

        // all with relations
        //return ModelResource::collection((Order::with('company','setting'))->paginate(config('main.JsonResultCount')));

    }


    public function store(OrderRequest $request)
    {
        // order status on creation should be pending

        $order            = new Order;
        $msg              = '';
        $supplier_payment = SupplierPayment::where('supplier_id' , $request->supplier_id)->first();
        $available_credit = $supplier_payment->remaining_limit;

        if ($supplier_payment)
        {
            //if supplier payment type is credit
            if ($supplier_payment->payment_type == "credit")
            {

                $supplier_period_renewal = $supplier_payment->period_renewal;
                //get supplier credit period
                $supplier_credit_period = $supplier_payment->credit_period;
                //get available period for this supplier
                $available_until = date('d-m-Y' , strtotime($supplier_period_renewal . ' + ' . $supplier_credit_period . ' days'));
                //get the current date
                $current_date = date("d-m-Y");
                //compare the current date with the available period
                if (strtotime($current_date) > strtotime($available_until))
                {
                    $allow = false;
                    //no_enough_credit_period
                    //$msg='this supplier has no enough credit period to deliver this request.';
                    $msg = trans('main.no_enough_credit_period');

                } else
                {
                    //check credit if the supplier has available credit period
                    $products    = [];
                    $products_id = [];
                    $order->fill($request->all());
                    foreach ($request->products as $k => $v)
                    {
                        $products[$k]    = $v;
                        $products_id[$k] = $v['id'];

                        $order->total_qty              += $v['qty'];
                        $order->total_price_before_tax += ($v['qty'] * $v['price']);
                    }

                    $order->tax_val = ($order->total_price_before_tax * $order->tax / 100);
                    //the current order total price after tax
                    $order->total_price_after_tax = (double) $order->total_price_before_tax + $order->tax_val;
                    //get the available credit of this supplier

                    if ($order->total_price_after_tax < $available_credit)
                    {
                        //this supplier has available credit and can recieve more orders
                        $allow = true;
                    } else
                    {
                        //$msg='this supplier has no enough credit to deliver this request.';
                        //check if restrict is on or off
                        $restrict = $supplier_payment->restrict;
                        if ($restrict == 'on')
                        {
                            $allow = false;
                            $msg = trans('main.no_enough_credit_limit');
                        } else {
                            $allow = true;
                        }
                    }
                }
            } else
            {
                //payment type is cash not credit
                $allow = true;
            }

            if ($allow)
            {
                $today                     = new DateTime();
                $timestamp                 = $today->format('His');//
                $order->created_by_user_id = $request->user()->id;
                //there is unknown varaible ($order->number)
                $order->number = $timestamp . '-' . rand(10 , 1000);
                $order->save();
                $order->product()->sync($products_id);
                $supplier_payment->remaining_limit = $available_credit - $order->total_price_after_tax;
                $supplier_payment->save();

                // find order company users and send email

                $order = Order::find($order->id);
                $users = $order->outlet->brand->company->user;

                foreach ($users as $user)
                {

                    if ($user->setting->notifications == 'on') {
                        Notification::send($user, (new OrderConfirmation($order)));
                    }
                }
                return new ModelResource($order);
            } else
            {
                if ( ! $allow)
                {
                    //return the reason of not allowing submitting this order
                    return response([
                        'message' => $msg ,
                    ] , 200);
                }
            }
        } else
        {
            //it is not object
            return response([
                'message' => "supplier payment not found" ,
            ] , 422);

        }


    }


    public function show($id)
    {
        $order = Order::with('outlet' , 'product' , 'standing_order' , 'invoice')->find($id);

        if ($order === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }

        return new ModelResource($order);
    }


    public function update(OrderRequest $request , $id)
    {
        $products    = [];
        $products_id = [];

        $order = Order::find($id);
        if ($order === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }

        if ($order->status == "confirmed")
        {
            return response([
                'message' => trans('main.edit_not_allowed') ,
            ] , 422);
        }

        $order->update($request->all());

        $order->total_qty              = 0;
        $order->total_price_before_tax = 0;

        foreach ($request->products as $k => $v)
        {
            $products[$k]    = $v;
            $products_id[$k] = $v['id'];

            $order->total_qty              += $v['qty'];
            $order->total_price_before_tax += ($v['qty'] * $v['price']);
        }

        $order->tax_val               = ($order->total_price_before_tax * $order->tax / 100);
        $order->total_price_after_tax = (double) $order->total_price_before_tax + $order->tax_val;
        $order->updated_by_user_id    = $request->user()->id;

        $order->save();

        $order->product()->sync($products_id);

        return new ModelResource($order);

    }


    public function destroy($id)
    {
        $order = Order::find($id);
        if ($order === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }

        $products_id = [];

        foreach ($order->products as $k => $v)
        {
            $products_id[$k] = $v['id'];
        }

        $order->product()->detach($products_id);

        $order->delete();

        return response()->json([
            'status'  => 'Success' ,
            'message' => trans('main.deleted') ,
        ] , 200);
    }


    public function ConfirmOrder(ConfirmOrderRequest $request)

    {


        $order=Order::find($request->order_id);
        if ($order === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        if ($order->status == 'confirmed')
        {
            $msg='order is already confirmed !';
        }else{
            if ($order->deliverd_status == 'fully_delivered' ||  $order->deliverd_status == 'fully_delivered_with_bounce'){
                //you can make confirm
                $order->status = 'confirmed';
                $order->save();
                $invoice=new Invoice();
                $invoice->amount=$order->total_price_after_tax;
                $invoice->order_id=$request->order_id;
                $invoice->company_id=$order->supplier->company->id;
                $invoice->paid_amount = 0;
                $invoice->remaining_amount = $order->total_price_after_tax;
                $invoice->save();

                $msg= 'Order was confirmed successfully .';
            }else{
                //you can not make confirm
                $msg='This order is not delivered yet , so you can not confirm it . Try to contact your supplier.';

            }
        }

        return response([
            'message' => $msg,
        ], 200);

    }
}

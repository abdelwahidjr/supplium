<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectoryRequest;
use App\Http\Requests\SupplierRequest;
use App\Http\Resources\ModelResource;
use App\Models\Category;
use App\Models\Company;
use App\Models\Supplier;
use App\Models\SupplierPayment;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class SupplierController extends Controller
{

    public function __construct()
    {

    }


    ##################################################
    # API Functions
    ##################################################

    public function all()
    {
        // all
        return ModelResource::collection(Supplier::paginate(config('main.JsonResultCount')));

        // all with relations
        //return ModelResource::collection((Supplier::with('company','setting'))->paginate(config('main.JsonResultCount')));

    }

    public function SortSuppliersByName($type)
    {
        $types = ['asc' , 'desc'];
        if ( ! in_array($type , $types))
        {
            return response([
                'message' => 'Invalid sort type , available types are [ asc , desc ].' ,
            ] , 200);
        }
        $suppliers = Supplier::with('supplier_payment' , 'company' , 'brand' , 'order' , 'product')->orderBy('name' , $type)
            ->paginate(config('main.JsonResultCount'))->all();

        return new ModelResource($suppliers);
    }


    public function store(SupplierRequest $request)
    {
        $response_arr = [];
        $supplier     = new Supplier;

        $supplier->fill($request->all());
        $supplier->created_by_user_id = $request->user()->id;
        $supplier->save();

        $supplier_payment              = new SupplierPayment();
        $supplier_payment->supplier_id = $supplier->id;
        if ($request->input('payment_type') == 'cash')
        {
            $supplier_payment->payment_type       = $request->input('payment_type');
            $supplier_payment->created_by_user_id = $request->user()->id;
            $supplier_payment->save();
        } elseif ($request->input('payment_type') == 'credit')
        {
            $supplier_payment->fill($request->all());
            $supplier_payment->created_by_user_id = $request->user()->id;
            $supplier_payment->save();
        }

        return response([
            'supplier'         => $supplier ,
            'supplier payment' => $supplier_payment ,
        ] , 200);

    }


    public function show($id)
    {
        $supplier = Supplier::with('product' , 'supplier_payment' , 'company' , 'brand')->find($id);

        if ($supplier === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }

        return new ModelResource($supplier);
    }


    public function update(Request $request , $id)
    {
        $directory_option = ['on' , 'off'];
        $payment_type     = ['cash' , 'credit'];
        $restrict_arr     = ['on' , 'off'];
        $credit_period    = ['15' , '30' , '45' , '60' , '90'];

        $validator = Validator::make($request->all() , [
            "name"             => 'string|max:255' ,
            'email'            => 'unique:suppliers,email,' . $id . '|max:255' ,
            "phone"            => 'string|max:255' ,
            'address'          => 'string|max:255' ,
            'directory_option' => 'in:' . implode(',' , $directory_option) ,
            'category_id'      => 'exists:categories,id' ,
            'company_id'       => 'exists:companies,id' ,
            "payment_type"     => 'in:' . implode(',' , $payment_type) ,
            'credit_limit'     => 'numeric|max:1000000' ,
            'remaining_limit'  => 'numeric|max:1000000' ,
            "credit_period"    => 'in:' . implode(',' , $credit_period) ,
            "period_renewal"   => 'date' ,
            'payment_due_date' => 'numeric|min:1|max:30' ,
            'restrict'         => 'in:' . implode(',' , $restrict_arr) ,
        ]);

        if ($validator->fails())
        {
            return $validator->errors();
        }

        $supplier = Supplier::find($id);
        if ($supplier === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }
        $supplier->update($request->all());
        $supplier->updated_by_user_id = $request->user()->id;
        $supplier->save();

        $supplier_payment = SupplierPayment::where('supplier_id' , $supplier->id)->first();

        if ($request->input('payment_type') == 'cash')
        {
            $supplier_payment->payment_type       = $request->input('payment_type');
            $supplier_payment->updated_by_user_id = $request->user()->id;
            $supplier_payment->save();
        } elseif ($request->input('payment_type') == 'credit')
        {
            $supplier_payment->update($request->all());
            $supplier_payment->updated_by_user_id = $request->user()->id;
            $supplier_payment->save();
        }

        $brand_ids = [];

        foreach ($supplier->brand as $k => $v)
        {
            $brand_ids[$k] = $v['id'];
        }

        $supplier->brand()->sync($brand_ids);

        return response([
            'supplier'         => $supplier ,
            'supplier payment' => $supplier_payment ,
        ] , 200);
    }


    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        if ($supplier === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }

        $brand_ids = [];

        foreach ($supplier->brand as $k => $v)
        {
            $brand_ids[$k] = $v['id'];
        }

        $supplier->brand()->detach($brand_ids);

        $supplier->delete();

        return response()->json([
            'status'  => 'Success' ,
            'message' => trans('main.deleted') ,
        ] , 200);
    }


    public function directory(DirectoryRequest $request)
    {
        //file columns ['name','email','phone','address','category_name','company_name']

        $path = $request->file->getRealPath();
        $data = Excel::load($path , function ($reader)
        {
        })->get();

        if ( ! empty($data) && $data->count())
        {

            foreach ($data as $key => $value)
            {

                $supplier = Supplier::where('email' , $value->email)->first();
                $category = Category::where('name' , $value->category_name)->first();
                $company  = Company::where('name' , $value->company_name)->first();

                if ($supplier)
                {
                    return response([
                        'message'       => "file columns ['name','email','phone','address','category_name','company_name']" ,
                        'message:error' => $value->email . " supplier already exists" ,
                    ] , 422);

                }

                if ( ! $category)
                {
                    return response([
                        'message'       => "file columns ['name','email','phone','address','category_name','company_name']" ,
                        'message:error' => $value->category_name . " category not found" ,
                    ] , 422);

                }

                if ( ! $company)
                {
                    return response([
                        'message'       => "file columns ['name','email','phone','address','category_name','company_name']" ,
                        'message:error' => $value->company_name . " company not found" ,
                    ] , 422);

                }

                $insert[] = [
                    'name'             => $value->name ,
                    'email'            => $value->email ,
                    'phone'            => $value->phone ,
                    'address'          => $value->address ,
                    'category_id'      => $category->id ,
                    'company_id'       => $company->id ,
                    'directory_option' => 'on' ,
                ];
            }

            if ( ! empty($insert))
            {
                DB::table('suppliers')->insert($insert);

                return response([
                    'message:success' => "file data saved!" ,
                ] , 422);

            } else
            {
                return response([
                    'message'       => "file columns ['name','email','phone','address','category_name','company_name']" ,
                    'message:error' => "file data not saved!, please check the file data" ,
                ] , 422);
            }


        }

        return response([
            'message'       => "file columns ['name','email','phone','address','category_name','company_name']" ,
            'message:error' => "empty data" ,
        ] , 422);
    }


    ##################################################
    # Web Functions
    ##################################################

    public function web_all()
    {

        $name = 'sampa';

        dd($name);

    }


    public function web_create()
    {


    }

    public function web_store(Request $request)
    {


    }


    public function web_show($id)
    {

    }


    public function web_edit($id)
    {


    }


    public function web_update(Request $request , $id)
    {

    }


    public function web_destroy($id)
    {


    }
}

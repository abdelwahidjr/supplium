<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectoryRequest;
use App\Http\Requests\SupplierRequest;
use App\Http\Resources\ModelResource;
use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\SupplierPayment;
use DB;
use Session;
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
        $supplier = new Supplier;

        $supplier->fill($request->all());
        $supplier->created_by_user_id = $request->user()->id;
        $supplier->save();

        $supplier_payment = new SupplierPayment();

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

        $products = $request->input('products');

        foreach ($products as $product)
        {
            Product::create($product);
        }

        return response([
            'supplier'         => $supplier ,
            'supplier payment' => $supplier_payment ,
            'products'         => $products ,
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
        $payment_type  = ['cash' , 'credit'];
        $restrict_arr  = ['on' , 'off'];
        $credit_period = ['15' , '30' , '45' , '60' , '90'];

        $validator = Validator::make($request->all() , [
            "name"             => 'string|max:255' ,
            'email'            => 'unique:suppliers,email,' . $id . '|max:255' ,
            "phone"            => 'string|max:255' ,
            'address'          => 'string|max:255' ,
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
                    'name'        => $value->name ,
                    'email'       => $value->email ,
                    'phone'       => $value->phone ,
                    'address'     => $value->address ,
                    'category_id' => $category->id ,
                    'company_id'  => $company->id ,
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

        $data['suppliers'] =  Supplier::with('product' , 'supplier_payment' , 'company' , 'brand')->get();
        return view('dashboard.suppliers.show' , $data);
    }


    public function web_create(){
       $data['categories'] = Category::orderBy('id','ASC')->get();
        return view('dashboard.suppliers.add' , $data);
    }

    public function web_store(Request $request)
    {

        $supplier = new Supplier;

        $supplier->fill($request->all());
        $supplier->created_by_user_id = $request->user()->id;
        $supplier->save();

        $supplier_payment = new SupplierPayment();

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

        $products = $request->input('products');

        foreach ($products as $k=>$product_val)
        {
            if($product_val['sku'] != null){
                $product = new Product();
                $product->supplier_id = $supplier->id;
                $product->category_id = $request->category_id;
                $product->sku = $product_val['sku'];
                $product->name = $product_val['name'];
                $product->unit = $product_val['unit'];
                $product->price = $product_val['price'];
                $product->save();
            }
            
        }

        return response([
            'success'         => true,
            'supplier'         => $supplier ,
            'supplier payment' => $supplier_payment ,
            'products'         => $products ,
        ] , 200);

    }
    
    
     public function web_edit_info($id)
    {
         $data['categories'] = Category::orderBy('id','ASC')->get();
         $data['supplier'] = Supplier::find($id);
        return view('dashboard.suppliers.edit_info' , $data);
    }
    
    public function web_update_info(Request $request , $id)
    {
        $supplier = Supplier::find($id);
         $supplier->fill($request->all());
         $supplier->save();
         Session::flash('success_message', 'Update Successfully');
         return redirect(url('public/supplier/all'));
    }
    
    public function web_edit_payment($id)
    {
        $data['supplier'] = SupplierPayment::where('supplier_id',$id)->first();
        return view('dashboard.suppliers.edit_payment' , $data);
    }
    
     public function web_update_payment(Request $request , $id)
    {
         // $supplier_payment = SupplierPayment::where('supplier_id',$id)->first();

          // $supplier_payment->payment_type = 'cash';// $request->input('payment_type');
           if($request->payment_type == 'cash'){
              $request->credit_limit = '';
              $request->credit_period = '';
              $request->payment_due_date = '';
          }
          
          $request_data = [
              'credit_limit' =>  $request->credit_limit, 
              'credit_period' =>  $request->credit_period, 
              'payment_due_date' =>  $request->payment_due_date, 
              'payment_type' =>  $request->payment_type, 
          ];
          
          SupplierPayment::where('supplier_id',$id)->update($request_data);
          Session::flash('success_message', 'Update Successfully');
         return redirect(url('public/supplier/all'));
    }
    
    public function web_edit_products($id)
    {
        $data['categories'] = Category::orderBy('id','ASC')->get();
        $data['supplier'] = Supplier::find($id);
        return view('dashboard.suppliers.edit_products' , $data);
    }
    
     public function web_update_products(Request $request , $id)
    {
        // dd($id);
         $products = $request->products;

        foreach ($products as $k=>$product_val)
        {
            
            if($product_val['product_id'] != null){
                $product = Product::find($product_val['product_id']);
            }else{
                $product = new Product();
                $product->supplier_id = $id;
            }
            if($product_val['sku'] != null){
                //$product->supplier_id = $id;
                $product->category_id = 1;
                $product->sku = $product_val['sku'];
                $product->name = $product_val['name'];
                $product->unit = $product_val['unit'];
                $product->price = $product_val['price'];
                $product->save();
            }
            
        }
        return response(['success'=>true],200);
    }
    
      public function web_get_products($id)
    {
        $products = Product::where('supplier_id',$id)->get();
        $product_arr = [];
        foreach($products as $k=>$product){
           // $product_arr[$k] = $k+1;
            $product_arr[$k][] = $product->sku;
            $product_arr[$k][] = $product->name;
            $product_arr[$k][] = $product->unit;
            $product_arr[$k][] = $product->price;
            $product_arr[$k][] = $product->id;
        }
        
         return response($product_arr , 200);
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
        $destory = Supplier::destroy($id);
        if($destory == TRUE){
                return response([
                'status'         => 'success',
            ] , 200);
        }else{
            return response([
                'status'         => 'fail',
            ] , 200);
        }
        

    }
}

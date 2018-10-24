<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Resources\ModelResource;
use App\Models\Company;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    public function __construct()
    {

    }


    public function all()
    {
        // all
        return ModelResource::collection(Company::paginate(config('main.JsonResultCount')));

        // all with relations
        //return ModelResource::collection((Company::with('company','setting'))->paginate(config('main.JsonResultCount')));

    }


    public function store(CompanyRequest $request)
    {
        $company = new Company;
        $company->fill($request->all());
        $company->created_by_user_id = $request->user()->id;
        $company->save();

        return new ModelResource($company);
    }


    public function show($id)
    {

        $Company = Company::with('brand' , 'users' , 'supplier' , 'invoice' , 'plan')->find($id);

        if ($Company === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }

        return new ModelResource($Company);
    }


    public function update(CompanyRequest $request , $id)
    {
        $company = Company::find($id);
        if ($company === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }
        $company->update($request->all());
        $company->updated_by_user_id = $request->user()->id;
       /* $user_ids                    = [];

        foreach ($company->user as $k => $v)
        {
            $user_ids[$k] = $v['id'];
        }

        $company->user()->sync($user_ids);*/
        $company->save();

        return new ModelResource($company);
    }


    public function destroy($id)
    {
        $company = Company::find($id);
        if ($company === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }

      /*  $user_ids = [];

        foreach ($company->user as $k => $v)
        {
            $user_ids[$k] = $v['id'];
        }

        $company->user()->detach($user_ids);*/

        $company->delete();

        return response()->json([
            'status'  => 'Success' ,
            'message' => trans('main.deleted') ,
        ] , 200);
    }



    public function web_company_invoices()
    {
        $company_id = Auth::user()->company->id;
        $invoices=Invoice::where('company_id',$company_id)->get();
        $total_amount=Invoice::where('company_id',$company_id)->sum('amount');
        $paid_amount=Invoice::where('company_id',$company_id)->sum('paid_amount');
        $remaining_amount=Invoice::where('company_id',$company_id)->sum('remaining_amount');

        return view('dashboard.profile.invoices',['invoices'=>$invoices,'total_amount'=>$total_amount,'paid_amount'=>$paid_amount,'remaining_amount'=>$remaining_amount]);
    }
}

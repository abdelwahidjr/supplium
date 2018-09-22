<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Resources\ModelResource;
use App\Models\Company;

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

        $Company = Company::with('brand', 'user', 'supplier', 'invoice')->find($id);

        if ($Company === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        return new ModelResource($Company);
    }


    public function update(CompanyRequest $request, $id)
    {
        $company = Company::find($id);
        if ($company === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }
        $company->update($request->all());
        $company->updated_by_user_id = $request->user()->id;
        $company->save();

        return new ModelResource($company);
    }


    public function destroy($id)
    {
        $company = Company::find($id);
        if ($company === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }
        $company->delete();

        return response()->json([
            'status'  => 'Success',
            'message' => trans('main.deleted'),
        ], 200);
    }


}

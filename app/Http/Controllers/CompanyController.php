<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{


    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function all()
    {
        // all
       // return CompanyResource::collection(Company::paginate(config('main.JsonResultCount')));

        //all with relations
       return CompanyResource::collection((Company::with('brand','user','brand.outlet'))->paginate(config('main.JsonResultCount')));


    }


    public function show($id)
    {

        $Company = Company::with('brand','brand.outlet')->find($id);

        if ($Company === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        return new CompanyResource($Company);
    }



}

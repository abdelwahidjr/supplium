<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierDirectoryRequest;
use App\Http\Requests\SupplierDirectoryRequest;
use App\Http\Requests\UpdateSupplierDirectoryRequest;
use App\Http\Resources\ModelResource;
use App\Models\SupplierDirectory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class SupplierDirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return ModelResource::collection(SupplierDirectory::paginate(config('main.JsonResultCount')));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplierDirectoryRequest $request)
    {
        $extension = $request->image->getClientOriginalExtension();
        $sha1 = sha1($request->image->getClientOriginalName());
        $filename = date('Y-m-d-h-i-s') . "_" . $sha1;
        Storage::disk('supplier_directories')->put($filename . "." . $extension, File::get($request->image));

        $supplierDirectory = new SupplierDirectory();
        $supplierDirectory->segment = $request->segment;
        $supplierDirectory->name = $request->name;
        $supplierDirectory->logo = 'storage/images/supplier_directories/' . $filename . "." . $extension;
        $supplierDirectory->contact_person = $request->contact_person;
        $supplierDirectory->position = $request->position;
        $supplierDirectory->phone_number = $request->phone_number;
        $supplierDirectory->mobile_number = $request->mobile_number;
        $supplierDirectory->email = $request->email;
        $supplierDirectory->website = $request->website;
        $supplierDirectory->address = $request->address;
        $supplierDirectory->operation_areas = $request->operation_areas;
        $supplierDirectory->created_by_user_id = $request->user()->id;
        $supplierDirectory->save();

        return new ModelResource($supplierDirectory);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SupplierDirectory $supplierDirectory
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier_directory = SupplierDirectory::find($id);
        if ($supplier_directory === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        return new ModelResource($supplier_directory);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\SupplierDirectory $supplierDirectory
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupplierDirectoryRequest $request, $id)
    {

        $supplier_directory = SupplierDirectory::find($id);
        if ($supplier_directory === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        if ($request->name != null) {
            if (SupplierDirectory::where('id', '!=', $id)->where('name', $request->name)->exists()) {
                return response([
                    'message' => 'This name is already taken !',
                ], 200);
            } else {
                $supplier_directory->name = $request->name;
            }

        }

        if ($request->email != null) {
            if (SupplierDirectory::where('id', '!=', $id)->where('email', $request->email)->exists()) {
                return response([
                    'message' => 'This email is already taken !',
                ], 200);
            } else {
                $supplier_directory->email = $request->email;
            }

        }
        //if user update image
        if ($request->image != null) {
            $extension = $request->image->getClientOriginalExtension();
            $sha1 = sha1($request->image->getClientOriginalName());
            $filename = date('Y-m-d-h-i-s') . "_" . $sha1;
            Storage::disk('supplier_directories')->put($filename . "." . $extension, File::get($request->image));
            //put your base url to retrieve images
            $supplier_directory->logo = 'storage/images/supplier_directories/' . $filename . "." . $extension;
        }

        $supplier_directory->update($request->all());
        $supplier_directory->updated_by_user_id = $request->user()->id;
        $supplier_directory->save();

        return new ModelResource($supplier_directory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SupplierDirectory $supplierDirectory
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier_directory = SupplierDirectory::find($id);
        if ($supplier_directory === null) {
            return response([
                'message' => trans('main.null_entity'),
            ], 422);
        }

        $supplier_directory->delete();

        return response()->json([
            'status' => 'Success',
            'message' => trans('main.deleted'),
        ], 200);
    }

    /**
     * @param SupplierDirectoryRequest $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function directory(SupplierDirectoryRequest $request)
    {
        $error_messages = [];
        $path = $request->file->getRealPath();
        $data = Excel::load($path, function ($reader) {
        })->get();

        if (!empty($data) && $data->count()) {
            foreach ($data as $key => $value) {


                if (SupplierDirectory::where('name', $value->supplier_name)->exists()) {
                    array_push($error_messages, 'This name ' . $value->supplier_name . ' is already taken !');

                } else {
                    if (SupplierDirectory::where('email', $value->e_mail)->exists()) {
                        array_push($error_messages, 'This email ' . $value->e_mail . ' is already taken !');

                    } else {

                        $insert[] = [
                            'segment' => $value->segment,
                            'name' => $value->supplier_name,
                            'logo' => $value->logo,
                            'contact_person' => $value->contact_person,
                            'position' => $value->position,
                            'phone_number' => $value->phone_number,
                            'mobile_number' => $value->mobile_number,
                            'email' => $value->e_mail,
                            'website' => $value->website,
                            'address' => $value->address,
                            'operation_areas' => $value->operation_areas,
                        ];
                    }
                }
            }

            if (!empty($insert)) {
                DB::table('supplier_directories')->insert($insert);

                return response([
                    'message:success' => "suppliers records stored successfully ! . Note that some of records may be not stored so check if there is any errors in response .",
                    'message:error' => $error_messages,
                ], 200);

            } else {
                return response([
                    'message:error' => $error_messages,
                ], 200);
            }

        }

        return response([
            'message' => "file columns ['segment' 
            ,'name' ,
             'logo' ,
            'contact_person' ,
            'position' ,
            'phone_number',
            'mobile_number',
            'email',
            'website',
            'address',
            'operation_areas',
             ]",
            'message:error' => "Empty data",
        ], 422);
    }

    /**
     * @param $type
     *
     * @return ModelResource|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function SortSupplierDirectories($type)
    {
        $types = ['asc', 'desc'];
        if (!in_array($type, $types)) {
            return response([
                'message' => 'Invalid sort type , available types are [ asc , desc ].',
            ], 200);
        }
        $directories = SupplierDirectory::orderBy('name', $type)
            ->paginate(config('main.JsonResultCount'))->all();

        return new ModelResource($directories);
    }


    public function web_create()
    {
        return view('dashboard.supplier_directory.new');
    }


    public function web_directory(SupplierDirectoryRequest $request)
    {
        $path = $request->file->getRealPath();
        $data = Excel::load($path, function ($reader) {
        })->get();

        if (!empty($data) && $data->count()) {
            foreach ($data as $key => $value) {

                if (!isset($value->supplier_name) || !isset($value->segment) || !isset($value->logo)
                    || !isset($value->contact_person) || !isset($value->position) || !isset($value->phone_number)
                    || !isset($value->mobile_number) || !isset($value->e_mail) || !isset($value->website)
                    || !isset($value->address) || !isset($value->operation_areas)) {
                    return redirect()->back()->with('error', 'Invalid content of file !');
                }

                if (SupplierDirectory::where('name', $value->supplier_name)->exists()) {
                    return redirect()->back()->with('error', 'This name ' . $value->supplier_name . ' is already taken !');

                } else {
                    if (SupplierDirectory::where('email', $value->e_mail)->exists()) {
                        return redirect()->back()->with('error', 'This email ' . $value->e_mail . ' is already taken !');
                    } else {

                        $insert[] = [
                            'segment' => $value->segment,
                            'name' => $value->supplier_name,
                            'logo' => $value->logo,
                            'contact_person' => $value->contact_person,
                            'position' => $value->position,
                            'phone_number' => $value->phone_number,
                            'mobile_number' => $value->mobile_number,
                            'email' => $value->e_mail,
                            'website' => $value->website,
                            'address' => $value->address,
                            'operation_areas' => $value->operation_areas,
                        ];
                    }
                }
            }

            if (!empty($insert)) {
                DB::table('supplier_directories')->insert($insert);

                return redirect()->back()->with('success', 'Suppliers records stored successfully !');

            } else {
                return redirect()->back()->with('error', 'Failed to store products.');

            }

        }

        return redirect()->back()->with('error', 'Empty data , Please check it and try again !');

    }

}

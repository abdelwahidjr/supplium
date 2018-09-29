<?php

namespace App\Http\Controllers;

use App\Http\Requests\SOABrandRequest;
use App\Http\Requests\SOADateRequest;
use App\Http\Requests\SOAOutletRequest;
use App\Http\Requests\SOASupplierRequest;
use App\Http\Resources\ModelResource;
use App\Models\Invoice;
use App\Models\SupplierPayment;

class SOAController extends Controller
{

    public function __construct()
    {

    }


    public function all()
    {
        // all
        return ModelResource::collection(SupplierPayment::with(['supplier.order.invoice'])
            ->paginate(config('main.JsonResultCount')));

    }

    public function brand(SOABrandRequest $request)
    {
        // filter by brand
        $brand_id = $request->brand_id;

        return ModelResource::collection(Invoice::with(['order.supplier.supplier_payment'])
            ->whereHas('order.outlet.brand' , function ($query) use ($brand_id)
            {
                $query->where('brands.id' , '=' , $brand_id);
            })
            ->paginate(config('main.JsonResultCount')));
    }


    public function supplier(SOASupplierRequest $request)
    {
        // filter by supplier
        $supplier_id = $request->supplier_id;

        return ModelResource::collection(Invoice::with(['order.supplier.supplier_payment'])
            ->whereHas('order.supplier' , function ($query) use ($supplier_id)
            {
                $query->where('suppliers.id' , '=' , $supplier_id);
            })
            ->paginate(config('main.JsonResultCount')));
    }


    public function date(SOADateRequest $request)
    {
        // filter by date
        $start_date = $request->start_date;
        $end_date   = $request->end_date;

        return ModelResource::collection(Invoice::with(['order.supplier.supplier_payment'])
            ->whereDate('invoices.created_at' , '>=' , $start_date)
            ->whereDate('invoices.created_at' , '<=' , $end_date)
            ->paginate(config('main.JsonResultCount')));
    }


    public function outlet(SOAOutletRequest $request)
    {
        // filter by outlet
        $outlet_id = $request->outlet_id;

        return ModelResource::collection(Invoice::with(['order.supplier.supplier_payment'])
            ->whereHas('order.outlet' , function ($query) use ($outlet_id)
            {
                $query->where('outlets.id' , '=' , $outlet_id);
            })
            ->paginate(config('main.JsonResultCount')));
    }

}

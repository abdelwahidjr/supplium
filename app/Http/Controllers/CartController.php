<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Http\Resources\ModelResource;
use App\Models\Cart;

class CartController extends Controller
{
    public function __construct()
    {

    }


    public function all()
    {
        // all
        return ModelResource::collection(Cart::paginate(config('main.JsonResultCount')));

        // all with relations
        //return ModelResource::collection((Cart::with('company','setting'))->paginate(config('main.JsonResultCount')));

    }


    public function store(CartRequest $request)
    {
        $cart = new Cart;
        $cart->fill($request->all());
        $cart->created_by_user_id = $request->user()->id;
        $cart->save();

        return new ModelResource($cart);
    }


    public function show($id)
    {
        $cart = Cart::with('outlet' , 'product')->find($id);

        if ($cart === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }

        return new ModelResource($cart);
    }


    public function update(CartRequest $request , $id)
    {
        $cart = Cart::find($id);
        if ($cart === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }
        $cart->update($request->all());
        $cart->updated_by_user_id = $request->user()->id;
        $cart->save();

        return new ModelResource($cart);
    }


    public function destroy($id)
    {
        $cart = Cart::find($id);
        if ($cart === null)
        {
            return response([
                'message' => trans('main.null_entity') ,
            ] , 422);
        }
        $cart->delete();

        return response()->json([
            'status'  => 'Success' ,
            'message' => trans('main.deleted') ,
        ] , 200);
    }
}

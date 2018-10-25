@extends('layouts.shared')

@section('content')



    <!--start data table-->

    <div class="row">
        <div class="col-12 col-sm-12">
            <div class="row mb-4">
                <div class="col-12 col-md-12">
                    <div class="card redial-border-light redial-shadow mb-4">
                        <div class="card-body">
                            <h6 class="header-title pl-3 redial-relative">Previous Orders</h6>
                            <table id="example" class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Supplier</th>
                                    <th>Delivery Status</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Outlet</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Supplier</th>
                                    <th>Delivery Status</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Outlet</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($previous_orders as $order)
                                    <tr>
                                        <td>{{$order->number}}</td>
                                        <td>{{$order->supplier->name}}</td>
                                        <td>
                                            <span class="badge badge-danger text-white">{{$order->delivery_status}}</span>
                                        </td>
                                        </td>
                                        <td>{{$order->total_price_after_tax}}</td>
                                        <td>
                                            <span class="badge badge-primary text-white">{{$order->status}}</span></td>
                                        </td>
                                        <td>{{$order->outlet->name}}</td>

                                    </tr>

                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--end data table-->
@endsection

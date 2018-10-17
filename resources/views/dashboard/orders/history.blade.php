@extends('layouts.shared')

@section('content')
    <div style="display: inline-block">
        <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-xl-0">
            <div class="card redial-border-light redial-shadow">
                <div class="card-body">
                    <div class="media d-block d-sm-flex text-center text-sm-left">
                        <div class="d-md-flex align-self-center mx-auto mb-4 mb-sm-0 mr-0 mr-sm-3 spark6"></div>
                        <div class="media-body">
                            <div class="fact-box1 text-center text-sm-right">
                                <h2 class="counter_number mb-1 redial-font-weight-400">{{$total_suppliers}}</h2>
                                <p class="mb-2">Total Suppliers</p>
                                <div class="chart sparkline spark4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-xl-0">
            <div class="card redial-border-light redial-shadow">
                <div class="card-body">
                    <div class="media d-block d-sm-flex text-center text-sm-left">
                        <div class="d-md-flex align-self-center mx-auto mb-4 mb-sm-0 mr-0 mr-sm-3 spark6"></div>
                        <div class="media-body">
                            <div class="fact-box1 text-center text-sm-right">
                                <h2 class="counter_number mb-0 redial-font-weight-400">{{$order_count}}</h2>
                                <p class="mb-2">Total Orders</p>
                                <div class="chart sparkline spark4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4 col-xl-3 mb-4 mb-xl-0">
            <div class="card redial-border-light redial-shadow">
                <div class="card-body">
                    <div class="media d-block d-sm-flex text-center text-sm-left">
                        <div class="d-md-flex align-self-center mx-auto mb-4 mb-sm-0 mr-0 mr-sm-3 spark6"></div>
                        <div class="media-body">
                            <div class="fact-box2 text-center text-sm-right">
                                <h2 class="counter_number mb-0 redial-font-weight-400" style="display: inline">{{round($total_purchases/1000,2)}}</h2>
                                <p class="mb-2">Total Purchases</p>
                                <div class="chart sparkline spark4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-xl-0">
            <div class="card redial-border-light redial-shadow">
                <div class="card-body">
                    <div class="media d-block d-sm-flex text-center text-sm-left">
                        <div class="d-md-flex align-self-center mx-auto mb-4 mb-sm-0 mr-0 mr-sm-3 spark6"></div>
                        <div class="media-body">
                            <div class="fact-box1 text-center text-sm-right">
                                <h2 class="counter_number mb-0 redial-font-weight-400">{{$total_items}}</h2>
                                <p class="mb-2">Total Items</p>
                                <div class="chart sparkline spark4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


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
                                        <td>{{$order->delivery_status}}</td>
                                        <td>{{$order->total_price_after_tax}}</td>
                                        <td>{{$order->status}}</td>
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

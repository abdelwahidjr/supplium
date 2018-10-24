@extends('layouts.shared')

@section('content')


    <!--start data table-->

    <div class="row">
        <div class="col-12 col-sm-12">
            <div class="row mb-4">
                <div class="col-12 col-md-12">
                    <div class="card redial-border-light redial-shadow mb-4">
                        <div class="card-body">
                            <a href="{{route('standing.new')}}" style="color: white" class="btn btn-primary pull-right"><i class="icofont icofont-plus-square"></i> New</a>

                            <h6 class="header-title pl-3 redial-relative">Standing Orders</h6>


                            <table id="example" class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Repeated Days</th>
                                    <th>Repeated Period</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Repeated Days</th>
                                    <th>Repeated Period</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($standing_orders as $order)
                                    <tr>
                                        <td>{{$order->standing_order_name}}</td>
                                        <td>{{$order->standing_order_status}}</td>
                                        <td>{{$order->standing_order_start_date}}</td>
                                        <td>{{$order->standing_order_end_date}}</td>
                                        <td>
                                            [ @foreach($order->standing_order_repeated_days as $day)
                                                {{$day." , " }}
                                            @endforeach
                                            ]
                                        </td>

                                        <td>
                                            {{$order->standing_order_repeated_period}}
                                        </td>


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

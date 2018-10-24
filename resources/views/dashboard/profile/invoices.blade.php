@extends('layouts.shared')

@section('content')
    <div style="display: inline-block">


        <div class="col-12 col-sm-6 col-xl-4 mb-4 mb-xl-0">
            <div class="card redial-bg-pink redial-border-pink redial-shadow text-white">
                <div class="card-body">
                    <div class="media d-block d-sm-flex text-center text-sm-left">
                        <div class="d-md-flex align-self-center mx-auto mb-4 mb-sm-0 mr-0 mr-sm-3 spark10"></div>
                        <div class="media-body">
                            <div class="fact-box3 text-center text-sm-right">
                                <h2 class="counter_number mb-1 redial-font-weight-400 text-white">{{$total_amount}} </h2>
                                <p class="mb-2">Total Amount</p>
                                <div class="chart sparkline spark5"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4 mb-4 mb-xl-0">
            <div class="card redial-bg-success redial-border-success redial-shadow text-white">
                <div class="card-body">
                    <div class="media d-block d-sm-flex text-center text-sm-left">
                        <div class="d-md-flex align-self-center mx-auto mb-4 mb-sm-0 mr-0 mr-sm-3 spark10"></div>
                        <div class="media-body">
                            <div class="fact-box3 text-center text-sm-right">
                                <h2 class="counter_number mb-1 redial-font-weight-400 text-white">{{$paid_amount}} </h2>
                                <p class="mb-2">Paid</p>
                                <div class="chart sparkline spark5"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-12 col-sm-6 col-xl-4 mb-4 mb-xl-0">
            <div class="card redial-border-primary redial-shadow redial-bg-primary text-white">
                <div class="card-body">
                    <div class="media d-block d-sm-flex text-center text-sm-left">
                        <div class="d-md-flex align-self-center mx-auto mb-4 mb-sm-0 mr-0 mr-sm-3 spark10"></div>
                        <div class="media-body">
                            <div class="fact-box3 text-center text-sm-right">
                                <h2 class="counter_number mb-1 redial-font-weight-400 text-white">{{$remaining_amount}}</h2>
                                <p class="mb-2">Remaining</p>
                                <div class="chart sparkline spark5"></div>
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
                            <h6 class="header-title pl-3 redial-relative">Previous Invoices</h6>
                            <table id="example" class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Amount</th>
                                    <th>Paid Amount</th>
                                    <th>Remaining Amount</th>
                                    <th>Order Sku</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Amount</th>
                                    <th>Paid Amount</th>
                                    <th>Remaining Amount</th>
                                    <th>Order Sku</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($invoices as $invoice)
                                    <tr>
                                        <td>{{$invoice->id}}</td>
                                        <td>{{$invoice->amount}}</td>
                                        <td>{{$invoice->paid_amount}}</td>
                                        <td>{{$invoice->remaining_amount}}</td>
                                        <td>{{$invoice->order->number}}</td>

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


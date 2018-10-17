@extends('layouts.shared')

@section('content')
    <div style="display: inline-block">

        <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-xl-0">
            <div class="card redial-bg-pink redial-border-pink redial-shadow text-white">
                <div class="card-body">
                    <div class="media d-block d-sm-flex text-center text-sm-left">
                        <div class="d-md-flex align-self-center mx-auto mb-4 mb-sm-0 mr-0 mr-sm-3 spark10"></div>
                        <div class="media-body">
                            <div class="fact-box1 text-center text-sm-right">
                                <h2 class="counter_number mb-1 redial-font-weight-400 text-white">{{$total_suppliers}} </h2>
                                <p class="mb-2">Total Suppliers</p>
                                <div class="chart sparkline spark5"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-xl-0">
            <div class="card redial-border-primary redial-shadow redial-bg-primary text-white">
                <div class="card-body">
                    <div class="media d-block d-sm-flex text-center text-sm-left">
                        <div class="d-md-flex align-self-center mx-auto mb-4 mb-sm-0 mr-0 mr-sm-3 spark10"></div>
                        <div class="media-body">
                            <div class="fact-box1 text-center text-sm-right">
                                <h2 class="counter_number mb-1 redial-font-weight-400 text-white">{{$order_count}}</h2>
                                <p class="mb-2">Total Orders</p>
                                <div class="chart sparkline spark5"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-xl-0">
            <div class="card redial-bg-success redial-border-success redial-shadow text-white">
                <div class="card-body">
                    <div class="media d-block d-sm-flex text-center text-sm-left">
                        <div class="d-md-flex align-self-center mx-auto mb-4 mb-sm-0 mr-0 mr-sm-3 spark10"></div>
                        <div class="media-body">
                            <div class="fact-box2 text-center text-sm-right">
                                <h2 class="counter_number mb-1 redial-font-weight-400 text-white">{{round($total_purchases/1000,2)}} </h2>
                                <p class="mb-2">Total Purchases</p>
                                <div class="chart sparkline spark5"></div>
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


    <div class="col-12 col-md-6">
        <div class="card redial-border-light redial-shadow">
            <div class="card-body">
                <h6 class="header-title pl-3 redial-relative">Pie Chart</h6>
                <canvas id="pie"></canvas>
            </div>
        </div>
    </div>



@endsection


@section('extra')
    <script>
        if ($('#pie').length > 0)
        {
            var ctx4 = document.getElementById("pie").getContext("2d");


            var data4 = [
                {
                    value: 300,
                    color: "#2e5aef",
                    highlight: "#2e5aef",
                    label: "Light blue"
                },
                {
                    value: 50,
                    color: "#577bf4",
                    highlight: "#577bf4",
                    label: "blue light"
                },
                {
                    value: 100,
                    color: "#0032d9",
                    highlight: "#0032d9",
                    label: "Dark Blue"
                }
            ];

            var myPieChart = new Chart(ctx4).Pie(data4, {
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 2,
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
                responsive: true,
                tooltipCornerRadius: 2
            });
        }
    </script>
    @endsection


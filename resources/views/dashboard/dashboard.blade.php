@extends('layouts.shared')

@section('content')
    <div style="display: inline-block">
        <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-xl-0">
            <div class="card redial-border-light redial-shadow">
                <div class="card-body">
                    <div class="media d-block d-sm-flex text-center text-sm-left">
                        <div class="d-md-flex align-self-center mx-auto mb-4 mb-sm-0 mr-0 mr-sm-3 spark9"></div>
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
                        <div class="d-md-flex align-self-center mx-auto mb-4 mb-sm-0 mr-0 mr-sm-3 spark8"></div>
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
                        <div class="d-md-flex align-self-center mx-auto mb-4 mb-sm-0 mr-0 mr-sm-3 spark7"></div>
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





    <div class="row mb-4">
        <div class="col-12 col-xl-12">
            <div class="card redial-border-light redial-shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-3 align-self-center">
                            <h6 class="header-title pl-3 mb-0 redial-relative">Traffic Sources</h6>
                        </div>
                        <div class="col-12 col-md-9">
                            <ul class="nav nav-tabs border-0 justify-content-lg-end my-3 my-lg-0 flex-column flex-sm-row" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link redial-light border-top-0 border-left-0 border-right-0 active pt-0" id="home-tab" data-toggle="tab" href="#1" role="tab" aria-controls="home" aria-selected="true">Last 30 Days</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link redial-light border-top-0 border-left-0 border-right-0 pt-0" id="profile-tab" data-toggle="tab" href="#2" role="tab" aria-controls="profile" aria-selected="false">Last 30 Days</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link redial-light border-top-0 border-left-0 border-right-0 pt-0" id="contact-tab" data-toggle="tab" href="#3" role="tab" aria-controls="contact" aria-selected="false">All Time</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content py-4" id="myTabContent">
                        <div class="tab-pane fade show active" id="1" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-xl-0 text-center">
                                    <div class="fact-box ">
                                        <small class="text-uppercase">Visits</small>
                                        <h1 class="counter_number mt-2 redial-font-weight-400">4.677</h1>
                                        <div class="chart sparkline spark11"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-xl-0 text-center">
                                    <div class="fact-box ">
                                        <small class="text-uppercase">Unique Users</small>
                                        <h1 class="counter_number mt-2 redial-font-weight-400">2.642</h1>
                                        <div class="chart sparkline spark13"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-sm-0 text-center">
                                    <div class="fact-box ">
                                        <small class="text-uppercase">Profile View</small>
                                        <h1 class="counter_number mt-2 redial-font-weight-400">3.372</h1>
                                        <div class="chart sparkline spark12"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-xl-3 text-center">
                                    <div class="fact-box ">
                                        <small class="text-uppercase">Websiteclick</small>
                                        <h1 class="counter_number mt-2 redial-font-weight-400">453</h1>
                                        <div class="chart sparkline spark14"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="2" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-xl-0 text-center">
                                    <div class="fact-box ">
                                        <small class="text-uppercase">Visits</small>
                                        <h1 class="counter_number mt-2 redial-font-weight-400">4.677</h1>
                                        <div class="chart sparkline spark11"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-xl-0 text-center">
                                    <div class="fact-box ">
                                        <small class="text-uppercase">Unique Users</small>
                                        <h1 class="counter_number mt-2 redial-font-weight-400">2.642</h1>
                                        <div class="chart sparkline spark13"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-sm-0 text-center">
                                    <div class="fact-box ">
                                        <small class="text-uppercase">Profile View</small>
                                        <h1 class="counter_number mt-2 redial-font-weight-400">3.372</h1>
                                        <div class="chart sparkline spark12"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-xl-3 text-center">
                                    <div class="fact-box ">
                                        <small class="text-uppercase">Websiteclick</small>
                                        <h1 class="counter_number mt-2 redial-font-weight-400">453</h1>
                                        <div class="chart sparkline spark14"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="3" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-xl-0 text-center">
                                    <div class="fact-box ">
                                        <small class="text-uppercase">Visits</small>
                                        <h1 class="counter_number mt-2 redial-font-weight-400">4.677</h1>
                                        <div class="chart sparkline spark11"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-xl-0 text-center">
                                    <div class="fact-box ">
                                        <small class="text-uppercase">Unique Users</small>
                                        <h1 class="counter_number mt-2 redial-font-weight-400">2.642</h1>
                                        <div class="chart sparkline spark13"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-sm-0 text-center">
                                    <div class="fact-box ">
                                        <small class="text-uppercase">Profile View</small>
                                        <h1 class="counter_number mt-2 redial-font-weight-400">3.372</h1>
                                        <div class="chart sparkline spark12"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-xl-3 text-center">
                                    <div class="fact-box ">
                                        <small class="text-uppercase">Websiteclick</small>
                                        <h1 class="counter_number mt-2 redial-font-weight-400">453</h1>
                                        <div class="chart sparkline spark14"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="morris-area-chart2" ></div>
                </div>
            </div>
        </div>
    </div>






    <div class="row mb-4">
        <div class="col-12 col-xl-6 mb-4 mb-xl-0">
            <div class="card redial-border-light redial-shadow mb-4">
                <div class="card-body">
                    <h6 class="header-title pl-3 redial-relative">Support Tickets</h6>
                    <div id="jsGrid"></div>
                </div>
            </div>
            <div class="card redial-border-light redial-shadow mb-4">
                <div class="card-body">
                    <h6 class="header-title pl-3 redial-relative">Today Domain Sales</h6>
                    <div class='row'>
                        <div class='col-12 col-md-6 col-xl-3'>
                            <div class="fact-box ">
                                <h1 class="counter_number mt-0 redial-font-weight-400">385</h1>
                                <p>.com</p>
                            </div>
                        </div>
                        <div class='col-12 col-md-6 col-xl-3'>
                            <div class="fact-box ">
                                <h1 class="counter_number mt-0 redial-font-weight-400">422</h1>
                                <p>.org</p>
                            </div>
                        </div>
                        <div class='col-12 col-md-6 col-xl-3'>
                            <div class="fact-box ">
                                <h1 class="counter_number mt-0 redial-font-weight-400">53</h1>
                                <p>.in</p>
                            </div>
                        </div>
                        <div class='col-12 col-md-6 col-xl-3'>
                            <div class="fact-box ">
                                <h1 class="counter_number mt-0 redial-font-weight-400">29</h1>
                                <p>.guru</p>
                            </div>
                        </div>
                    </div>
                    <div id="morris-area-chart"></div>
                </div>
            </div>
            <div class="card redial-border-light redial-shadow">
                <div class="card-body">
                    <h6 class="header-title pl-3 redial-relative">Live Chat</h6>
                    <div class="scrollerchat">
                        <div class="media text-right in text-white w-75 ml-auto mb-4">
                            <div class="media-body p-3 mt-4 redial-font-weight-600 redial-rounded-circle-50 text-left">
                                Hello John, how can I help you today ?
                            </div>
                            <div class="d-flex ml-3 thumb-img"><img src="dist/images/author2.jpg" alt="" class="img-fluid rounded-circle" /></div>
                        </div>
                        <div class="media text-right out w-75 mr-auto mb-4">
                            <div class="d-flex mr-3 thumb-img"><img src="dist/images/author3.jpg" alt="" class="img-fluid rounded-circle" /></div>
                            <div class="media-body p-3 mt-4 redial-font-weight-600 redial-rounded-circle-50 text-left">
                                Hi, I want to buy a new shoes.
                            </div>
                        </div>
                        <div class="media text-right in text-white w-75 ml-auto mb-4">
                            <div class="media-body p-3 mt-4 redial-font-weight-600 redial-rounded-circle-50 text-left">
                                Shipment is free. You\'ll get your shoes tomorrow!
                            </div>
                            <div class="d-flex ml-3 thumb-img"><img src="dist/images/author2.jpg" alt="" class="img-fluid rounded-circle" /></div>
                        </div>
                        <div class="media text-right out w-75 mr-auto mb-4">
                            <div class="d-flex mr-3 thumb-img"><img src="dist/images/author3.jpg" alt="" class="img-fluid rounded-circle" /></div>
                            <div class="media-body p-3 mt-4 redial-font-weight-600 redial-rounded-circle-50 text-left">
                                Wow that\'s great!
                            </div>
                        </div>
                        <div class="media text-right out w-75 mr-auto mb-4">
                            <div class="d-flex mr-3 thumb-img"><img src="dist/images/author3.jpg" alt="" class="img-fluid rounded-circle" /></div>
                            <div class="media-body p-3 mt-4 redial-font-weight-600 redial-rounded-circle-50 text-left">
                                Ok. Thanks for the answer. Appreciated.
                            </div>
                        </div>
                        <div class="media text-right in text-white w-75 ml-auto mb-4">
                            <div class="media-body p-3 mt-4 redial-font-weight-600 redial-rounded-circle-50 text-left">
                                You are welcome!
                            </div>
                            <div class="d-flex ml-3 thumb-img"><img src="dist/images/author2.jpg" alt="" class="img-fluid rounded-circle" /></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-9">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" placeholder="Type message here ..." />
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <a href="#" class="btn btn-primary btn-default btn-block mt-3 mt-sm-0">Send</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6">
            <div class="card redial-border-light redial-shadow mb-0">
                <div class="card-body">
                    <h6 class="header-title pl-3 redial-relative">Recent Activity</h6>
                    <div class="text-center">
                        <span class="redial-bg-orchid redial-font-weight-700 text-uppercase text-white py-2 px-3 rounded">Today</span>
                    </div>
                    <div class="row timeline redial-relative">
                        <div class="col-12 col-xl-6 text-left text-lg-right">
                            <div class="py-0 py-xl-5">
                                <div class="timeline-point redial-relative"></div>
                                <small class="redial-dark redial-font-weight-700">09:45  AM</small>
                                <span class="text-uppercase redial-primary d-block">Lorem ipsum dolor sit</span>
                                <h5 class="text-uppercase">amet, consectetuer adipiscing elit</h5>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo. Donec ullamcorper nulla non metus auctor </p>
                                <div class="card redial-border-primary redial-shadow redial-bg-primary text-white">
                                    <div class="card-body">
                                        <div class="follow">
                                            <ul class="list-inline text-center mb-0">
                                                <li class="list-inline-item redial-relative mr-5">
                                                    <div class="counter-box">
                                                        <h2 class="counter_number mb-0 text-white redial-font-weight-700">547</h2>
                                                        <small class="text-uppercase">following</small>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item redial-relative">
                                                    <div class="counter-box">
                                                        <h3 class="counter_number mb-0 text-white redial-font-weight-700">219</h3>
                                                        <small class="text-uppercase">comments</small>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-5">
                                <div class="timeline-point redial-relative"></div>
                                <small class="redial-dark redial-font-weight-700">08:20  AM</small>
                                <span class="text-uppercase redial-primary d-block">montes, nascetur ridiculus </span>
                                <h5 class="text-uppercase">Nulla consequat massa quis enim</h5>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo. Donec ullamcorper nulla non metus auctor </p>
                                <div class="card redial-border-primary redial-shadow redial-bg-primary text-white text-left">
                                    <div class="card-body">
                                        <a href="#"><h6 class="text-white mb-0" data-toggle="collapse" data-target="#demo2">Reply To Monica P. <span class="float-right"><i class="icofont icofont-caret-down"></i></span></h6> <span class="text-white">7:51 Pm</span></a>
                                        <p class="redial-font-weight-600 mb-0 py-3">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum fermentum.</p>
                                    </div>
                                    <div id="demo2" class="collapse show">

                                        <div class="reply-box redial-primary-dark border-left-0 border-right-0 border-bottom-0 text-center">
                                            <ul class="list-inline redial-font-weight-700 mb-0">
                                                <li class="list-inline-item float-left w-50 mr-0 redial-primary-dark border-left-0 border-top-0 border-bottom-0 py-2"><a href="#" class="text-white">Cancel</a></li>
                                                <li class="list-inline-item float-left w-50 mr-0 py-2"><a href="#"  class="text-white">Reply</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-5">
                                <div class="timeline-point timeline-point1  redial-relative"></div>
                                <small class="redial-dark redial-font-weight-700">10:59 PM </small>
                                <span class="text-uppercase redial-primary d-block">NEW EVENT POSTED</span>
                                <h5 class="text-uppercase">DTAIL STUDIO PORTFOLIO REVIEW</h5>
                                <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum fermentum.</p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6">
                            <div class="pt-5 mt-0 mt-xl-5">
                                <div class="timeline-point timeline-point2  redial-relative"></div>
                                <small class="redial-dark redial-font-weight-700">03:15 PM </small>
                                <span class="text-uppercase redial-primary d-block">commodo ligula eget</span>
                                <h5 class="text-uppercase">Aenean massa Cum sociis natoque</h5>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo. Donec ullamcorper nulla non metus auctor fringilla</p>
                            </div>
                            <div class="pt-5 pt-xl-0">
                                <div class="timeline-point timeline-point2  redial-relative"></div>
                                <small class="redial-dark redial-font-weight-700">06:31 PM </small>
                                <span class="text-uppercase redial-primary d-block">et magnis dis parturient</span>
                                <h5 class="text-uppercase">Donec quam felis pellentesque</h5>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo. Donec ullamcorper nulla non metus auctor fringilla</p>
                                <div class="card redial-border-primary redial-shadow redial-bg-primary text-white">
                                    <div class="card-body">
                                        <div class="follow">
                                            <ul class="list-inline text-center mb-0">
                                                <li class="list-inline-item redial-relative mr-5">
                                                    <div class="counter-box">
                                                        <h2 class="counter_number mb-0 text-white redial-font-weight-700">465</h2>
                                                        <small class="text-uppercase">following</small>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item redial-relative">
                                                    <div class="counter-box">
                                                        <h3 class="counter_number mb-0 text-white redial-font-weight-700">350</h3>
                                                        <small class="text-uppercase">comments</small>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-5">
                                <div class="timeline-point timeline-point2  redial-relative"></div>
                                <small class="redial-dark redial-font-weight-700">10:59 PM </small>
                                <span class="text-uppercase redial-primary d-block">NEW EVENT POSTED</span>
                                <h5 class="text-uppercase">DTAIL STUDIO PORTFOLIO REVIEW</h5>
                                <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum fermentum.</p>
                            </div>
                            <div class="pt-5 pt-xl-0">
                                <div class="timeline-point timeline-point2  redial-relative"></div>
                                <small class="redial-dark redial-font-weight-700">06:31 PM </small>
                                <span class="text-uppercase redial-primary d-block">et magnis dis parturient</span>
                                <h5 class="text-uppercase">Donec quam felis pellentesque</h5>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo. Donec ullamcorper nulla non metus auctor fringilla</p>
                                <div class="card redial-border-primary redial-shadow redial-bg-primary text-white">
                                    <div class="card-body">
                                        <div class="follow">
                                            <ul class="list-inline text-center mb-0">
                                                <li class="list-inline-item redial-relative mr-5">
                                                    <div class="counter-box">
                                                        <h2 class="counter_number mb-0 text-white redial-font-weight-700">465</h2>
                                                        <small class="text-uppercase">following</small>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item redial-relative">
                                                    <div class="counter-box">
                                                        <h3 class="counter_number mb-0 text-white redial-font-weight-700">350</h3>
                                                        <small class="text-uppercase">comments</small>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>





    <div class="row mb-4">
        <div class="col-12 col-xl-6 mb-4 mb-xl-0">
            <div class="card redial-border-light redial-shadow">
                <div class="card-body pb-0">
                    <h6 class="header-title pl-3 redial-relative">Message Inbox</h6>
                </div>
                <ul class="mb-0 list-unstyled inbox">

                    <li class="border border-top-0 border-left-0 border-right-0">
                        <a href="#" class="h6">
                            <div class="form-group mb-0 p-3">
                                <input type="checkbox" id="checkbox12">
                                <label for="checkbox12" class="redial-dark redial-font-weight-600">John Smith</label>
                                <small class='float-right text-muted'><i class="fa fa-paperclip pr-1"></i> Aug 10</small>
                                <small class="d-block pt-2"><i class="fa fa-star pr-2"></i> No Subject Lorem ipsum dolor sit amet </small>
                            </div>
                        </a>
                    </li>
                    <li class="border border-top-0 border-left-0 border-right-0">
                        <a href="#" class="h6">
                            <div class="form-group mb-0 p-3">
                                <input type="checkbox" id="checkbox13">
                                <label for="checkbox13" class="redial-dark redial-font-weight-600">Lauren Boggs</label>
                                <small class='float-right text-muted'> Nov 5</small>
                                <small class="d-block pt-2"><i class="fa fa-star pr-2"></i>Invite Lorem ipsum dolor sit amet</small>
                            </div>
                        </a>
                    </li>
                    <li class="border border-top-0 border-left-0 border-right-0">
                        <a href="#" class="h6">
                            <div class="form-group mb-0 p-3">
                                <input type="checkbox" id="checkbox14">
                                <label for="checkbox14" class="redial-dark redial-font-weight-600">Devid Taylor</label>
                                <small class='float-right text-muted'><i class="fa fa-paperclip pr-1"></i> Jan 25</small>
                                <small class="d-block pt-2"><i class="fa fa-star pr-2"></i>Developemnt  Lorem ipsum dolor sit amet</small>
                                <small class="d-block pt-2"><i class="fa fa-star pr-2"></i>Developemnt  Lorem ipsum dolor sit amet</small>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-xl-6">
            <div class="card redial-border-light redial-shadow">
                <div class="card-body">
                    <h6 class="header-title pl-3 redial-relative">Infographic</h6>
                    <div class='text-center w-100'>
                        <div class="d-sm-inline-block d-block mx-auto">
                            <a href="#"><img src='dist/images/item1.jpg' alt="" class='img-fluid rounded-circle' /></a>
                        </div>
                        <div class="d-sm-inline-block d-block mx-auto">
                            <a href="#"><img src='dist/images/item2.jpg' alt="" class='img-fluid rounded-circle' /></a>
                        </div>
                        <div class="d-sm-inline-block d-block mx-auto">
                            <a href="#"><img src='dist/images/item3.jpg' alt="" class='img-fluid rounded-circle' /></a>
                        </div>
                    </div>
                    <div id="testimonial" class="owl-carousel owl-theme mt-3 text-center">
                        <div class="item">
                            <p class="redial-primary-light">
                                With the new MacBook, we set out to do the impossible: engineer a full-size experience into the lightest and most compact Mac notebook ever.
                            </p>
                        </div>
                        <div class="item">
                            <p class="redial-primary-light">
                                With the new MacBook, we set out to do the impossible: engineer a full-size experience into the lightest and most compact Mac notebook ever.
                            </p>
                        </div>
                        <div class="item">
                            <p class="redial-primary-light">
                                With the new MacBook, we set out to do the impossible: engineer a full-size experience into the lightest and most compact Mac notebook ever.
                            </p>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <a href="#" class="btn btn-primary btn-default redial-rounded-circle-50 text-uppercase redial-font-weight-700">Check</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <div class="card redial-border-light redial-shadow">
                <div class="card-body">
                    <h6 class="header-title pl-3 redial-relative">Project Detail</h6>
                    <table class="table mb-0 redial-font-weight-700 table-responsive table-sm d-md-table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Assigned To</th>
                            <th scope="col">Value</th>
                            <th scope="col">Project Title</th>
                            <th scope="col">Assigned Date</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">
                                <div class="media d-md-flex d-block">
                                    <img src="dist/images/author.jpg" alt="" class="d-md-flex mr-0 mr-lg-3 img-fluid redial-rounded-circle-50" width="36">
                                    <div class="media-body">
                                        Jonathan Anderson
                                        <span class="d-block redial-font-weight-400">Developer</span>
                                    </div>
                                </div>
                            </th>
                            <td>$1500</td>
                            <td>
                                Wordpress Website
                                <span class="d-block redial-font-weight-400">Facebook</span>
                            </td>
                            <td>
                                15 Nov 2016
                                <span class="d-block redial-font-weight-400">4.45 PM</span>
                            </td>
                            <td>
                                18 Nov 2016
                                <span class="d-block redial-font-weight-400">10 hrs left</span>
                            </td>
                            <td>Development</td>
                            <td><i class="fa fa-ellipsis-v"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="media d-md-flex d-block">
                                    <img src="dist/images/author2.jpg" alt="" class="d-md-flex mr-0 mr-lg-3 img-fluid redial-rounded-circle-50" width="36">
                                    <div class="media-body">
                                        Imrich Kamarel
                                        <span class="d-block redial-font-weight-400">Designer</span>
                                    </div>
                                </div>
                            </th>
                            <td>$1200</td>
                            <td>
                                Html Website
                                <span class="d-block redial-font-weight-400">Twitter</span>
                            </td>
                            <td>
                                15 Dec 2016
                                <span class="d-block redial-font-weight-400">4.45 PM</span>
                            </td>
                            <td>
                                18 Aug 2016
                                <span class="d-block redial-font-weight-400">5 hrs left</span>
                            </td>
                            <td>Designing</td>
                            <td><i class="fa fa-ellipsis-v"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="media d-md-flex d-block">
                                    <img src="dist/images/author3.jpg" alt="" class="d-md-flex mr-0 mr-lg-3 img-fluid redial-rounded-circle-50" width="36">
                                    <div class="media-body">
                                        Anna Opichia
                                        <span class="d-block redial-font-weight-400">lead designer</span>
                                    </div>
                                </div>
                            </th>
                            <td>$1800</td>
                            <td>
                                Website
                                <span class="d-block redial-font-weight-400">CEO</span>
                            </td>
                            <td>
                                15 Jan 2016
                                <span class="d-block redial-font-weight-400">4.45 PM</span>
                            </td>
                            <td>
                                18 Fab 2016
                                <span class="d-block redial-font-weight-400">5 hrs left</span>
                            </td>
                            <td>Devloping</td>
                            <td><i class="fa fa-ellipsis-v"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="media d-md-flex d-block">
                                    <img src="dist/images/author.jpg" alt="" class="d-md-flex mr-0 mr-lg-3 img-fluid redial-rounded-circle-50" width="36">
                                    <div class="media-body">
                                        Jonathan Anderson
                                        <span class="d-block redial-font-weight-400">Developer</span>
                                    </div>
                                </div>
                            </th>
                            <td>$1500</td>
                            <td>
                                Wordpress Website
                                <span class="d-block redial-font-weight-400">Facebook</span>
                            </td>
                            <td>
                                15 Nov 2016
                                <span class="d-block redial-font-weight-400">4.45 PM</span>
                            </td>
                            <td>
                                18 Nov 2016
                                <span class="d-block redial-font-weight-400">10 hrs left</span>
                            </td>
                            <td>Development</td>
                            <td><i class="fa fa-ellipsis-v"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="media d-md-flex d-block">
                                    <img src="dist/images/author2.jpg" alt="" class="d-md-flex mr-0 mr-lg-3 img-fluid redial-rounded-circle-50" width="36">
                                    <div class="media-body">
                                        Imrich Kamarel
                                        <span class="d-block redial-font-weight-400">Designer</span>
                                    </div>
                                </div>
                            </th>
                            <td>$1200</td>
                            <td>
                                Html Website
                                <span class="d-block redial-font-weight-400">Twitter</span>
                            </td>
                            <td>
                                15 Dec 2016
                                <span class="d-block redial-font-weight-400">4.45 PM</span>
                            </td>
                            <td>
                                18 Aug 2016
                                <span class="d-block redial-font-weight-400">5 hrs left</span>
                            </td>
                            <td>Designing</td>
                            <td><i class="fa fa-ellipsis-v"></i></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card redial-border-light redial-shadow">
                <div class="card-body">
                    <h6 class="header-title pl-3 pb-2  redial-relative">Upload Project</h6>
                    <div class="redial-process mx-auto redial-relative rounded-circle my-4">
                        <div class="redial-middle-bar mx-auto rounded-circle">
                            <div class="text-center redial-absolute w-100 h-100">
                                <div class="d-table w-100 h-100 ">
                                    <div class="d-table-cell align-middle">
                                        <a href="#"><img src="dist/images/dropzone.png" alt="" class="img-fluid mb-2" /></a>
                                        <h5 class="mb-0 redial-primary">Drag & Drop</h5>
                                        <p class="mb-0 redial-font-weight-700">75%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="list-inline mb-0 pt-3">
                        <li id="dropzone" class="list-inline-item mr-4 redial-relative"><a href="#" class="redial-drank"><i class="fa fa-upload pr-2"></i> Upload <input type="file"  class="text-hide"/></a></li>
                        <li class="list-inline-item mr-4"><a href="#" class="redial-light"><i class="fa fa-trash pr-2"></i> Delete</a></li>
                        <li class="list-inline-item float-right"><a href="#" class="redial-primary"><i class="fa fa-long-arrow-right pr-2"></i> Next Step</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12 col-xl-6 mb-4 mb-xl-0">
            <div class="card redial-border-light redial-shadow mb-4">
                <div class="card-body">
                    <h6 class="header-title pl-3 redial-relative">Social Followers</h6>
                    <div class="row mb-4">
                        <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-xl-0">
                            <div class="media d-sm-flex d-block">
                                <div class="text-center d-sm-flex mr-sm-2 mr-0 border redial-rounded-circle-50 redial-royal-blue redial-border-width-2 d-inline-block mb-3 mb-sm-0 redial-followers">
                                    <h5 class="mb-0 redial-fb"><i class="fa fa-facebook"></i></h5>
                                </div>
                                <div class="media-body fact-box">
                                    <h4 class="counter_number mb-1 redial-font-weight-300">459</h4>
                                    <small>This Week</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-xl-0">
                            <div class="media d-sm-flex d-block">
                                <div class="text-center d-sm-flex mr-sm-2 mr-0 border redial-rounded-circle-50 redial-deep-blue redial-border-width-2 d-inline-block mb-3 mb-sm-0 redial-followers">
                                    <h5 class="mb-0 redial-twi"><i class="fa fa-twitter"></i></h5>
                                </div>
                                <div class="media-body fact-box">
                                    <h4 class="counter_number mb-1 redial-font-weight-300">325</h4>
                                    <small>This Week</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-xl-3 mb-4 mb-sm-0">
                            <div class="media d-sm-flex d-block">
                                <div class="text-center d-sm-flex mr-sm-2 mr-0 border redial-rounded-circle-50 redial-red-dark redial-border-width-2 d-inline-block mb-3 mb-sm-0 redial-followers">
                                    <h5 class="mb-0 redial-pin"><i class="fa fa-pinterest-p"></i></h5>
                                </div>
                                <div class="media-body fact-box">
                                    <h4 class="counter_number mb-1 redial-font-weight-300">950</h4>
                                    <small>This Week</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="media d-sm-flex d-block">
                                <div class="text-center d-sm-flex mr-sm-2 border redial-rounded-circle-50 redial-violet-dark redial-border-width-2 d-inline-block mb-3 mb-sm-0 redial-followers">
                                    <h5 class="mb-0 redial-dri"><i class="fa fa-dribbble"></i></h5>
                                </div>
                                <div class="media-body fact-box1">
                                    <h4 class="counter_number mb-1 redial-font-weight-300">18</h4>
                                    <small>This Week</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="canvas" class="row">
                        <div class="col-12 col-sm-6 col-lg-4 mb-4">
                            <div class="circle" id="circles-1"></div>
                            <p class="text-xl-center text-left"><i class="fa fa-facebook pr-1"></i>Facebook</p>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-4">
                            <div class="circle" id="circles-2"></div>
                            <p class="text-xl-center text-left"><i class="fa fa-google pr-1"></i>Google+</p>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-4">
                            <div class="circle" id="circles-3"></div>
                            <p class="text-xl-center text-left"><i class="fa fa-twitter pr-1"></i>Twitter</p>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-4 mb-lg-0">
                            <div class="circle" id="circles-4"></div>
                            <p class="text-xl-center text-left"><i class="fa fa-pinterest-p pr-1"></i>Pinterest</p>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-4 mb-sm-0">
                            <div class="circle" id="circles-5"></div>
                            <p class="text-xl-center text-left"><i class="fa fa-linkedin pr-1"></i>Linkedin</p>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="circle" id="circles-6"></div>
                            <p class="text-xl-center text-left"><i class="fa fa-dribbble pr-1"></i>Dribbble</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card redial-border-light redial-shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0 text-center">
                            <div class="fact-box">
                                <h1 class="display-4 mb-0 redial-info"><i class="fa fa-cloud-upload"></i></h1>
                                <h4 class="counter_number mb-1 redial-font-weight-300">950</h4>
                                <small>Uploads</small>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0 text-center">
                            <div class="fact-box">
                                <h1 class="display-4 mb-0 redial-info"><i class="fa fa-trophy"></i></h1>
                                <h4 class="counter_number mb-1 redial-font-weight-300">850</h4>
                                <small>Awards</small>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-sm-0 text-center">
                            <div class="fact-box">
                                <h1 class="display-4 mb-0 redial-info"><i class="fa fa-lightbulb-o"></i></h1>
                                <h4 class="counter_number mb-1 redial-font-weight-300">493</h4>
                                <small>Item</small>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 text-center">
                            <div class="fact-box">
                                <h1 class="display-4 mb-0 redial-info"><i class="fa fa-shopping-cart""></i></h1>
                                <h4 class="counter_number mb-1 redial-font-weight-300">800</h4>
                                <small>Purchase</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6">
            <div class="card redial-border-light redial-shadow mb-4">
                <div class="redial-relative">
                    <div class="background-image-maker py-5 rounded-top"></div>
                    <div class="holder-image">
                        <img src="dist/images/profile-inner.jpg" alt="" class="img-fluid d-none" />
                    </div>
                    <div class="redial-overlay redial-overlay-bg rounded-top"></div>
                    <div class="card-body text-center redial-relative">
                        <a href="#"><img src="dist/images/profile.jpg" alt="" class="img-fluid rounded-circle redial-shadow2 my-4" /></a>
                    </div>
                </div>
                <div class="redial-relative text-center py-4">
                    <a href="#"><h5 class="text-uppercase mb-2">Jonathan Anderson</h5></a>
                    <h6 class="redial-light redial-font-weight-400">Administrator</h6>

                    <ul class="list-inline mb-0 pt-4">
                        <li class="list-inline-item redial-brd-right pr-xl-4 pr-0 mr-0 d-xl-inline-block d-block mb-3 mb-xl-0">
                            <a href="#" class="redial-light">
                                <i class="fa fa-phone"></i>
                                <p class="mb-0 text-uppercase redial-font-weight-700">Phone</p>
                                +1 (800) 234 5678
                            </a>
                        </li>
                        <li class="list-inline-item redial-brd-right px-xl-4 px-0 mr-0 d-xl-inline-block d-block mb-3 mb-xl-0">
                            <a href="#" class="redial-light">
                                <i class="fa fa-envelope"></i>
                                <p class="mb-0 text-uppercase redial-font-weight-700">Email</p>
                                info@adminjona.com
                            </a>
                        </li>
                        <li class="list-inline-item pl-xl-4 pl-0 mr-0 d-xl-inline-block d-block">
                            <a href="#" class="redial-light">
                                <i class="fa fa-fax"></i>
                                <p class="mb-0 text-uppercase redial-font-weight-700">fax</p>
                                +1 (800) 876 5432
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card redial-border-light redial-shadow">
                <div class="redial-relative">
                    <div class="background-image-maker py-5 rounded-top rounded-bottom"></div>
                    <div class="holder-image">
                        <img src="dist/images/img1.jpg" alt="" class="img-fluid d-none" />
                    </div>
                    <div class="redial-overlay redial-overlay-bg rounded-top rounded-bottom"></div>
                    <div class="redial-relative text-white h-262">
                        <div class="d-table w-100 h-100 pb-2">
                            <div class="d-table-cell align-bottom">
                                <ul class="list-inline mb-0 px-3">
                                    <li class="list-inline-item mr-3"><a href="#" class="text-white"><i class="fa fa-heart pr-2"></i> 150</a></li>
                                    <li class="list-inline-item mr-3"><a href="#" class="text-white"><i class="fa fa-comments pr-2"></i> 650</a></li>
                                    <li class="list-inline-item"><a href="#" class="text-white"><i class="fa fa-share-alt pr-2"></i> 70</a></li>
                                </ul>
                                <div class="redial-divider my-3"></div>
                                <div class="media d-md-flex d-block px-3">
                                    <div class="d-md-flex mr-md-3 mr-0">
                                        <h1 class="display-3 redial-font-weight-700 text-white d-block mb-0">14</h1>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <small class="redial-yellow">By: John Deo</small>
                                        <p class="mb-0 text-uppercase redial-font-weight-900">Lorem ipsum dolor amet </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12 col-lg-6 col-xl-6 mb-4">
            <div class="card redial-border-light redial-shadow">
                <div class="card-body">
                    <h6 class="header-title pl-3 redial-relative">Most Viewed Products</h6>
                    <dl class="row mb-0">
                        <dt class="col-sm-12 font-weight-normal">
                            <div class="media d-sm-flex d-block py-3 redial-divider-dashed text-center text-sm-left">
                                <img src="dist/images/author.jpg" alt="" class="img-fluid rounded-circle d-sm-flex mr-sm-3 mr-0" />
                                <div class="media-body align-self-center redial-line-height-1_5">
                                    <div class="float-sm-right float-none my-3 my-sm-0">
                                        <a href="#" class="btn btn-outline-primary btn-xs text-uppercase redial-font-weight-700"> <i class="fa fa-user-plus pr-1"></i>Follow</a>
                                    </div>
                                    <a href="#" class="redial-light">
                                        <small class="d-block redial-font-weight-700">Gladys Schuster </small>
                                        <small>Freelance Web Developer </small>
                                    </a>
                                </div>
                            </div>
                        </dt>
                        <dt class="col-sm-12 font-weight-normal">
                            <div class="media d-sm-flex d-block py-3 redial-divider-dashed text-center text-sm-left">
                                <img src="dist/images/author2.jpg" alt="" class="img-fluid rounded-circle d-sm-flex mr-sm-3 mr-0" />
                                <div class="media-body align-self-center redial-line-height-1_5">
                                    <div class="float-sm-right float-none my-3 my-sm-0">
                                        <a href="#" class="btn btn-outline-primary btn-xs text-uppercase redial-font-weight-700"> <i class="fa fa-user-plus pr-1"></i>Follow</a>
                                    </div>
                                    <a href="#" class="redial-light">
                                        <small class="d-block redial-font-weight-700">Gladys Schuster </small>
                                        <small>Freelance Web Developer </small>
                                    </a>
                                </div>
                            </div>
                        </dt>
                        <dt class="col-sm-12 font-weight-normal">
                            <div class="media d-sm-flex d-block py-2 redial-divider-dashed text-center text-sm-left">
                                <img src="dist/images/author3.jpg" alt="" class="img-fluid rounded-circle d-sm-flex mr-sm-3 mr-0" />
                                <div class="media-body align-self-center redial-line-height-1_5">
                                    <div class="float-sm-right float-none my-3 my-sm-0">
                                        <a href="#" class="btn btn-outline-primary btn-xs text-uppercase redial-font-weight-700"> <i class="fa fa-user-plus pr-1"></i>Follow</a>
                                    </div>
                                    <a href="#" class="redial-light">
                                        <small class="d-block redial-font-weight-700">Gladys Schuster </small>
                                        <small>Freelance Web Developer </small>
                                    </a>
                                </div>
                            </div>
                        </dt>

                    </dl>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card redial-border-light redial-shadow">
                <div class="card-body py-2 px-3">
                    <table id="calendar-demo" class="calendar"></table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-xl-4 mb-0">

        <div class="col-12 col-lg-6 col-xl-6 mb-4">
            <div class="card redial-border-light redial-shadow">
                <div class="card-body">
                    <h6 class="header-title pl-3 redial-relative pb-3">Top Active Pages</h6>
                    <table class="table mb-0 redial-font-weight-700 table-responsive">
                        <tbody>
                        <tr class="redial-divider-dashed">
                            <td class="w-1">1</td>
                            <td class="w-35">/getting-started</td>
                            <td class="w-25">2,80,489</td>
                            <td>
                                <div id="jqmeter-horizontal">
                                    <div class="therm outer-therm">
                                        <div class="proggress">
                                            <div class="therm inner-therm"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="redial-divider-dashed">
                            <td>2</td>
                            <td>/home</td>
                            <td>1,98,956</td>
                            <td>
                                <div id="jqmeter-horizonta2">
                                    <div class="therm outer-therm">
                                        <div class="proggress">
                                            <div class="therm inner-therm"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="redial-divider-dashed">
                            <td>3</td>
                            <td>/pricing</td>
                            <td>2,10,257</td>
                            <td>
                                <div id="jqmeter-horizonta3">
                                    <div class="therm outer-therm">
                                        <div class="proggress">
                                            <div class="therm inner-therm"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="redial-divider-dashed">
                            <td>4</td>
                            <td>/about</td>
                            <td>1,80,745</td>
                            <td>
                                <div id="jqmeter-horizonta4">
                                    <div class="therm outer-therm">
                                        <div class="proggress">
                                            <div class="therm inner-therm"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="redial-divider-dashed">
                            <td>5</td>
                            <td>/blog/</td>
                            <td >2,24,694</td>
                            <td>
                                <div id="jqmeter-horizonta5">
                                    <div class="therm outer-therm">
                                        <div class="proggress">
                                            <div class="therm inner-therm"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="redial-divider-dashed">
                            <td>6</td>
                            <td>/support</td>
                            <td>70,000</td>
                            <td>
                                <div id="jqmeter-horizonta6">
                                    <div class="therm outer-therm">
                                        <div class="proggress">
                                            <div class="therm inner-therm"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>/team</td>
                            <td>1,10,000</td>
                            <td>
                                <div id="jqmeter-horizonta7">
                                    <div class="therm outer-therm">
                                        <div class="proggress">
                                            <div class="therm inner-therm"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-6 mb-4 mb-xl-0">
            <div class="card redial-border-light redial-shadow text-center text-sm-left">
                <div class="card-body">
                    <h6 class="header-title pl-3 redial-relative">Most Viewed Products</h6>
                    <div class="row  py-2">
                        <div class="col-12 col-sm-6">
                            <div class="media d-sm-flex d-block">
                                <img src="dist/images/author4.jpg" alt="" class="img-fluid d-sm-flex mr-sm-2 mr-0 rounded">
                                <div class="media-body align-self-center redial-line-height-1_5 mt-2 mt-sm-0">
                                    <a href="#" class="redial-light">
                                        <p class="mb-0">Printed Women's</p>
                                        <span>T-shirt</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 align-self-center my-3 my-sm-0">
                            <div class="chart sparkline spark4"></div>
                        </div>
                        <div class="col-12 col-sm-2 align-self-center">
                            <div class="redial-bg-primary text-white text-center rounded view redial-relative mx-auto">
                                <small>54k <br />View</small>
                            </div>
                        </div>
                    </div>
                    <div class="my-3 redial-divider-dashed"></div>
                    <div class="row  py-2">
                        <div class="col-12 col-sm-6">
                            <div class="media d-sm-flex d-block">
                                <img src="dist/images/author5.jpg" alt="" class="img-fluid d-sm-flex mr-sm-2 mr-0 rounded">
                                <div class="media-body align-self-center redial-line-height-1_5 mt-2 mt-sm-0">
                                    <a href="#" class="redial-light">
                                        <p class="mb-0">Mens Printed</p>
                                        <span>T-shirt</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 align-self-center my-3 my-sm-0">
                            <div class="chart sparkline spark4"></div>
                        </div>
                        <div class="col-12 col-sm-2 align-self-center">
                            <div class="redial-bg-primary text-white text-center rounded view redial-relative mx-auto">
                                <small>10k <br />View</small>
                            </div>
                        </div>
                    </div>
                    <div class="my-3 redial-divider-dashed"></div>
                    <div class="row  py-2">
                        <div class="col-12 col-sm-6">
                            <div class="media d-sm-flex d-block">
                                <img src="dist/images/author4.jpg" alt="" class="img-fluid d-sm-flex mr-sm-2 mr-0 rounded">
                                <div class="media-body align-self-center redial-line-height-1_5 mt-2 mt-sm-0">
                                    <a href="#" class="redial-light">
                                        <p class="mb-0">Printed Women's</p>
                                        <span>T-shirt</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 align-self-center my-3 my-sm-0">
                            <div class="chart sparkline spark4"></div>
                        </div>
                        <div class="col-12 col-sm-2 align-self-center">
                            <div class="redial-bg-primary text-white text-center rounded view redial-relative mx-auto">
                                <small>13k <br />View</small>
                            </div>
                        </div>
                    </div>
                    <div class="my-3 redial-divider-dashed"></div>
                    <div class="row py-2">
                        <div class="col-12 col-sm-6">
                            <div class="media d-sm-flex d-block">
                                <img src="dist/images/author5.jpg" alt="" class="img-fluid d-sm-flex mr-sm-2 mr-0 rounded">
                                <div class="media-body align-self-center redial-line-height-1_5 mt-2 mt-sm-0">
                                    <a href="#" class="redial-light">
                                        <p class="mb-0">Mens Printed</p>
                                        <span>T-shirt</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 align-self-center my-3 my-sm-0">
                            <div class="chart sparkline spark4"></div>
                        </div>
                        <div class="col-12 col-sm-2 align-self-center">
                            <div class="redial-bg-primary text-white text-center rounded view redial-relative mx-auto">
                                <small>49k <br />View</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-4 mb-4 mb-xl-0">
            <div class="card redial-border-light redial-shadow text-center text-sm-left">
                <div class="card-body pb-3">
                    <h6 class="header-title pl-3 redial-relative">Traffic Source</h6>
                    <table class="table mb-0 redial-font-weight-700 table-responsive w-100">
                        <tbody>
                        <tr class="redial-divider-dashed">
                            <td>1</td>
                            <td class="w-25">Direct</td>
                            <td ><i class="fa fa-arrow-right"></i></td>
                            <td class="w-50">(25%)  120 K</td>
                        </tr>
                        <tr class="redial-divider-dashed">
                            <td>2</td>
                            <td>Refreeals</td>
                            <td><i class="fa fa-chain"></i></td>
                            <td >(10%)  20 K</td>
                        </tr>
                        <tr class="redial-divider-dashed">
                            <td>3</td>
                            <td>Search</td>
                            <td><i class="fa fa-search"></i></td>
                            <td >(32%)  160 K</td>
                        </tr>
                        <tr class="redial-divider-dashed">
                            <td>3</td>
                            <td>Search</td>
                            <td><i class="fa fa-search"></i></td>
                            <td >(32%)  160 K</td>
                        </tr>
                        <tr class="redial-divider-dashed">
                            <td>3</td>
                            <td>Search</td>
                            <td><i class="fa fa-search"></i></td>
                            <td >(32%)  160 K</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-4 mb-4 mb-xl-0">
            <div class="card redial-border-light redial-shadow text-center">
                <div class="redial-relative p-4">
                    <div class="background-image-maker py-5 rounded-top rounded-bottom"></div>
                    <div class="holder-image">
                        <img src="dist/images/img2.jpg" alt="" class="img-fluid d-none">
                    </div>
                    <div class="redial-overlay redial-overlay-bg rounded-top rounded-bottom"></div>
                    <div class="redial-relative text-white">
                        <div class="d-table w-100 h-100">
                            <div class="d-table-cell align-middle">
                                <div class="media d-sm-flex d-block text-center text-sm-left my-4">
                                    <div class="d-sm-flex mr-sm-3 mr-0">
                                        <h1 class="display-4 redial-font-weight-700 text-white d-block mb-0"><i class="fa fa-map-marker"></i></h1>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h5 class="text-white mb-0">Paris, France</h5>
                                        <p class="redial-font-weight-700 mb-0">Monday  Nov 1, 2016. </p>
                                    </div>
                                </div>
                                <div class="clearfix mt-3 mb-4">
                                    <div class="float-none float-sm-left">
                                        <a href="#"><img src="dist/images/weather.png" alt="" class="img-fluid" /></a>
                                    </div>
                                    <div class="float-none float-sm-right">
                                        <h1 class="display-3 redial-font-weight-700 mb-0 text-white">13<sup>o</sup>c</h1>
                                    </div>
                                </div>
                                <small>Partly cloudy with a high of 61 F (16.1 <sup>o</sup> c). Winds variable at 2 to 7 mph (3.2 to 11.3 kph)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-4 mb-4 mb-xl-0">
            <div class="card redial-border-light redial-shadow mb-4">
                <div class="redial-relative">
                    <div class="background-image-maker py-5 rounded-top"></div>
                    <div class="holder-image">
                        <img src="dist/images/profile-inner2.jpg" alt="" class="img-fluid d-none">
                    </div>
                </div>
                <div class="redial-relative text-center pt-4">
                    <div class="text-center redial-relative">
                        <a href="#"><img src="dist/images/profile2.jpg" alt="" class="img-fluid rounded-circle mt-3 d-block mx-auto  border redial-border-width-2 border-white"></a>
                        <a href="#"><h6 class="mb-0 pt-3">Lucy Moon</h6></a>
                        <p>Art Desinger</p>
                    </div>
                    <div class="redial-divider"></div>
                    <ul class="list-inline mb-0 py-4">
                        <li class="list-inline-item redial-brd-right pr-xl-4 pr-0 mr-0 d-xl-inline-block d-block mb-3 mb-xl-0 fact-box1">
                            <a href="#" class="redial-light"><p class="mb-0 text-uppercase redial-font-weight-700 counter_number">12.5</p>
                                Followers
                            </a>
                        </li>
                        <li class="list-inline-item redial-brd-right px-xl-4 px-0 mr-0 d-xl-inline-block d-block mb-3 mb-xl-0">
                            <a href="#" class="redial-light"><p class="mb-0 text-uppercase redial-font-weight-700 counter_number">1853</p>
                                Followers
                            </a>
                        </li>
                        <li class="list-inline-item pl-xl-4 pl-0 mr-0 d-xl-inline-block d-block mb-3 mb-xl-0">
                            <a href="#" class="redial-light"><p class="mb-0 text-uppercase redial-font-weight-700 counter_number">3451</p>
                                Tweets
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row map-marker mb-4">
        <div class="col-12 col-sm-12">
            <div class="card redial-border-light redial-shadow">
                <div class="card-body">
                    <h6 class="header-title pl-3 redial-relative">Visitors Location</h6>
                    <div class="row">
                        <div class="col-12 col-xl-3 mb-5 mb-xl-0">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-xl-12 mb-4 mb-sm-0">
                                    <div class="media d-sm-flex d-block mb-4">
                                        <img src="dist/images/globe.png" alt="" class="img-fluid d-sm-flex mr-0 mr-sm-4 mb-3 mb-sm-0">
                                        <div class="media-body align-self-center">
                                            <p class="redial-font-weight-700 redial-dark">New York City </p>
                                            <div id="demoprogressbar1"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-xl-12 mb-4 mb-sm-0">
                                    <div class="media d-sm-flex d-block mb-4">
                                        <img src="dist/images/globe.png" alt="" class="img-fluid d-sm-flex mr-0 mr-sm-4 mb-3 mb-sm-0">
                                        <div class="media-body align-self-center">
                                            <p class="redial-font-weight-700 redial-dark">Singapore  </p>
                                            <div id="demoprogressbar2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-xl-12 mb-4 mb-sm-0">
                                    <div class="media d-sm-flex d-block mb-4">
                                        <img src="dist/images/globe.png" alt="" class="img-fluid d-sm-flex mr-0 mr-sm-4 mb-3 mb-sm-0">
                                        <div class="media-body align-self-center">
                                            <p class="redial-font-weight-700 redial-dark">Tokyo  </p>
                                            <div id="demoprogressbar3"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-xl-12 mb-4 mb-sm-0">
                                    <div class="media d-sm-flex d-block">
                                        <img src="dist/images/globe.png" alt="" class="img-fluid d-sm-flex mr-0 mr-sm-4 mb-3 mb-sm-0">
                                        <div class="media-body align-self-center">
                                            <p class="redial-font-weight-700 redial-dark">Hong Kong </p>
                                            <div id="demoprogressbar4"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-9">
                            <div id="world-map" class="vpmap"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- End main-content-->

    <!-- Top To Bottom--> <a href="#" class="scrollup text-center redial-bg-primary redial-rounded-circle-50 ">
        <h4 class="text-white mb-0"><i class="icofont icofont-long-arrow-up"></i></h4>
    </a>
    <!-- End Top To Bottom-->

    <!-- Chat-->
    <div id="sidechat">
        <a href="#" class="setting text-center redial-bg-primary d-none d-lg-block">
            <h4 class="text-white mb-0"><i class="icofont icofont-gear"></i></h4>
        </a>
        <div class="sidbarchat">
            <ul class="nav nav-tabs border-0 justify-content-lg-center my-3 my-lg-0 flex-column flex-sm-row" role="tablist">
                <li class="nav-item">
                    <a class="nav-link redial-light border-top-0 border-left-0 border-right-0 active pt-0" id="11-tab" data-toggle="tab" href="#11" role="tab" aria-controls="home" aria-selected="true">Chat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link redial-light border-top-0 border-left-0 border-right-0 pt-0" id="21-tab" data-toggle="tab" href="#21" role="tab" aria-controls="profile" aria-selected="false">Todo</a>
                </li>

            </ul>
            <div class="tab-content py-4" id="mysideTabContent">
                <div class="tab-pane fade show active" id="11" role="tabpanel" aria-labelledby="11-tab">
                    <ul class="nav flex-column" role="tablist">
                        <li class="nav-item redial-divider px-3">
                            <a class="nav-link active redial-light" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">
                                <div class="media d-block d-sm-flex text-center text-sm-left py-3">
                                    <img class="img-fluid d-md-flex mr-sm-3 redial-rounded-circle-50" src="dist/images/author2.jpg" alt="">
                                    <div class="media-body align-self-center redial-line-height-1_5 mt-2 mt-sm-0">
                                        <h6 class="mb-1 redial-font-weight-800">Harry Jones</h6>
                                        Managing Partner at MDD
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item redial-divider px-3">
                            <a class="nav-link redial-light" data-toggle="tab" href="#tab2" role="tab" aria-selected="false">
                                <div class="media d-block d-sm-flex text-center text-sm-left py-3">
                                    <img class="img-fluid d-md-flex mr-sm-3 redial-rounded-circle-50" src="dist/images/author3.jpg" alt="">
                                    <div class="media-body align-self-center redial-line-height-1_5 mt-2 mt-sm-0">
                                        <h6 class="mb-1 redial-font-weight-800">Daniel Taylor</h6>
                                        Freelance Web Developer
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item redial-divider px-3">
                            <a class="nav-link redial-light" data-toggle="tab" href="#tab3" role="tab" aria-selected="false">
                                <div class="media d-block d-sm-flex text-center text-sm-left py-3">
                                    <img class="img-fluid d-md-flex mr-sm-3 redial-rounded-circle-50" src="dist/images/author.jpg" alt="">
                                    <div class="media-body align-self-center redial-line-height-1_5 mt-2 mt-sm-0">
                                        <h6 class="mb-1 redial-font-weight-800">Charlotte </h6>
                                        Co-Founder & CEO at Pi
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item redial-divider px-3">
                            <a class="nav-link redial-light" data-toggle="tab" href="#tab4" role="tab" aria-selected="false">
                                <div class="media d-block d-sm-flex text-center text-sm-left py-3">
                                    <img class="img-fluid d-md-flex mr-sm-3 redial-rounded-circle-50" src="dist/images/author7.jpg" alt="">
                                    <div class="media-body align-self-center redial-line-height-1_5 mt-2 mt-sm-0">
                                        <h6 class="mb-1 redial-font-weight-800">Jack Sparrow</h6>
                                        Managing Partner at MDD
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item redial-divider px-3">
                            <a class="nav-link redial-light" data-toggle="tab" href="#tab5" role="tab" aria-selected="false">
                                <div class="media d-block d-sm-flex text-center text-sm-left py-3">
                                    <img class="img-fluid d-md-flex mr-sm-3 redial-rounded-circle-50" src="dist/images/author6.jpg" alt="">
                                    <div class="media-body align-self-center redial-line-height-1_5 mt-2 mt-sm-0">
                                        <h6 class="mb-1 redial-font-weight-800">Bhaumik</h6>
                                        Managing Partner at MDD
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link redial-light" data-toggle="tab" href="#tab6" role="tab" aria-selected="false">
                                <div class="media d-block d-sm-flex text-center text-sm-left py-3">
                                    <img class="img-fluid d-md-flex mr-sm-3 redial-rounded-circle-50" src="dist/images/author8.jpg" alt="">
                                    <div class="media-body align-self-center redial-line-height-1_5 mt-2 mt-sm-0">
                                        <h6 class="mb-1 redial-font-weight-800">Wood Walton</h6>
                                        Managing Partner at MDD
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link redial-light" data-toggle="tab" href="#tab6" role="tab" aria-selected="false">
                                <div class="media d-block d-sm-flex text-center text-sm-left py-3">
                                    <img class="img-fluid d-md-flex mr-sm-3 redial-rounded-circle-50" src="dist/images/author8.jpg" alt="">
                                    <div class="media-body align-self-center redial-line-height-1_5 mt-2 mt-sm-0">
                                        <h6 class="mb-1 redial-font-weight-800">Wood Walton</h6>
                                        Managing Partner at MDD
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link redial-light" data-toggle="tab" href="#tab6" role="tab" aria-selected="false">
                                <div class="media d-block d-sm-flex text-center text-sm-left py-3">
                                    <img class="img-fluid d-md-flex mr-sm-3 redial-rounded-circle-50" src="dist/images/author8.jpg" alt="">
                                    <div class="media-body align-self-center redial-line-height-1_5 mt-2 mt-sm-0">
                                        <h6 class="mb-1 redial-font-weight-800">Wood Walton</h6>
                                        Managing Partner at MDD
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link redial-light" data-toggle="tab" href="#tab6" role="tab" aria-selected="false">
                                <div class="media d-block d-sm-flex text-center text-sm-left py-3">
                                    <img class="img-fluid d-md-flex mr-sm-3 redial-rounded-circle-50" src="dist/images/author8.jpg" alt="">
                                    <div class="media-body align-self-center redial-line-height-1_5 mt-2 mt-sm-0">
                                        <h6 class="mb-1 redial-font-weight-800">Wood Walton</h6>
                                        Managing Partner at MDD
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link redial-light" data-toggle="tab" href="#tab6" role="tab" aria-selected="false">
                                <div class="media d-block d-sm-flex text-center text-sm-left py-3">
                                    <img class="img-fluid d-md-flex mr-sm-3 redial-rounded-circle-50" src="dist/images/author8.jpg" alt="">
                                    <div class="media-body align-self-center redial-line-height-1_5 mt-2 mt-sm-0">
                                        <h6 class="mb-1 redial-font-weight-800">Wood Walton</h6>
                                        Managing Partner at MDD
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="tab-pane fade" id="21" role="tabpanel" aria-labelledby="21-tab">
                    <ul class="mb-0 list-unstyled inbox mt-3">

                        <li class="border border-top-0 border-left-0 border-right-0">
                            <a href="#" class="h6">
                                <div class="form-group mb-0 p-3">
                                    <input type="checkbox" id="scheckbox12">
                                    <label for="scheckbox12" class="redial-dark redial-font-weight-600">John Smith</label>
                                    <small class='float-right text-muted'><i class="fa fa-paperclip pr-1"></i> Aug 10</small>
                                    <small class="d-block pt-2"><i class="fa fa-star pr-2"></i> No Subject Lorem ipsum dolor sit amet </small>
                                </div>
                            </a>
                        </li>
                        <li class="border border-top-0 border-left-0 border-right-0">
                            <a href="#" class="h6">
                                <div class="form-group mb-0 p-3">
                                    <input type="checkbox" id="scheckbox13">
                                    <label for="scheckbox13" class="redial-dark redial-font-weight-600">Lauren Boggs</label>
                                    <small class='float-right text-muted'> Nov 5</small>
                                    <small class="d-block pt-2"><i class="fa fa-star pr-2"></i>Invite Lorem ipsum dolor sit amet</small>
                                </div>
                            </a>
                        </li>
                        <li class="border border-top-0 border-left-0 border-right-0">
                            <a href="#" class="h6">
                                <div class="form-group mb-0 p-3">
                                    <input type="checkbox" id="scheckbox14">
                                    <label for="scheckbox14" class="redial-dark redial-font-weight-600">Devid Taylor</label>
                                    <small class='float-right text-muted'><i class="fa fa-paperclip pr-1"></i> Jan 25</small>
                                    <small class="d-block pt-2"><i class="fa fa-star pr-2"></i>Developemnt  Lorem ipsum dolor sit amet</small>

                                </div>
                            </a>
                        </li>
                        <li class="border border-top-0 border-left-0 border-right-0">
                            <a href="#" class="h6">
                                <div class="form-group mb-0 p-3">
                                    <input type="checkbox" id="sscheckbox12">
                                    <label for="sscheckbox12" class="redial-dark redial-font-weight-600">John Smith</label>
                                    <small class='float-right text-muted'><i class="fa fa-paperclip pr-1"></i> Aug 10</small>
                                    <small class="d-block pt-2"><i class="fa fa-star pr-2"></i> No Subject Lorem ipsum dolor sit amet </small>
                                </div>
                            </a>
                        </li>
                        <li class="border border-top-0 border-left-0 border-right-0">
                            <a href="#" class="h6">
                                <div class="form-group mb-0 p-3">
                                    <input type="checkbox" id="sscheckbox13">
                                    <label for="sscheckbox13" class="redial-dark redial-font-weight-600">Lauren Boggs</label>
                                    <small class='float-right text-muted'> Nov 5</small>
                                    <small class="d-block pt-2"><i class="fa fa-star pr-2"></i>Invite Lorem ipsum dolor sit amet</small>
                                </div>
                            </a>
                        </li>
                        <li class="border border-top-0 border-left-0 border-right-0">
                            <a href="#" class="h6">
                                <div class="form-group mb-0 p-3">
                                    <input type="checkbox" id="sscheckbox14">
                                    <label for="sscheckbox14" class="redial-dark redial-font-weight-600">Devid Taylor</label>
                                    <small class='float-right text-muted'><i class="fa fa-paperclip pr-1"></i> Jan 25</small>
                                    <small class="d-block pt-2"><i class="fa fa-star pr-2"></i>Developemnt  Lorem ipsum dolor sit amet</small>

                                </div>
                            </a>
                        </li>
                        <li class="border border-top-0 border-left-0 border-right-0">
                            <a href="#" class="h6">
                                <div class="form-group mb-0 p-3">
                                    <input type="checkbox" id="ccheckbox14">
                                    <label for="ccheckbox14" class="redial-dark redial-font-weight-600">Devid Taylor</label>
                                    <small class='float-right text-muted'><i class="fa fa-paperclip pr-1"></i> Jan 25</small>
                                    <small class="d-block pt-2"><i class="fa fa-star pr-2"></i>Developemnt  Lorem ipsum dolor sit amet</small>

                                </div>
                            </a>
                        </li>
                        <li class="border border-top-0 border-left-0 border-right-0">
                            <a href="#" class="h6">
                                <div class="form-group mb-0 p-3">
                                    <input type="checkbox" id="vcheckbox14">
                                    <label for="vcheckbox14" class="redial-dark redial-font-weight-600">Devid Taylor</label>
                                    <small class='float-right text-muted'><i class="fa fa-paperclip pr-1"></i> Jan 25</small>
                                    <small class="d-block pt-2"><i class="fa fa-star pr-2"></i>Developemnt  Lorem ipsum dolor sit amet</small>

                                </div>
                            </a>
                        </li>

                    </ul>

                </div>

            </div>

        </div>
    </div>
    <!-- End Chat-->
@endsection

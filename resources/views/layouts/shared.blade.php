<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supplium</title>

    <!-- Styles -->
    <link href="{{ asset('dist/images/favicon.ico') }}" rel="icon">
    <!--Plugin CSS-->
    <link href="{{ asset('dist/css/plugins.min.css') }}" rel="stylesheet">
    <!--main Css-->
    <link href="{{ asset('dist/css/main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shared.css') }}" rel="stylesheet">

{{--
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
--}}

</head>
<body>

@auth
<!-- header-->
<div id="header-fix" class="header py-4 py-lg-2 fixed-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-3 col-xl-2 align-self-center">
                <div class="site-logo">
{{--
                    <a href="index.html"><img src="{{ asset('dist/images/logo-v1.png')}}" alt="" class="img-fluid" /></a>
--}}

                    <h3 class="float-left" style="color:white">Supplium</h3>
                </div>
                <div class="navbar-header">
                    <button type="button" style="margin-top: 5px" id="sidebarCollapse" class="navbar-btn bg-transparent float-right center-block">
                        <i class="glyphicon glyphicon-align-left"></i>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-lg-3 align-self-center d-none d-lg-inline-block">
                <form>
                    <div class="form-group mb-0 redial-relative">
                        <input type="text" class="form-control redial-rounded-circle-50 border-0" placeholder="Search" />
                        <div class="btn-search">
                            <a href="#" class="redial-light"><i class="lnr lnr-magnifier redial-absolute redial-right-20"></i></a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-lg-6 col-xl-7 d-none d-lg-inline-block">
                <nav class="navbar navbar-expand-lg p-0">
                    <ul class="navbar-nav notification ml-auto d-inline-flex">
                        <li class="nav-item dropdown  align-self-center">
                            <a  class="nav-link p-3" data-toggle="dropdown" aria-expanded="false"><span class="lnr lnr-envelope h4 text-white"></span>
                                <span class="ring-point">
                                            <span class="ring"></span>
                                        </span>
                            </a>
                            <ul class="dropdown-menu border-bottom-0 rounded-0 py-0">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="media py-2">
                                            <img src="{{asset('dist/images/author.jpg')}}" alt="" class="d-flex mr-3 img-fluid redial-rounded-circle-50" />
                                            <div class="media-body">
                                                <h6 class="mb-0">john send a message</h6>
                                                <small class="redial-light">12 min ago</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="media py-2">
                                            <img src="{{asset('dist/images/author.jpg')}}" alt="" class="d-flex mr-3 img-fluid redial-rounded-circle-50" />
                                            <div class="media-body">
                                                <h6 class="mb-0">Peter send a message</h6>
                                                <small class="redial-light">15 min ago</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="media py-2">
                                            <img src="{{asset('dist/images/author.jpg')}}" alt="" class="d-flex mr-3 img-fluid redial-rounded-circle-50" />
                                            <div class="media-body">
                                                <h6 class="mb-0">Bill send a message</h6>
                                                <small class="redial-light">5 min ago</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li><a class="dropdown-item text-center py-2" href="#"> <strong>Read All Message <i class="fa fa-angle-right pl-2"></i></strong></a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown  align-self-center">
                            <a  class="nav-link p-3" data-toggle="dropdown" aria-expanded="false"><span class="lnr lnr-alarm h4 text-white"></span>
                                <span class="ring-point">
                                            <span class="ring"></span>
                                        </span>
                            </a>
                            <ul class="dropdown-menu border-bottom-0 rounded-0 py-0">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="media py-2">
                                            <img src="{{asset('dist/images/author.jpg')}}" alt="" class="d-flex mr-3 img-fluid redial-rounded-circle-50" />
                                            <div class="media-body">
                                                <h6 class="mb-0">john</h6>
                                                <small class="redial-light"> New user registered. </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="media py-2">
                                            <img src="{{asset('dist/images/author2.jpg')}}" alt="" class="d-flex mr-3 img-fluid redial-rounded-circle-50" />
                                            <div class="media-body">
                                                <h6 class="mb-0">Peter</h6>
                                                <small class="redial-light"> Server #12 overloaded. </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="media py-2">
                                            <img src="{{asset('dist/images/author3.jpg')}}" alt="" class="d-flex mr-3 img-fluid redial-rounded-circle-50" />
                                            <div class="media-body">
                                                <h6 class="mb-0">Bill</h6>
                                                <small class="redial-light"> Application error. </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li><a class="dropdown-item text-center py-3" href="#"> <strong>See All Tasks <i class="fa fa-angle-right pl-2"></i></strong></a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown user-profile align-self-center">
                            <a  class="nav-link" data-toggle="dropdown" aria-expanded="false">
                                <span class="float-right pl-3 text-white"><i class="fa fa-angle-down"></i></span>
                                <div class="media">
                                    <img src="{{asset('dist/images/author3.jpg')}}" alt="" class="d-flex mr-3 img-fluid redial-rounded-circle-50" width="45" />
                                    <div class="media-body align-self-center">
                                        <p class="mb-2 text-white text-uppercase font-weight-bold">{{Auth::user()->name}}</p>
                                        <small class="redial-primary-light font-weight-bold text-white"> {{Auth::user()->email}} </small>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu border-bottom-0 rounded-0 py-0">
                                <li><a class="dropdown-item py-2" href="#"><i class="fa fa-user pr-2"></i> User Profile</a></li>
                                <li><a class="dropdown-item py-2" href="{{route('user.settings')}}"><i class="fa fa-cog pr-2"></i> Setting</a></li>
                                <li><a class="dropdown-item py-2" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pr-2"></i> {{ __('Logout') }}


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form></a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End header-->

{{--

<!-- Main-content Top bar-->
<div class="redial-relative mt-80">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-2 align-self-center my-3 my-lg-0">
                <h6 class="text-uppercase redial-font-weight-700 redial-light mb-0 pl-2">Dashboard</h6>
            </div>
            <div class="col-12 col-md-4 align-self-center">
                <div class="float-sm-left float-none mb-4 mb-sm-0">
                    <ol class="breadcrumb mb-0 bg-transparent redial-light">
                        <li class="breadcrumb-item"><a href="#" class="redial-light">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard </li>
                    </ol>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="clearfix d-none d-md-inline">
                    <div class="float-sm-right float-none">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item h4 mb-0 redial-brd-right py-3 px-3 mr-0"><a href="#" class="redial-dark"><span class="lnr lnr-move"></span></a></li>
                            <li class="list-inline-item h4 mb-0 redial-brd-right py-3 px-3 mr-0"><a href="#" class="redial-dark"><span class="lnr lnr-sync"></span></a></li>
                            <li class="list-inline-item px-3 mr-0"><small class="font-weight-bold">Language : </small></li>
                            <li class="list-inline-item mr-0 bg-transparent">
                                <select class="form-control">
                                    <option>English</option>
                                    <option>French</option>
                                    <option>Russian</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main-content Top bar-->

--}}




<!-- main-content-->
<div class="wrapper redial-relative mt-80" style="padding-top: 20px">
    <nav id="sidebar" class="card redial-border-light px-2 mb-4">
        <div class="sidebar-scrollarea">
            <ul class="metismenu list-unstyled mb-0" id="menu">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard pr-1"></i> Dashboard</a></li>
                <li>
                    <a class="has-arrow" href="#" data-toggle="collapse" aria-expanded="false"><i class="icofont icofont-shopping-cart pr-1"></i> Orders</a>
                    <ul class="collapse list-unstyled">
                        <li><a href="{{route('order.history')}}">Order History</a></li>
                        <li><a href="{{route('order.standing')}}">Standing Orders</a></li>
                        <li><a href="{{route('order.new')}}">New Order</a></li>

                    </ul>
                </li>
                <li>
                    <a href="{{route('cogs')}}" ><i
                                class="icofont icofont-chart-bar-graph pr-1"></i> Cogs</a>

                </li>

                <li>
                    <a href="{{route('user.settings')}}" ><i
                                class="icofont icofont-settings pr-1"></i> Settings</a>
                </li>


            </ul>
        </div>
    </nav>

    @endauth
    <div id="content" class="container-fluid">

        @yield('content')

    </div>
</div>
<!-- End main-content-->

<!-- jQuery -->
<script src="{{ asset('dist/js/plugins.min.js') }}"></script>
<script src="{{ asset('dist/js/common.js') }}"></script>
{{--
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
--}}
@yield('extra')

</body>
</html>
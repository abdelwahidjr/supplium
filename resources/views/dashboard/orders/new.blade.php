@extends('layouts.shared')

@section('content')

    <div class="row mb-4">
        <div class="col-12 col-md-12">
            <div class="card redial-border-light redial-shadow form-tab" id="tabcontainer1">
                <div class="card-body">
                    <ul class="nav nav-fill flex-column flex-md-row mb-4" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link redial-dark redial-relative px-0 rounded active tab1" data-toggle="tab"
                               href="#tab1" role="tab" aria-controls="tab1" aria-expanded="true">
                                <div class="media text-left pl-3">
                                    <div class="d-flex mr-3 align-self-center"><h1 class="mb-0 redial-font-weight-900">
                                            1</h1></div>
                                    <div class="media-body redial-line-height-1_5">
                                        <h6 class="mb-0 text-uppercase">Products</h6>
                                        Select products of suppliers
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ml-lg-3 ml-1">
                            <a class="nav-link redial-dark redial-relative px-0 rounded tab2" data-toggle="tab"
                               href="#tab2" role="tab" aria-controls="tab2" aria-expanded="true">
                                <div class="media text-left pl-3">
                                    <div class="d-flex mr-3 align-self-center"><h1 class="mb-0 redial-font-weight-900">
                                            2</h1></div>
                                    <div class="media-body redial-line-height-1_5">
                                        <h6 class="mb-0 text-uppercase">Cart</h6>
                                        Checkout orders
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ml-lg-3 ml-1">
                            <a class="nav-link redial-dark redial-relative px-0 rounded tab3" data-toggle="tab"
                               href="#tab3" role="tab" aria-controls="tab3" aria-expanded="true">
                                <div class="media text-left pl-3">
                                    <div class="d-flex mr-3 align-self-center"><h1 class="mb-0 redial-font-weight-900">
                                            3</h1></div>
                                    <div class="media-body redial-line-height-1_5">
                                        <h6 class="mb-0 text-uppercase">Account</h6>
                                        Basic account info
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ml-lg-3 ml-1">
                            <a class="nav-link redial-dark redial-relative px-0 rounded tab4" data-toggle="tab"
                               href="#tab4" role="tab" aria-controls="tab4" aria-expanded="true">
                                <div class="media text-left pl-3">
                                    <div class="d-flex mr-3 align-self-center"><h1 class="mb-0 redial-font-weight-900">
                                            4</h1></div>
                                    <div class="media-body redial-line-height-1_5">
                                        <h6 class="mb-0 text-uppercase">Account</h6>
                                        Basic account info
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <!--start first tab -->

                        <div class="tab-pane fade active show" id="tab1" role="tabpanel" aria-labelledby="tab1"
                             aria-expanded="true">
                            <div class='row'>
                                <div class="col-12 col-sm-12">
                                    <div class="form">

                                        <div class="form-group col-sm-6">
                                            <select id="select" class="form-control select2">
                                                <option value="0">All Suppliers</option>
                                                @foreach($suppliers as $supplier)
                                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!--start data table-->

                                    <div class="row col-sm-12" style="margin-bottom: 50px;">
                                        <div class="col-12 col-sm-12">
                                            <div class="row">
                                                <div class="col-12 col-md-12">
                                                    <div class="card redial-border-light redial-shadow mb-12">
                                                        <div class="card-body">
                                                            <h6 class="header-title pl-3 redial-relative">Supplier
                                                                products</h6>


                                                            <table id="example" class="table table-bordered  mb-0 redial-font-weight-500 table-responsive d-md-table"
                                                                   cellspacing="0" width="100%">
                                                                <thead>
                                                                <tr>
                                                                    <th>id</th>
                                                                    <th>sku</th>
                                                                    <th>name</th>
                                                                    <th>unit</th>
                                                                    <th>price</th>
                                                                    <th>Manage</th>

                                                                </tr>
                                                                </thead>
                                                                <tfoot>
                                                                <tr>
                                                                    <th>id</th>
                                                                    <th>sku</th>
                                                                    <th>name</th>
                                                                    <th>unit</th>
                                                                    <th>price</th>
                                                                    <th>Manage</th>

                                                                </tr>
                                                                </tfoot>

                                                             {{--   <tbody id="categoryTable">



                                                                </tbody>--}}
                                                            </table>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end data table-->
                                </div>

                            </div>
                            <div class='text-center'>
                                <a href="#" data-tab="" data-container="tabcontainer1"
                                   class="tab-next btn disabled btn-primary btn-sm rounded-0 text-uppercase px-5 mr-sm-3 mr-0 d-block d-sm-inline-block"><i
                                            class="fa fa-long-arrow-left pr-2"></i> Prev</a>
                                <a href="#" data-container="tabcontainer1" data-tab="tab2"
                                   class="tab-next btn btn-primary btn-sm rounded-0 text-uppercase px-5 d-block d-sm-inline-block mt-sm-0 mt-3">
                                    Next <i class="fa fa-long-arrow-right pl-2"></i></a>
                            </div>
                        </div>
                        <!--end first tab -->


                        <!--start second tab -->


                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2"
                             aria-expanded="true">
                            <div class='row'>
                                <!--start data table-->

                                <div class="row col-sm-12" style="margin-bottom: 50px;">
                                    <div class="col-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-12 col-md-12">
                                                <div class="card redial-border-light redial-shadow mb-12">
                                                    <div class="card-body">
                                                        <h6 class="header-title pl-3 redial-relative">Cart
                                                            </h6>


                                                        <table id="orders" class="table table-bordered  mb-0 redial-font-weight-500 table-responsive d-md-table"
                                                               cellspacing="0" width="100%">
                                                            <thead>
                                                            <tr>
                                                                <th>sku</th>
                                                                <th>name</th>
                                                                <th>price</th>
                                                                <th>unit</th>
                                                                <th>supplier</th>
                                                                <th>quantity</th>
                                                                <th>total</th>

                                                            </tr>
                                                            </thead>
                                                            <tfoot>
                                                            <tr>
                                                                <th>sku</th>
                                                                <th>name</th>
                                                                <th>price</th>
                                                                <th>unit</th>
                                                                <th>supplier</th>
                                                                <th>quantity</th>
                                                                <th>total</th>

                                                            </tr>
                                                            </tfoot>


                                                        </table>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class='text-center'>
                                <a href="#" data-tab="tab1"
                                   class="tab-next btn btn-primary btn-sm rounded-0 text-uppercase px-5  mr-3"><i
                                            class="fa fa-long-arrow-left pr-2"></i> Prev</a>
                                <a href="#" data-tab="tab3"
                                   class="tab-next btn btn-primary btn-sm rounded-0 text-uppercase px-5"> Prev <i
                                            class="fa fa-long-arrow-right pl-2"></i></a>
                            </div>
                        </div>

                        <!--end second tab -->

                        <!--start third tab -->

                        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3"
                             aria-expanded="true">
                            <div class='row'>
                                <div class="col-12 col-sm-6">
                                    <div class="form">
                                        <div class="form-group">
                                            <label class="redial-font-weight-800 redial-dark">Email address</label>
                                            <input type="text" class="form-control bg-transparent" placeholder=""/>
                                            <small class="form-text">You will occasionally receive account related
                                                emails.
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form">
                                        <div class="form-group">
                                            <label class="redial-font-weight-800 redial-dark">Username</label>
                                            <input type="text" class="form-control bg-transparent" placeholder=""/>
                                            <small class="form-text">Only letters, numbers, and underscores are
                                                allowed.
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form">
                                        <div class="form-group">
                                            <label class="redial-font-weight-800 redial-dark">Password</label>
                                            <input type="password" class="form-control bg-transparent" placeholder=""/>
                                            <small class="form-text">6-character minimum; case sensitive.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form">
                                        <div class="form-group">
                                            <label class="redial-font-weight-800 redial-dark">Conform - Password</label>
                                            <input type="password" class="form-control bg-transparent" placeholder=""/>
                                            <small class="form-text">6-character minimum; case sensitive.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='text-center'>
                                <a href="#" data-tab="tab2"
                                   class="tab-next btn btn-primary btn-sm rounded-0 text-uppercase px-5  mr-3"><i
                                            class="fa fa-long-arrow-left pr-2"></i> Prev</a>
                                <a href="#" data-tab="tab4"
                                   class="tab-next btn btn-primary btn-sm rounded-0 text-uppercase px-5"> Prev <i
                                            class="fa fa-long-arrow-right pl-2"></i></a>
                            </div>
                        </div>

                        <!--end third tab -->


                        <!--start fourth tab -->

                        <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4"
                             aria-expanded="true">
                            <div class='row'>
                                <div class="col-12 col-sm-6">
                                    <div class="form">
                                        <div class="form-group">
                                            <label class="redial-font-weight-800 redial-dark">Email address</label>
                                            <input type="text" class="form-control bg-transparent" placeholder=""/>
                                            <small class="form-text">You will occasionally receive account related
                                                emails.
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form">
                                        <div class="form-group">
                                            <label class="redial-font-weight-800 redial-dark">Username</label>
                                            <input type="text" class="form-control bg-transparent" placeholder=""/>
                                            <small class="form-text">Only letters, numbers, and underscores are
                                                allowed.
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form">
                                        <div class="form-group">
                                            <label class="redial-font-weight-800 redial-dark">Password</label>
                                            <input type="password" class="form-control bg-transparent" placeholder=""/>
                                            <small class="form-text">6-character minimum; case sensitive.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form">
                                        <div class="form-group">
                                            <label class="redial-font-weight-800 redial-dark">Conform - Password</label>
                                            <input type="password" class="form-control bg-transparent" placeholder=""/>
                                            <small class="form-text">6-character minimum; case sensitive.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='text-center'>
                                <a href="#" data-tab="tab3"
                                   class="tab-next btn btn-primary btn-sm rounded-0 text-uppercase px-5  mr-3"><i
                                            class="fa fa-long-arrow-left pr-2"></i> Prev</a>
                                <a href="#" data-tab=""
                                   class="tab-next disabled btn btn-primary btn-sm rounded-0 text-uppercase px-5"> Prev
                                    <i class="fa fa-long-arrow-right pl-2"></i></a>
                            </div>
                        </div>

                        <!--end fourth tab -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--start model -->


    <div id="mymodel" class="sweet-alert  hidden " tabindex="-1" data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop" data-timer="null" style="display: block; margin-top: -181px;"><div class="sa-icon sa-error" style="display: none;">
      <span class="sa-x-mark">
        <span class="sa-line sa-left"></span>
        <span class="sa-line sa-right"></span>
      </span>
        </div><div class="sa-icon sa-warning" style="display: none;">
            <span class="sa-body"></span>
            <span class="sa-dot"></span>
        </div>
        <div class="sa-icon sa-info" style="display: none;"></div><div class="sa-icon sa-success animate" style="display: block;">
            <span class="sa-line sa-tip animateSuccessTip"></span>
            <span class="sa-line sa-long animateSuccessLong"></span>

            <div class="sa-placeholder"></div>
            <div class="sa-fix"></div>
        </div><div class="sa-icon sa-custom" style="display: none;"></div><h4>Order was added to your Card!</h4>
        <div class="sa-button-container">
            <button class="cancel btn btn-lg btn-default" tabindex="2" style="display: none;">Cancel</button>
            <div class="sa-confirm-button-container">
                <button id="ok-btn" class="confirm btn btn-lg btn-primary" tabindex="1" style="display: inline-block;">OK</button><div class="la-ball-fall">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div></div>

    <!--end model -->
@endsection

@section('extra')


    <script src="{{ asset('js/new_order.js') }}"></script>

@endsection

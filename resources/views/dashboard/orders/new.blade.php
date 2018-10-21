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


                                                            <table id="example"
                                                                   class="table table-bordered  mb-0 redial-font-weight-500 table-responsive d-md-table"
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


                                                        <table id="orders"
                                                               class="table table-bordered  mb-0 redial-font-weight-500 table-responsive d-md-table"
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
                                                                <th>manage</th>

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
                                                                <th>manage</th>

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


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--start model -->


    <div id="mymodel" class="sweet-alert  hidden " tabindex="-1" data-custom-class="" data-has-cancel-button="false"
         data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false"
         data-animation="pop" data-timer="null" style="display: block; margin-top: -181px;">
        <div class="sa-icon sa-error" style="display: none;">
      <span class="sa-x-mark">
        <span class="sa-line sa-left"></span>
        <span class="sa-line sa-right"></span>
      </span>
        </div>
        <div class="sa-icon sa-warning" style="display: none;">
            <span class="sa-body"></span>
            <span class="sa-dot"></span>
        </div>
        <div class="sa-icon sa-info" style="display: none;"></div>
        <div class="sa-icon sa-success animate" style="display: block;">
            <span class="sa-line sa-tip animateSuccessTip"></span>
            <span class="sa-line sa-long animateSuccessLong"></span>

            <div class="sa-placeholder"></div>
            <div class="sa-fix"></div>
        </div>
        <div class="sa-icon sa-custom" style="display: none;"></div>
        <h4 style="margin-top: 10px" id="popup-message"></h4>
        <div class="sa-button-container">
            <button class="cancel btn btn-lg btn-default" tabindex="2" style="display: none;">Cancel</button>
            <div class="sa-confirm-button-container">
                <button id="ok-btn" class="confirm btn btn-lg btn-primary" tabindex="1" style="display: inline-block;">
                    OK
                </button>
                <div class="la-ball-fall">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>

    <!--end model -->




    <!--start danager model-->
    <div id="danger-model" class="sweet-alert  hidden" tabindex="-1" data-custom-class="" data-has-cancel-button="false"
         data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false"
         data-animation="pop" data-timer="null" style="display: block; margin-top: -181px;">
        <div class="sa-icon sa-error animateErrorIcon" style="display: block;">
      <span class="sa-x-mark animateXMark">
        <span class="sa-line sa-left"></span>
        <span class="sa-line sa-right"></span>
      </span>
        </div>
        <div class="sa-icon sa-warning" style="display: none;">
            <span class="sa-body"></span>
            <span class="sa-dot"></span>
        </div>
        <div class="sa-icon sa-info" style="display: none;"></div>
        <div class="sa-icon sa-success" style="display: none;">
            <span class="sa-line sa-tip"></span>
            <span class="sa-line sa-long"></span>

            <div class="sa-placeholder"></div>
            <div class="sa-fix"></div>
        </div>
        <div class="sa-icon sa-custom" style="display: none;"></div>
        <h2 style="margin-top: 15px;" id="danger-msg"></h2>
        <div class="form-group">
            <input type="text" class="form-control" tabindex="3" placeholder="">
            <span class="sa-input-error help-block">
        <span class="glyphicon glyphicon-exclamation-sign"></span> <span class="sa-help-text">Not valid</span>
      </span>
        </div>
        <div class="sa-button-container">
            <button class="cancel btn btn-lg btn-default" tabindex="2" style="display: none;">Cancel</button>
            <div class="sa-confirm-button-container">
                <button id="hide-btn" class="confirm btn btn-lg btn-danger" tabindex="1" style="display: inline-block;">
                    OK
                </button>
                <div class="la-ball-fall">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <!--end danager model-->




    <!-- Launch Demo Modal -->
    <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content redial-border-light">
                <div class="modal-header redial-border-light">
                    <h5 class="modal-title pt-2" id="exampleModalLabel">Complete order details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="card-body">
                            <form id="model-form" onsubmit="return false;">
                                <div class="form-group">
                                    <label class="redial-font-weight-600">Notes</label>
                                    <input id="order-notes" type="text" class="form-control" placeholder="Enter Notes"
                                           required/>
                                    <span id="notes-msg" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label class="redial-font-weight-600">Tax</label>
                                    <input id="order-tax" type="number" class="form-control"
                                           placeholder="ex : 10.00" required/>
                                    <span id="tax-msg" class="text-danger"></span>
                                </div>


                                <div class="form-group">
                                    <label class="redial-font-weight-600">Select Outlet</label>

                                    <select id="outlet-select" class="form-control select2" required>
                                        @foreach($outlets as $outlet)
                                            <option value="{{$outlet->id}}">{{$outlet->name}}</option>
                                        @endforeach
                                    </select>
                                    <span id="outlet-msg" class="text-danger"></span>

                                </div>


                                <div class="form-group">
                                    <label class="redial-font-weight-600">Select Order Type</label>

                                    <select id="type-select" class="form-control select2" required>
                                        <option value="normal">Normal</option>
                                        <option value="standing">Standing</option>
                                    </select>

                                </div>

                                <div id="standing-container" style="display: none">
                                    <div class="form-group">
                                        <label class="redial-font-weight-600">Standing Order Name</label>
                                        <input id="standing-order-name" type="text" class="form-control"
                                               placeholder="Standing Order Name" required/>
                                        <span id="name-msg" class="text-danger"></span>

                                    </div>


                                    <div class="form-group">
                                        <label class="redial-font-weight-600">Select Order State</label>
                                        <select id="state-select" class="form-control select2" required>
                                            <option value="active">Active</option>
                                            <option value="expired">Expired</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="redial-font-weight-600">Select Repeted Period</label>
                                        <select id="period-select" class="form-control select2" required>
                                            <option value="1 week">1 Week</option>
                                            <option value="2 week">2 Week</option>
                                            <option value="3 week">3 Week</option>
                                            <option value="4 week">4 Week</option>
                                        </select>
                                        <span id="period-msg" class="text-danger"></span>

                                    </div>

                                    <div class="form-group">
                                        <label class="redial-font-weight-600">Select Repeted Days</label>
                                        <select id="days-select" class="form-control select2" multiple>
                                            <option value="Sun">Sun</option>
                                            <option value="Mon">Mon</option>
                                            <option value="Tue">Tue</option>
                                            <option value="Wed">Wed</option>
                                            <option value="Thu">Thu</option>
                                            <option value="Fri">Fri</option>
                                            <option value="Sat">Sat</option>
                                        </select>

                                        <span id="days-msg" class="text-danger"></span>

                                    </div>


                                    <div class="form-group">
                                        <label class="redial-font-weight-600">Start Date</label>
                                        <input type="date" id="start-date" placeholder="Date" class="form-control">
                                        <span id="start-date-msg" class="text-danger"></span>

                                    </div>


                                    <div class="form-group">
                                        <label class="redial-font-weight-600">End Date</label>
                                        <input type="date" id="end-date" placeholder="Date" class="form-control">
                                        <span id="end-date-msg" class="text-danger"></span>

                                    </div>


                                </div>


                                <div class="redial-divider my-4"></div>
                                <button id="submit" class="btn btn-primary btn-xs">Submit</button>
                                <div class="progress mb-3 redial-bg-secondry">
                                    <div id="progress-id"
                                         class="progress-bar progress-bar-striped active redial-bg-primary"
                                         role="progressbar" style="width: 0px;margin-top: 5px;" aria-valuenow="100"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer redial-border-light">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!--End Launch Demo Modal -->




@endsection

@section('extra')

    <!-- provide the csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <script src="{{ asset('js/new_order.js') }}"></script>

@endsection

@extends('layouts.shared')

@section('content')
    <div class="row mb-4">
        <div class="col-12 col-md-12">
            <div class="card redial-border-light redial-shadow form-tab" id="tabcontainer1">
                <div class="card-body">
                    <ul class="nav nav-fill flex-column flex-md-row mb-4" id="myTab" role="tablist">

                        <li class="nav-item">
                            <a id="first-header" class="nav-link redial-dark redial-relative px-0 rounded disabled tab1" data-toggle="tab"
                               href="#tab1" role="tab" aria-controls="" aria-expanded="true">
                                <div class="media text-left pl-3">
                                    <div class="d-flex mr-3 align-self-center"><h1 class="mb-0 redial-font-weight-900">
                                            1</h1></div>
                                    <div class="media-body redial-line-height-1_5">
                                        <h6 class="mb-0 text-uppercase">Name & Supplier</h6>
                                        Select your supplier
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item ml-lg-3 ml-1">
                            <a id="second-header" class="nav-link redial-dark redial-relative px-0 rounded disabled tab2" data-toggle="tab"
                               href="#tab2" role="tab" aria-controls="tab2" aria-expanded="true">
                                <div class="media text-left pl-3">
                                    <div class="d-flex mr-3 align-self-center"><h1 class="mb-0 redial-font-weight-900">
                                            2</h1></div>
                                    <div class="media-body redial-line-height-1_5">
                                        <h6 class="mb-0 text-uppercase">Supplier Products</h6>
                                        Select products
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item ml-lg-3 ml-1">
                            <a id="third-header" class="nav-link redial-dark redial-relative px-0 rounded disabled tab3" data-toggle="tab"
                               href="#tab3" role="tab" aria-controls="tab3" aria-expanded="true">
                                <div class="media text-left pl-3">
                                    <div class="d-flex mr-3 align-self-center"><h1 class="mb-0 redial-font-weight-900">
                                            3</h1></div>
                                    <div class="media-body redial-line-height-1_5">
                                        <h6 class="mb-0 text-uppercase">Selected Products</h6>
                                        Check your Selected products
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item ml-lg-3 ml-1">
                            <a id="fourth-header" class="nav-link redial-dark redial-relative px-0 rounded disabled tab4" data-toggle="tab"
                               href="#tab4" role="tab" aria-controls="tab4" aria-expanded="true">
                                <div class="media text-left pl-3">
                                    <div class="d-flex mr-3 align-self-center"><h1 class="mb-0 redial-font-weight-900">
                                            4</h1></div>
                                    <div class="media-body redial-line-height-1_5">
                                        <h6 class="mb-0 text-uppercase">Finishing Order</h6>
                                       Finish Your Order
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

                                        <div class="form-group col-sm-8">
                                            <label class="redial-font-weight-600">Choose Your Supplier</label>
                                            <select id="select" class="form-control select2">
                                                <option value="0">Choose Supplier</option>
                                                @foreach($suppliers as $supplier)
                                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group col-sm-6">
                                            <label class="redial-font-weight-600">Name your standing order</label>
                                            <input id="standing-order-name" type="text" class="form-control"
                                                   placeholder="Standing Order Name" required/>
                                            <span id="name-msg" class="text-danger"></span>

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class='text-center'>

                                <button id="first_next_btn" disabled data-container="tabcontainer1" data-tab="tab2"
                                        class="tab-next btn btn-primary btn-sm rounded-0 text-uppercase px-5 d-block d-sm-inline-block mt-sm-0 mt-3">
                                    Next <i class="fa fa-long-arrow-right pl-2"></i></button>
                            </div>
                        </div>
                        <!--end first tab -->


                        <!--start second tab -->


                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2"
                             aria-expanded="true">

                            <div class='row'>
                                <div class='row pull-right'>
                                    <button id="refresh-btn" class="btn btn-primary pull-right" style="margin-left: 5px;"><i class="icofont icofont-refresh"></i></button>
                                </div>
                                <!--start data table-->
                                <div class="col-12 col-lg-12 col-lg-offset-12">
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

                                    </table>
                                </div>




                            </div>
                            <div class='text-center'>
                                <a href="#" id="second_prev_btn"  data-tab="tab1" class="tab-next btn btn-primary btn-sm rounded-0 text-uppercase px-5  mr-3"><i class="fa fa-long-arrow-left pr-2"></i> Prev</a>
                                <a href="#" id="second_next_btn"  data-tab="tab3" class="tab-next btn btn-primary btn-sm rounded-0 text-uppercase px-5 disabled"> Next <i class="fa fa-long-arrow-right pl-2"></i></a>
                            </div>
                        </div>
                        <!--end second tab -->

                        <!--start third tab -->


                        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3"
                             aria-expanded="true">
                            <div class='row'>
                                <!--start data table-->


                                <div class="col-12 col-lg-12 col-lg-offset-12">
                                    <table id="selected-products"
                                           class="table table-bordered  mb-0 redial-font-weight-500 table-responsive d-md-table"
                                           cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>sku</th>
                                            <th>name</th>
                                            <th>price</th>
                                            <th>unit</th>
                                            <th>quantity</th>
                                            <th>total</th>
                                            <th>manage</th>

                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>sku</th>
                                            <th>name</th>
                                            <th>price</th>
                                            <th>unit</th>
                                            <th>quantity</th>
                                            <th>total</th>
                                            <th>manage</th>

                                        </tr>
                                        </tfoot>

                                    </table>
                                </div>


                            </div>
                            <div class='text-center'>
                                <a href="#" id="third_prev_btn" data-tab="tab2" class="tab-next btn btn-primary btn-sm rounded-0 text-uppercase px-5  mr-3"><i class="fa fa-long-arrow-left pr-2"></i> Prev</a>
                                <a href="#" id="third_next_btn" data-tab="tab4" class="tab-next btn btn-primary btn-sm rounded-0 disabled text-uppercase px-5"> Next <i class="fa fa-long-arrow-right pl-2"></i></a>
                            </div>
                        </div>
                        <!--end third tab -->


                        <!--start fourth tab -->


                        <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4"
                             aria-expanded="true">
                            <div class='row'>
                                <div class="col-8 col-lg-8 col-lg-offset-8">
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




                                    <div id="standing-container">


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
                            <div class='text-center'>
                                <a href="#"  id="fourth_prev_btn"  data-tab="tab3" class="tab-next btn btn-primary btn-sm rounded-0 text-uppercase px-5  mr-3"><i class="fa fa-long-arrow-left pr-2"></i> Prev</a>
                            </div>
                        </div>
                        <!--end fourth tab -->

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





            @endsection
            @section('extra')
                <script src="{{asset('js/new_standing_order.js')}}"></script>
@endsection
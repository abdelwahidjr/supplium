@extends('layouts.shared')

@section('content')




    <div class="row">
    <div class="col-9 col-xl-9 mb-4 mb-xl-0">
        <div class="card redial-border-light redial-shadow">
            <div class="card-body">
                <div class="custom-tabs2">
                    <ul class="nav nav-tabs flex-column flex-md-row nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link redial-light rounded-0 active" data-toggle="tab" href="#id1" role="tab" aria-selected="true" aria-expanded="true"><i class="icofont icofont-list pr-2"></i> All Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link redial-light rounded-0" data-toggle="tab" href="#id2" role="tab" aria-selected="false" aria-expanded="false"><i class="icofont icofont-list pr-2"></i> Guide</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link redial-light rounded-0" data-toggle="tab" href="#id3" role="tab" aria-selected="false" aria-expanded="false"><i class="icofont icofont-shopping-cart pr-2"></i> Checkout</a>
                        </li>
                    </ul>
                    <div class="tab-content border redial-border-light" id="myTabContent">
                        <div class="tab-pane fade active show" id="id1" role="tabpanel" aria-expanded="true">
                            <div class="card-body">

                                <div class="form col-lg-12 col-sm-6" style="margin-bottom: 20px;">
                                    <div class="form-group ">
                                        <select id="select" class="form-control select2 col-sm-6">
                                            <option value="0">All Suppliers</option>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <table id="example"
                                       class="table table-bordered  mb-0 redial-font-weight-500 table-responsive d-md-table"
                                       cellspacing="0" width="100%" >
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
                        <div class="tab-pane fade" id="id2" role="tabpanel" aria-expanded="false">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, suscipit, autem sit natus deserunt officia error odit ea minima soluta ratione maxime molestias fugit explicabo aspernatur praesentium quisquam voluptatum fuga delectus quidem quas aliquam minus at corporis libero? Modi, aperiam, pariatur, sequi illum dolore consequuntur aspernatur eos hic officia doloribus magnam impedit autem maiores.
                            </div>
                        </div>
                        <div class="tab-pane fade" id="id3" role="tabpanel" aria-expanded="false">
                            <div class="card-body">


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


    <div class="col-3 col-xl-3 mb-4 mb-xl-0">
        <div class="card redial-border-light redial-shadow">
            <div class="card-body">

                <div class="input-group" style="margin-bottom: 15px;">
                    <button class="btn btn-success"><i class="icofont icofont-shopping-cart"></i> Go to Checkout ! (<span id="items-count"></span> items )</button><span
                            class="input-group-btn">
                                       </span>
                </div>


                <div id="accordion2" role="tablist">

                </div>

            </div></div></div>

    </div>



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
    <script src="{{ asset('js/place_order.js') }}"></script>


@endsection

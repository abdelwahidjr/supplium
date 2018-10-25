@extends('layouts.shared')

@section('extra_head')
    <link rel="stylesheet" media="screen" href="https://handsontable.com/docs/6.1.0/components/handsontable/dist/handsontable.full.css">
    
@endsection
@section('content')
 
<div class="col-12 col-md-12 mb-4 mb-md-0">
                                <div class="card redial-border-light redial-shadow">
                                    <div class="card-body">
                                        <div class="wizard redial-relative">
                                            <div class="wizard-inner">
                                                <div class="connecting-line"></div>
                                                <ul class="nav nav-fill flex-column flex-sm-row mb-2" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link redial-dark redial-relative round-tab text-left p-0 active" data-toggle="tab" href="#id1" role="tab" aria-controls="id1" aria-expanded="true"> 
                                                            <i class="fa fa-user redial-rounded-circle-50 text-white h5 mb-0 redial-relative"></i>
                                                            <small class="d-block redial-font-weight-800">Supplier Information</small>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link redial-dark redial-relative round-tab text-sm-center text-left p-0" data-toggle="tab" href="#id2" role="tab" aria-controls="id2" aria-expanded="true"> 
                                                            <i class="fa fa-key redial-rounded-circle-50 text-white h5 mb-0 redial-relative"></i>
                                                            <small class="d-block redial-font-weight-800">Payment Terms</small>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link redial-dark redial-relative round-tab text-sm-right text-left p-0" data-toggle="tab" href="#id3" role="tab" aria-controls="id3" aria-expanded="true"> 
                                                            <i class="fa fa-credit-card-alt redial-rounded-circle-50 text-white h5 mb-0 redial-relative"></i>
                                                            <small class="d-block redial-font-weight-800">Products</small>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            
                                        </div>
                                        <div class='alert alert-danger alert-error' style='display:none'></div>
                                        <form id="supplier_form" data-toggle="validator" method="POST"
                                              action="{{ url('dashboard/supplier') }}">
                                        {!! csrf_field() !!}
                                        <div class="tab-content" id="myTabContent">
                                           
                                            <div class="tab-pane fade active show" id="id1" role="tabpanel" aria-labelledby="id1" aria-expanded="true">
                                                <div class="form row">
                                                    <div class=" col-md-12">
                                                        <label class="redial-font-weight-800 redial-dark">Email</label>
                                                        <input type="email" name="email" data-error="Email address is invalid" required class="form-control bg-transparent" placeholder="" />
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class=" col-md-6">
                                                        <label class="redial-font-weight-800 redial-dark">Full Name</label>
                                                        <input type="text" name="name" class="form-control bg-transparent" placeholder="" />
                                                       
                                                    </div>
                                                    <div class=" col-md-6">
                                                        <label class="redial-font-weight-800 redial-dark">Phone</label>
                                                        <input type="text" name="phone" class="form-control  bg-transparent" placeholder="" />
            
                                                    </div>
                                                    <input type='hidden' name='company_id' value='1' />
                                                    
                                                    <div class="col-md-12">
                                                        <label class="redial-font-weight-800 redial-dark">Address</label>
                                                        <input type="text" name='address' class="form-control bg-transparent" placeholder="" />
                                                        
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="redial-font-weight-800 redial-dark">Supplier Category</label>
                                                        <select name="category_id" class="form-control select2" multiple>
                                                            <optgroup label="All Categories">
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                            </optgroup>
                                                        </select>
                                                        
                                                    </div>
                                                    
                                                    <div class="col-md-12"></div>
                                                    <div class="clearfix" style="margin-top:20px"></div>
                                                    <div class='text-center' style="width: 100%;">
                                                        <a href="#" data-tab="" class="disabled btn btn-primary btn-sm rounded-0 text-uppercase px-5 mr-sm-3 mr-0 float-sm-left"><i class="fa fa-long-arrow-left pr-2"></i> Prev</a>
                                                        <a href="#" data-target="id2" data-tab="id2" class="tab_move btn btn-primary btn-sm rounded-0 text-uppercase px-5 mr-sm-3 mr-0 float-sm-right"> Next <i class="fa fa-long-arrow-right pl-2"></i></a>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="id2" role="tabpanel" aria-labelledby="id2" aria-expanded="true">
                                                <div class="form row">
                                                
                                                    <div class="col-md-12">
                                                        <label style="margin-right:25px" class="radio-inline"><input type="radio" name="payment_type" value='cash' />Cash</label>
                                                        <label class="radio-inline"><input type="radio" name="payment_type" value='credit' >Credit</label>
                                                    </div>
                                                    <div class="credit_method" style="display:none">
                                                        <div class="col-md-6">
                                                            <label class="redial-font-weight-800 redial-dark">Credit Limit</label>
                                                            <input type="text" name="credit_limit" class="form-control bg-transparent" placeholder="" />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="redial-font-weight-800 redial-dark">Credit Period</label>
                                                            <input type="text" name="credit_period"  class="form-control bg-transparent" placeholder="" />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="redial-font-weight-800 redial-dark">Payment Due Date</label>
                                                            <input type="text" name="payment_due_date" class="form-control bg-transparent" placeholder="" />
                                                        </div>
                                                        <input type='hidden' name='restrict' value='off' />
                                                    </div>

                                                    <div class="col-md-12"></div>
                                                    <div class="clearfix" style="margin-top:20px"></div>
                                                   
                                                    <div class='text-center' style="width: 100%;">
                                                        <a href="#" data-target="id1" class="tab_move btn btn-primary btn-sm rounded-0 text-uppercase px-5 mr-sm-3 mr-0 float-sm-left"><i class="fa fa-long-arrow-left pr-2"></i> Prev</a>
                                                        <a href="#" data-target="id3" class="tab_move btn btn-primary btn-sm rounded-0 text-uppercase px-5 mr-sm-3 mr-0 float-sm-right"> Next <i class="fa fa-long-arrow-right pl-2"></i></a>
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="tab-pane fade" id="id3" role="tabpanel" aria-labelledby="id3" aria-expanded="true">
                                                <div class="form-group" >
                                                    <div style="margin:10px"><div id="exampleGrid" class="dataTable"></div></div>

                                                    <div class='text-center'>
                                                        <a href="#" data-target="id2" class="tab_move btn btn-primary btn-sm rounded-0 text-uppercase px-5 mr-sm-3 mr-0 float-sm-left"><i class="fa fa-long-arrow-left pr-2"></i> Prev</a>
                                                        <button type='submit' class="btn  btn-primary btn-sm rounded-0 text-uppercase px-5 mr-sm-3 mr-0 float-sm-right">Submit</Button>
                                                    </div>

                                                   
                                                </div>

                                                
                                            </div>

                                          
                                        </div>
                                        </form>  
                                    </div>
                                </div> 
                            </div>

@endsection


@section('extra')
<script src="https://handsontable.com/docs/6.1.0/components/handsontable/dist/handsontable.full.js"></script>
<script>
$(document).ready(function () {
    var myData = [];

$("#exampleGrid").handsontable({
    data: myData,
    height:500,
    //width:600,
    defaultRowHeight: 50,
    //stretchH: 'last',
    //stretchH: "all",
    colHeaders: ['SKU', 'Product Name', 'Unit', 'Price (SAR)'],
    colWidths: [95, 200, 200, 100, 100],
	columns: [
    {type: 'numeric'},
    {},
    /*{
      type: 'dropdown',
      source: ['yellow', 'red', 'orange', 'green', 'blue', 'gray', 'black', 'white']
    },
    */
    {
      type: 'dropdown',
      source: ['kg','liter','packet','bucket','case','piece','box','gallon']
    },{}
  ],
    //startRows: 5,
    //startCols: 5,
    //minSpareCols: 1,
    //always keep at least 1 spare row at the right
    //always keep at least 1 spare row at the bottom,
    rowHeaders: true,
    //colHeaders: true,
    contextMenu: false,
    minSpareRows: 15,
	//manualColumnResize: true,
});


});
</script>
<script>
$(document).ready(function(){
    $("[name=payment_type]").click(function(){
        if($(this).val() == 'credit'){
            $(".credit_method").fadeIn("slow");
        }else{
            $(".credit_method").fadeOut("fast");
        }
        
    });

    $("[role=tab]").click(function(){
        if($(this).attr('aria-controls') == "id3"){
          setTimeout(() => {
            $("#exampleGrid").handsontable('render');   
          }, 200);  
        }
    });

    $('#supplier_form').submit(function (event) {
        event.preventDefault();
        if($(this)[0].checkValidity()) {
            
                var $container = $("#exampleGrid");
                var handsontable = $container.data('handsontable');
                var products = handsontable.getData();
                var serial_data = $( this ).serializeArray();
            
            var data = {};
            for(var i=0;i<serial_data.length;i++){
                    data[serial_data[i].name] = serial_data[i].value;
            }

            var pro = [];
            for(var i=0;i<products.length;i++){
                    pro[i] = {
                        sku : products[i][0],
                        name: products[i][1],
                        unit: products[i][2],
                        price: products[i][3]
                    }
            }
             data.products = pro;
            
            $.ajax({
                    url: $(this).attr('action'),
                    data: data, //returns all cells' data
                    type: 'POST',
                    success: function (response) {
                        if(response.success == true){
                            swal("Insert Successfully", "", "success");
                            window.location.href = "{{url('dashboard/supplier/all')}}";
                        }
                        //console.log(response);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
        }else{
            
        }
        
    
    
});

    $("[aria-controls=id2]").prop("disabled",true);
    $("[aria-controls=id3]").prop("disabled",true);
  $(".tab_move").click(function(){
        var target_tab = $(this).attr("data-target");
        var open_tab = false;
        
        if(target_tab == 'id2'){
            if($("[name=email]").val() == "") {
                $(".alert-error").text("Please enter your email");
                $(".alert-error").fadeIn("slow");
                $("[name=email]").focus();
                open_tab = false;
            }else  if($("[name=name]").val() == "") {
                $(".alert-error").text("Please enter your full name");
                $(".alert-error").fadeIn("slow");
                $("[name=name]").focus();
                open_tab = false;
            }else  if($("[name=address]").val() == "") {
                $(".alert-error").text("Please enter your address");
                $(".alert-error").fadeIn("slow");
                $("[name=address]").focus();
                open_tab = false;
            }else  if($("[name=phone]").val() == "") {
                $(".alert-error").text("Please enter your phone");
                $(".alert-error").fadeIn("slow");
                $("[name=phone]").focus();
                open_tab = false;
            }else  if($("[name=category_id]").val() == null) {
                $(".alert-error").text("Please select category");
                $(".alert-error").fadeIn("slow");
                $("[name=category_id]").focus();
                open_tab = false;
            }else{
                open_tab = true;
            }
        }else if(target_tab == 'id2'){

        }else{
            open_tab = true;
        }
        
        if(open_tab == true){
            $(".alert-error").hide();
            $("[aria-controls="+target_tab+"]").prop("disabled",false);
            $("[aria-controls="+target_tab+"]").trigger('click');
        }else{
            $("[aria-controls="+target_tab+"]").prop("disabled",true);
        }
       
    });   
   
});
</script>

@endsection


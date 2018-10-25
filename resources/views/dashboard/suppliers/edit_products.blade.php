@extends('layouts.shared')

@section('extra_head')
    <link rel="stylesheet" media="screen" href="https://handsontable.com/docs/6.1.0/components/handsontable/dist/handsontable.full.css">
        
    
@endsection
@section('content')

<div class="col-12 col-md-12 mb-4 mb-md-0">
                                <div class="card redial-border-light redial-shadow">
                                    <div class="card-body">
                                        
                                    
 <div class='alert alert-danger alert-error' style='display:none'></div>
                                        <form id="supplier_form" data-toggle="validator" method="POST" action="{{ url('public/supplier/web_update_products/'.$supplier->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                              
                                                <div class="form row">
                                                    <div class="form-group" style="    width: 100%;" >
                                                        <div class="col-md-12">
                                                            <div style="margin:10px"><div id="exampleGrid" class="dataTable"></div></div>
                                                        </div>
                                                        <div class="col-md-12"></div>
                                                        <div class="clearfix" style="margin-top:20px"></div>
                                                        <div class='text-center' style="width: 100%;">
                                                              <button type='submit' class="btn  btn-primary btn-sm rounded-0 text-uppercase px-5 mr-sm-3 mr-0 float-sm-right">Save</Button>

                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </form>
                            </div>
                       </div>
    </div>

@endsection


@section('extra')
<script src="https://docs.handsontable.com/pro/1.18.1/bower_components/handsontable-pro/dist/handsontable.full.min.js"></script>
<script>
$(document).ready(function () {
       var _token = "{{ csrf_token() }}";
      $.ajax({
                    url: "{{url('public/supplier/get_products/'.$supplier->id)}}",
                    data: {_token:_token}, 
                    type: 'POST',
                    success: function (response) {
                        
                         var myData = response;

                        $("#exampleGrid").handsontable({
                            data: myData,
                            height:500,
                            //width:600,
                            defaultRowHeight: 50,
                            //stretchH: 'last',
                            //stretchH: "all",
                            colHeaders: ['SKU', 'Product Name', 'Unit', 'Price (SAR)','product_id'],
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
                            },{},{}
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
                             hiddenColumns: {
                                columns: [4],
                                indicators: true
                              }
                                //manualColumnResize: true,
                        });
                        
                        $("#exampleGrid").handsontable('render');
                    },
                    error: function (error) {
                        console.log(error);
                    }
            });
            
            
            $('#supplier_form').submit(function (event) {
                event.preventDefault();
      
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
                                price: products[i][3],
                                product_id: products[i][4]
                            };
                    }
                     data.products = pro;

                    $.ajax({
                            url: $(this).attr('action'),
                            data: data, //returns all cells' data
                            type: 'POST',
                            success: function (response) {
                                if(response.success == true){
                                    swal("Update Successfully", "", "success");
                                    window.location.href= "{{url('public/supplier/all')}}";
                                }
                                //console.log(response);
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        });
               

        });

   
    
    


});
</script>
@endsection
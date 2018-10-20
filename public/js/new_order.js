$(document).ready(function () {

    function isAnIntegerNumber(n) {
        var numStr = /^\d+$/;
        return numStr.test(n.toString());
    }

    function showPopUp(msg) {
        $('#mymodel').addClass('showSweetAlert');
        $('#popup-message').html(msg);
        $('#mymodel').removeClass('hidden');
        $('#mymodel').modal('show');

    }

    function showDangerPopUp(msg) {
        $('#danger-model').addClass('showSweetAlert');
        $('#danger-msg').html(msg);
        $('#danger-model').removeClass('hidden');
        $('#danger-model').modal('show');

    }
    //get products of all suppliers
    getProductsBySupplierId("0");

    $('#select').change(function () {
        var value = $(this).val();
        getProductsBySupplierId(value);
    });


    function getProductsBySupplierId(supplier) {

        $.ajax({
            type: "GET",
            url: '/dashboard/order/get-all-products/' + supplier,
            dataType: 'json',
            cache: false,
            success: function (data) {
                var table, order;
                table = $('#example').DataTable();
                order = $('#orders').DataTable();
                table.clear();

                if (data != '') {
                    $.each(data, function (i, item) {
                        table.row.add([data[i].id, data[i].sku, data[i].name, data[i].unit, data[i].price,
                            "<form>" +
                            "<input id='name-row-" + data[i].id + "'  value='" + data[i].name + "' hidden>" +
                            "<input id='price" + data[i].id + "'  value='" + data[i].price + "' hidden>" +
                            "<input id='sku" + data[i].id + "'  value='" + data[i].sku + "' hidden>" +
                            "<input id='unit" + data[i].id + "'  value='" + data[i].unit + "' hidden>" +
                            "<input id='supplier" + data[i].id + "'  value='" + data[i].supplier_id + "' hidden>" +
                            "<div class='input-group'>" +
                            "<input class='" + data[i].id + "' required id='" + data[i].id + "'  type='text' class='form-control'>" +
                            "<span class='input-group-btn'>" +
                            "<input id='" + data[i].id + "' type='button' value='Add' class='btn btn-success add' >" +
                            "</span>" +
                            "</div><div id='msg" + data[i].id + "'></div></form>"]);
                    });
                }
                table.draw();

                $("#example").on("click", ".add", function () {
                    var id = jQuery(this).attr('id');
                    var quantity = $("." + id).val();

                    $("."+id).on('change paste keyup', function () {

                        $('#msg' + id).html("");

                    });

                    if (!$.trim(quantity).length > 0) {
                        $('#msg' + id).html("<span class='text-danger'><i class='icofont icofont-info-square'></i> Quantity is required. </span>");
                    } else if (!isAnIntegerNumber(quantity)) {
                        $('#msg' + id).html("<span class='text-danger'><i class='icofont icofont-info-square'></i> Quantity must be positive. </span>");
                    } else if ($.trim(quantity).length > 0 && isAnIntegerNumber(quantity)){
                        $("." + id).val("");


                        var name = $('#name-row-' + id).val();
                        var price = $('#price' + id).val();
                        var sku = $('#sku' + id).val();
                        var unit = $('#unit' + id).val();
                        var supplier_id = $('#supplier' + id).val();
                        var total = quantity * price;
                        //alert(sku);

                        //sku, name , price, unit , supplier , quantity ,total
                        order.row.add([sku, name, price, unit, supplier_id, quantity, total,"" +
                        "<input id='order-name-"+id+"'  value='" + name + "' hidden>" +
                        "<input id='order-id-"+id+"'  value='" + id + "' hidden>" +
                        "<input id='order-quantity-"+id+"'  value='" + quantity + "' hidden>" +
                        "<input id='order-price-"+id+"'  value='" + price + "' hidden>" +
                        "<input id='order-supplier-"+id+"'  value='" + supplier_id + "' hidden>" +
                        "<span class='input-group-btn'>" +
                       "<input id='"+id+"' type='button' value='Delete' class='btn btn-danger del' >" +
                       "<input style='margin-left: 10px;' id='"+id+"' type='button' value='Order' class='btn btn-primary order' >" +
                       "</span>"]);
                        order.draw();
                        showPopUp('Order was added successfully to your cart.');

                    }

                });

            }
        });
        $("#example" ).off();

    }


        $('#orders').on( 'click', 'tbody tr .del', function () {
            var row = order.find('tr').eq(0);
            order.fnDeleteRow(row[0]);
        } );




    $("#orders").on("click", ".order",function () {

        var id = jQuery(this).attr('id');
        var name = $('#order-name-'+id).val();
        var product_id = $('#order-id-'+id).val();
        var quantity = $('#order-quantity-'+id).val();
        var supplier = $('#order-supplier-'+id).val();
        var price = $('#order-price-'+id).val();



        var postData = [
            { "id": id, "qty": quantity,"price":price}
        ];
       /* "status"          : "pending",
            "delivery_status" : "not_delivered",
            "notes"           : "test notes test notes test notes",
            "tax"             : "10.00",
            "outlet_id"       : "51",
            "supplier_id"       : "52",*/

        $('#demoModal').modal('show');

        $('#submit').on('click',function () {


            var notes=$('#order-notes').val();
            var tax=$('#order-tax').val();
            var outlet_id=$('#outlet-select').val();

            var req=
                {
                    "products" :postData,
                    "status"          : "pending",
                    "delivery_status" : "not_delivered",
                    "notes"           : notes,
                    "tax"             : tax,
                    "outlet_id"       : outlet_id,
                    "supplier_id"       : supplier,
                    "type" : "normal"
                }
            ;

          //  alert(JSON.stringify(req));

            $.ajax({
                type:'POST',
                url: '/dashboard/order/store-order',
                contentType: 'application/json',
                accept: 'application/json',
                data: JSON.stringify(req),
                dataType: 'JSON',
                beforeSend: function() {
                    $('#submit').prop('disabled', true);
                    $('#progress-id').css("width", "100%");
                },
                success:function(html){
                    $('#submit').prop('disabled', false);

                    $('#demoModal').modal('hide');
                    $('#progress-id').css("width", "0px");
                    showPopUp(html.message);
                }
                ,
                error: function(xhr, status, error) {
                    $('#submit').prop('disabled', false);
                    $('#progress-id').css("width", "0px");
                    $('#demoModal').modal('hide');
                    showDangerPopUp("Error in response.");

                }
            });
            //alert(JSON.stringify(req));
            e.preventDefault();



        });


    });

    $('#ok-btn').on('click',function () {
        $('#mymodel').removeClass('showSweetAlert');
        $('#mymodel').addClass('hidden');
        $('#mymodel').modal('hide');

    });

    $('#hide-btn').on('click',function () {

        $('#danger-model').removeClass('showSweetAlert');
        $('#danger-model').addClass('hidden');
        $('#danger-model').modal('hide');
    });

});

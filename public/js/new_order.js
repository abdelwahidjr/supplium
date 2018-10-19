$(document).ready(function () {

    function isAnIntegerNumber(n) {
        var numStr = /^\d+$/;
        return numStr.test(n.toString());
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
                        order.row.add([sku, name, price, unit, supplier_id, quantity, total]);
                        order.draw();
                        $('#mymodel').addClass('showSweetAlert');
                        $('#mymodel').removeClass('hidden');
                        $('#mymodel').modal('show');

                    }

                });

            }
        });
        $("#example" ).off();

    }


    $('#ok-btn').on('click',function () {
        $('#mymodel').removeClass('showSweetAlert');
        $('#mymodel').addClass('hidden');
        $('#mymodel').modal('hide');
    });

});

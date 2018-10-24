$(document).ready(function () {


    var table, order;
    table = $('#example').DataTable();
    order = $('#orders').DataTable();

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


    function validateData(notes, tax, outlet_id) {
        var valid = true;

        var regex1 = RegExp(/^\d{0,2}\.\d{0,2}?$/);

        if (!$.trim(notes).length > 0) {
            $('#notes-msg').html('<i class="icofont icofont-info-square"></i> This field is required.');
            valid = false;
        }
        else if (!$.trim(tax).length > 0) {
            $('#tax-msg').html('<i class="icofont icofont-info-square"></i> This field is required.');
            valid = false;
        }

        else if (regex1.test(tax) == false) {
            $('#tax-msg').html('<i class="icofont icofont-info-square"></i> Please insert a valid tax.');
            valid = false;
        }
        else if (!$.trim(outlet_id).length > 0) {
            $('#outlet-msg').html('<i class="icofont icofont-info-square"></i> This field is required.');
            valid = false;
        }

        return valid;
    }

    function updateCheckoutCount() {
        var len = $("#accordion2 > div").length;
        $('#check-out-count').val(len);
        $('#items-count').html(len);
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

                    $("." + id).on('change paste keyup', function () {

                        $('#msg' + id).html("");

                    });

                    if (!$.trim(quantity).length > 0) {
                        $('#msg' + id).html("<span class='text-danger'><i class='icofont icofont-info-square'></i> Quantity is required. </span>");
                    } else if (!isAnIntegerNumber(quantity)) {
                        $('#msg' + id).html("<span class='text-danger'><i class='icofont icofont-info-square'></i> Quantity must be positive. </span>");
                    } else if ($.trim(quantity).length > 0 && isAnIntegerNumber(quantity)) {

                        $("." + id).val("");




                        var name = $('#name-row-' + id).val();
                        var price = $('#price' + id).val();
                        var sku = $('#sku' + id).val();
                        var unit = $('#unit' + id).val();
                        var supplier_id = $('#supplier' + id).val();
                        var total = quantity * price;
                        //alert(sku);

                        $('#accordion2').append('<div id="accordion-item' + id + '">' +
                            '<p>' +
                            '<a class="redial-dark d-block border redial-border-light" data-toggle="collapse" href="#collapse' + id + '" aria-expanded="true" aria-controls="collapse4">' +
                            name +
                            '<span class="btn redial-rounded-circle-50 btn-success pull-right" style="margin-top: 10px;margin-right: 5px;size: 15px;">' + quantity + '</span>' +
                            '</a>' +
                            '</p>' +
                            '<div id="collapse' + id + '" class="collapse show" role="tabpanel" data-parent="#accordion2">' +
                            '<div class="card-body">' +
                            '<p><i class="icofont icofont-price"></i> ' + total + '</p>' +
                            '<p><i class="icofont icofont-key"></i> ' + sku + '</p>' +
                            '<p><i class="icofont icofont-cube"></i> ' + unit + '</p>' +
                            '<button  class="btn btn-danger" id="collapse-del-' + id + '"><i class="icofont icofont-delete-alt"></i>  Remove</button>' +
                            '</div>' +
                            '</div></div>');
                        updateCheckoutCount();


                        $('#collapse-del-' + id).on('click', function () {
                            $('#accordion-item' + id).remove();
                            order.row('#row' + id).remove().draw();
                            updateCheckoutCount();
                        });
                             //sku, name , price, unit , supplier , quantity ,total
                             order.row.add([sku, name, price, unit, supplier_id, quantity, total, "" +
                             "<input id='order-row-" + id + "'  value='" + id + "' hidden>" +
                             "<input id='order-name-" + id + "'  value='" + name + "' hidden>" +
                             "<input id='order-id-" + id + "'  value='" + id + "' hidden>" +
                             "<input id='order-quantity-" + id + "'  value='" + quantity + "' hidden>" +
                             "<input id='order-price-" + id + "'  value='" + price + "' hidden>" +
                             "<input id='order-supplier-" + id + "'  value='" + supplier_id + "' hidden>" +
                             "<span class='input-group-btn'>" +
                             "<input id='" + id + "' type='button' value='Delete' class='btn btn-danger del' >" +
                             "<input style='margin-left: 10px;' id='" + id + "' type='button' value='Order' class='btn btn-primary order' >" +
                             "</span>"]).node().id = 'row'+id;;
                              order.draw();


                        $('#'+id).hide();
                        jQuery(this).val('Added');
                        jQuery(this).prop('disabled', true);
                        showPopUp('Order was added successfully to your cart.');

                    }

                });

                $("#orders").on("click", ".del", function () {
                    var id = jQuery(this).attr('id');
                    order.row('#row' + id).remove().draw();
                    $('#accordion-item' + id).remove();
                    updateCheckoutCount();
                });

            }
        });
        $("#example").off();
    }



    $("#orders").on("click", ".order", function () {
        var id = jQuery(this).attr('id');
        var name = $('#order-name-' + id).val();
        var product_id = $('#order-id-' + id).val();
        var quantity = $('#order-quantity-' + id).val();
        var supplier = $('#order-supplier-' + id).val();
        var price = $('#order-price-' + id).val();

        var postData = [
            {"id": id, "qty": quantity, "price": price}
        ];

        $('#demoModal').modal('show');
        $('#submit').on('click', function () {

            var notes = $('#order-notes').val();
            var tax = $('#order-tax').val();
            var outlet_id = $('#outlet-select').val();
            if (validateData(notes, tax, outlet_id)) {
                var req =
                    {
                        "products": postData,
                        "status": "pending",
                        "delivery_status": "not_delivered",
                        "notes": notes,
                        "tax": tax,
                        "outlet_id": outlet_id,
                        "supplier_id": supplier,
                        "type":"normal",
                    }
                ;

                $.ajax({
                    type: 'POST',
                    url: '/dashboard/order/store-order',
                    contentType: 'application/json',
                    accept: 'application/json',
                    data: JSON.stringify(req),
                    dataType: 'JSON',
                    beforeSend: function () {
                        $('#submit').prop('disabled', true);
                        $('#progress-id').css("width", "100%");
                    },
                    success: function (html) {
                        $('#submit').prop('disabled', false);

                        $('#demoModal').modal('hide');
                        $('#progress-id').css("width", "0px");
                        showPopUp(html.message);
                    }
                    ,
                    error: function (xhr, status, error) {
                        alert(JSON.stringify(xhr));
                        $('#submit').prop('disabled', false);
                        $('#progress-id').css("width", "0px");
                        $('#demoModal').modal('hide');
                        showDangerPopUp('Sorry , Failed to submit your order . Please try again later.');
                    }
                });
            }

            e.preventDefault();


        });
    });
    $('#ok-btn').on('click', function () {
        $('#mymodel').removeClass('showSweetAlert');
        $('#mymodel').addClass('hidden');
        $('#mymodel').modal('hide');

    });

    $('#hide-btn').on('click', function () {

        $('#danger-model').removeClass('showSweetAlert');
        $('#danger-model').addClass('hidden');
        $('#danger-model').modal('hide');
    });


});

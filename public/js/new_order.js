$(document).ready(function () {

    var order_type = "normal";
    var order_state = "active";

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

    function validateData(order_type, notes, tax, outlet_id, standing_order_name, standing_order_period, postDaysData, start_date, end_date) {
        var valid = true;

        var regex1 = RegExp(/^\d{0,2}\.\d{0,2}?$/);

        //for date comparison
        var d1 = new Date(start_date);
        var d2 = new Date(end_date);
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        var today = yyyy + '-' + mm + '-' + dd;
        var current_date = new Date(today);
        //end date comparison

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

        else if (order_type != "normal") {
            if (!$.trim(standing_order_name).length > 0) {
                $('#name-msg').html('<i class="icofont icofont-info-square"></i> This field is required.');
                valid = false;
            }
            else if (!$.trim(standing_order_period).length > 0) {
                $('#period-msg').html('<i class="icofont icofont-info-square"></i> Please select order repeated period .');
                valid = false;
            }
            else if (postDaysData == "null" || !$.trim(postDaysData).length > 0) {
                $('#days-msg').html('<i class="icofont icofont-info-square"></i> Please select order repeated days .');
                valid = false;
            }
            else if (!$.trim(start_date).length > 0 || start_date == null) {
                $('#start-date-msg').html('<i class="icofont icofont-info-square"></i> This field is required.');
                valid = false;
            }
            else if (d1 <= current_date) {
                $('#start-date-msg').html('<i class="icofont icofont-info-square"></i> Start date must be greater than the current date.');
                valid = false;
            }
            else if (!$.trim(end_date).length > 0 || end_date == null) {
                $('#end-date-msg').html('<i class="icofont icofont-info-square"></i> This field is required.');
                valid = false;
            }
            else if (d2 <= current_date) {
                $('#end-date-msg').html('<i class="icofont icofont-info-square"></i> End date must be greater than the current date.');
                valid = false;
            }
            else if (d2 <= d1) {
                $('#end-date-msg').html('<i class="icofont icofont-info-square"></i> End date must be greater than Start date.');
                valid = false;
            }

        }

        return valid;

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

    $('#type-select').change(function () {
        order_type = $('#type-select').val();

        if (order_type == "normal") {
            $('#standing-container').hide();
        } else {
            $('#standing-container').show();
        }
    });

    $('#state-select').change(function () {
        order_state = $('#state-select').val();
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

                        //sku, name , price, unit , supplier , quantity ,total
                        order.row.add([sku, name, price, unit, supplier_id, quantity, total, "" +
                        "<input id='order-name-" + id + "'  value='" + name + "' hidden>" +
                        "<input id='order-id-" + id + "'  value='" + id + "' hidden>" +
                        "<input id='order-quantity-" + id + "'  value='" + quantity + "' hidden>" +
                        "<input id='order-price-" + id + "'  value='" + price + "' hidden>" +
                        "<input id='order-supplier-" + id + "'  value='" + supplier_id + "' hidden>" +
                        "<span class='input-group-btn'>" +
                        "<input id='" + id + "' type='button' value='Delete' class='btn btn-danger del' >" +
                        "<input style='margin-left: 10px;' id='" + id + "' type='button' value='Order' class='btn btn-primary order' >" +
                        "</span>"]);
                        order.draw();
                        showPopUp('Order was added successfully to your cart.');

                    }

                });

            }
        });
        $("#example").off();
    }

    $('#orders').on('click', "tbody tr .del", function () {
        $(this).parents('tr').fadeOut();

    });

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
            var standing_order_name = $('#standing-order-name').val();
            var standing_order_period = $('#period-select').val();
            var standing_order_days = $('#days-select').val();
            var postDaysData = JSON.parse(JSON.stringify(standing_order_days));
            var start_date = $('#start-date').val();
            var end_date = $('#end-date').val();

            if (validateData(order_type, notes, tax, outlet_id, standing_order_name, standing_order_period, postDaysData, start_date, end_date)) {
                var req =
                    {
                        "products": postData,
                        "status": "pending",
                        "delivery_status": "not_delivered",
                        "notes": notes,
                        "tax": tax,
                        "outlet_id": outlet_id,
                        "supplier_id": supplier,
                        "type": order_type,
                        "standing_order_name": standing_order_name,
                        "standing_order_status": order_state,
                        "standing_order_repeated_days": postDaysData,
                        "standing_order_repeated_period": standing_order_period,
                        "standing_order_start_date": start_date,
                        "standing_order_end_date": end_date,
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


    $('#order-notes').on('change paste keyup', function () {
        $('#notes-msg').html("");
    });

    $('#order-tax').on('change paste keyup', function () {
        $('#tax-msg').html("");
    });

    $('#standing-order-name').on('change paste keyup', function () {
        $('#name-msg').html("");
    });

    $('#days-select').on('change paste keyup', function () {
        $('#days-msg').html("");
    });

    $('#start-date').on('change paste keyup', function () {
        $('#start-date-msg').html("");
    });

    $('#end-date').on('change paste keyup', function () {
        $('#end-date-msg').html("");
    });


});

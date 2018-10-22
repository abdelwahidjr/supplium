$(document).ready(function () {

    var state;
    $('#checkbox').click(function() {

        if($("#checkbox").is(':checked')){
            //update in database.
            state="on";
        }else {
            state="off";
        }

        $.ajax({
            type: 'POST',
            url: '/dashboard/user/update-notification',
            data: {'state':state},
            dataType: 'JSON',
            success: function (html) {

                if (html.code!=1)
                {
                    alert(html.message);
                }
            }
            ,
            error: function (xhr, status, error) {
                alert('Sorry , Failed to update your notification settings . Please try again later.');
            }
        });

    });

    });

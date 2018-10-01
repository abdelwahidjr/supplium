<!doctype html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,700italic,900);

        body {
            font-family : 'Roboto', Arial, sans-serif !important;
        }

        a[href^="tel"] {
            color           : inherit;
            text-decoration : none;
            outline         : 0;
        }

        a:hover, a:active, a:focus {
            outline : 0;
        }

        a:visited {
            color : #FFF;
        }

        span.MsoHyperlink {
            mso-style-priority : 99;
            color              : inherit;
        }

        span.MsoHyperlinkFollowed {
            mso-style-priority : 99;
            color              : inherit;
        }

        .logo-image {
            padding : 15px 0 20px 0;
        }

        .rights {
            color : gray;
        }
    </style>

</head>
<body style="margin: 0; padding: 0;background-color:#EEEEEE;" cz-shortcut-listen="true">
<div style="display:none;font-size:1px;color:#333333;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;">
    Questions? Call us any time 24/7 at 1-800-672-4399 or simply reply to this email | Chewy.com
</div>
<table cellspacing="0" style="margin:0 auto; width:100%; border-collapse:collapse; background-color:#EEEEEE; ">
    <tbody>
    <tr>
        <td align="center" style="padding:20px 23px 0 23px">
            <table width="600"
                   style="background-color:#FFF; margin:0 auto; border-radius:5px; border-collapse:collapse">
                <tbody>
                <tr>
                    <td align="center">
                        <table width="500" style="margin:0 auto">
                            <tbody>

                            <tr>
                                <td align="center">
                                    <a href="{{config('app.url')}}" target="_blank">
                                        <img class="logo-image" alt="supplium"
                                             src="{{asset('images/mails/supllium-text.png')}}">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <h2 style="margin:0; font-weight:bold; font-size:40px; color:#444; text-align:center; ">
                                        Thanks for your order
                                    </h2>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="padding:15px 0 20px 0; ">
                                    <p style="margin:0; font-size:18px; color:#000; line-height:24px; ">
                                        You'll receive an email when your purchased products are shipped. If you have
                                        any questions,
                                        call us any time or simply reply to this email.
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="padding-bottom:30px">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td width="200"
                                                style="background-color:#008AF1; text-align:center; border-radius:5px; vertical-align:middle; padding:13px 0">
                                                <a href="{{config('app.url')}}" target="_blank"
                                                   style="outline:0;color:#FFF;  display:block; text-align:center; text-decoration:none; font-weight:bold; font-size:19px;">
                                                    Check Order
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" cellspacing="0" style="padding:0 0 30px 0; vertical-align:middle">
                        <table width="550"
                               style="border-collapse:collapse; background-color:#FaFaFa; margin:0 auto; border:1px solid #E5E5E5">
                            <tbody>
                            <tr>
                                <td width="276" style="vertical-align:top; border-right:1px solid #E5E5E5">
                                    <table style="width:100%; border-collapse:collapse">
                                        <tbody>
                                        <tr>
                                            <td style="vertical-align:top; padding:18px 18px 8px 23px; ">
                                                <p style="font-size:16px; color:#333333; text-transform:uppercase; font-weight:900; margin:0; ">
                                                    Summary:
                                                </p>
                                            </td>
                                        </tr>
                                        <tr style="">
                                            <td style="vertical-align:top; padding:0 18px 18px 23px">
                                                <table width="100%" style="border-collapse:collapse">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <p style="font-size:16px; color:#000; margin:0 0 5px 0; ">
                                                                Order #:
                                                            </p>
                                                        </td>
                                                        <td align="left">
                                                            <p style="font-size:16px; color:#000; margin:0 0 5px 0; ">
                                                                {{$order->number}}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p style="font-size:16px; color:#000; margin:0 0 5px 0; ">
                                                                Order Date:
                                                            </p>
                                                        </td>
                                                        <td align="left">
                                                            <p style="font-size:16px; color:#000; margin:0 0 5px 0; ">
                                                                {{$order->created_at->format('d-m-Y')}}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p style="font-size:16px; color:#000; margin:0 0 10px 0; ">
                                                                Supplier:
                                                            </p>
                                                        </td>
                                                        <td align="left">
                                                            <p style="font-size:16px; color:#000; margin:0 0 10px 0; ">
                                                                {{$order->supplier->name}}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" style=";" colspan="2">
                                                            <p style="font-size:16px; color:#bc0101; margin:0;padding:0; font-weight:bold; ">
                                                                Order Total: {{$order->total_price_after_tax}}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="vertical-align:top">
                                    <table width="100%" style="border-collapse:collapse">
                                        <tbody>
                                        <tr>
                                            <td style="vertical-align:top; padding:18px 18px 8px 23px; ">
                                                <p style="font-size:16px; color:#333333; text-transform:uppercase; font-weight:900; margin:0; ">
                                                    Shipping Address:
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:top; padding:0 18px 18px 23px; ">
                                                <table width="100%" style="border-collapse:collapse">
                                                    <tbody>
                                                    <tr>
                                                        <td style=";">
                                                            <p style="font-size:16px; color:#000; margin:0;padding:0; ">
                                                                {{$order->outlet->shipping_address}}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>


                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td align="center" style="padding-top:20px">
            <a href="{{config('app.url')}}">
                <table width="604" style="border-collapse:collapse;background-color:#FFF; ; border-radius:5px">
                    <tbody>
                    <tr>

                    </tr>
                    <tr>
                        <td style="padding:0">
                            <table cellpadding="20" style="width:100%; border-collapse:collapse">
                                <tbody>
                                <tr>
                                    <td align="center" style="border-right:1px solid #EBEBEB; ">
                                        <p style="margin:0 0 8px 0">
                                            <img src="{{asset('images/mails/csr_icon.png')}}"></p>

                                    </td>
                                    <td align="center" style="border-right:1px solid #EBEBEB; ; vertical-align:bottom">
                                        <p style="margin:0 0 14px 0; ">
                                            <img src="{{asset('images/mails/shipping_icon.png')}}">
                                        </p>

                                    </td>
                                    <td align="center" style="border-right:1px solid #EBEBEB; ">
                                        <p style="margin:0 0 8px 0">
                                            <img src="{{asset('images/mails/moneyback_icon.png')}}">
                                        </p>

                                    </td>
                                    <td align="center">
                                        <p style="margin:0 0 8px 0">
                                            <img src="{{asset('images/mails/return_icon.png')}}">
                                        </p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </a>
        </td>
    </tr>
    <tr>
        <td align="center" style="padding-top:29px; padding-bottom:50px">
            <table style="width:100%">
                <tbody>
                <tr>
                    <td class="rights" align="center">
                        © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>
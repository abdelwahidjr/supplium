<?php

return [

    'JsonResultCount'       => 10 ,
    'TokenExpireIn'         => 10 ,
    'refreshTokenExpireIn'  => 10 ,
    'fontUrl'               => rtrim(env('FRONT_URL' , 'http://api.madad.sa') , '/') ,
    'frontResetPasswordUrl' => rtrim(env('FRONT_URL' . '/password/reset' , 'http://api.madad.sa/password/reset') , '/') ,

];
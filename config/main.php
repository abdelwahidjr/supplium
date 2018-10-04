<?php

return [

    'JsonResultCount'       => 10 ,
    'TokenExpireIn'         => 10 ,
    'refreshTokenExpireIn'  => 10 ,
    'fontUrl'               => rtrim(env('FRONT_URL' , 'http://supplium.test') , '/') ,
    'frontResetPasswordUrl' => rtrim(env('FRONT_URL' . '/password/reset' , 'http://supplium.test/password/reset') , '/') ,

];
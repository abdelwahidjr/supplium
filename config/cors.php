<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */

    'supportsCredentials' => true ,
    'allowedOrigins'      => ['*'] ,
    'allowedHeaders'      => ['Content-Type' , 'X-Requested-With' , 'Access-Control-Allow-Credentials'] ,
    'allowedMethods'      => ['*'] , // ex: ['GET', 'POST', 'PUT',  'DELETE']
    'exposedHeaders'      => [] ,
    'maxAge'              => 0 ,
];
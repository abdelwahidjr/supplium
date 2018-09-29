<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_product';

    protected $guarded = ['id'];

    protected $fillable
        = [
            'order_id' ,
            'product_id' ,
        ];

}

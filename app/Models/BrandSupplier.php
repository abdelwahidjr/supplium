<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandSupplier extends Model
{
    protected $table = 'brand_supplier';

    protected $guarded = ['id'];

    protected $fillable
        = [
            'brand_id',
            'supplier_id',
        ];

}

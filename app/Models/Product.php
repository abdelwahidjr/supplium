<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    protected $fillable
        = [
            'sku',
            'name',
            'unit',
            'price',
            'supplier_id',
            'created_by_user_id',
            'updated_by_user_id',
        ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

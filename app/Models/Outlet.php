<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $guarded = ['id'];

    protected $fillable
        = [
            'name',
            'phone',
            'address',
            'longitude',
            'latitude',
            'city',
            'shipping_address',
            'brand_id',
            'created_by_user_id',
            'updated_by_user_id',
        ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}

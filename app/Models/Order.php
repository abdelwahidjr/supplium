<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    protected $fillable
        = [
            'products',
            'scheduled_on',
            'status',
            'deliverd_status',
            'tax',
            'tax_val',
            'total_price_before_tax',
            'total_price_after_tax',
            'total_qty',
            'notes',
            'outlet_id',
            'standing_order_id',
            'created_by_user_id',
            'updated_by_user_id',
        ];

    protected $casts
        = [
            'products'     => 'array',
            'scheduled_on' => 'array',
        ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function product()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    public function standing_order()
    {
        return $this->belongsTo(StandingOrder::class);
    }


    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

}

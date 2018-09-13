<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    protected $fillable
        = [
            'products',
            'outlet_id',
            'created_by_user_id',
            'updated_by_user_id',
        ];

    protected $casts
        = [
            'products' => 'array',
        ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

}

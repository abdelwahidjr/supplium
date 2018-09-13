<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = ['id'];

    protected $fillable
        = [
            'status',
            'notes',
            'outlet_id',
            'orders',
            'created_by_user_id',
            'updated_by_user_id',
        ];

    protected $casts
        = [
            'orders' => 'array',
        ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

}

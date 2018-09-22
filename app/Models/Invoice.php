<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    protected $guarded = ['id'];

    protected $fillable
        = [
            'amount',
            'company_id',
            'order_id',
            'created_by_user_id',
            'updated_by_user_id',
        ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}

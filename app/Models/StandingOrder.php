<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StandingOrder extends Model
{
    protected $guarded = ['id'];

    protected $fillable
        = [
            'name' ,
            'status' ,
            'start_date' ,
            'end_date' ,
            'repeated_days' ,
            'repeated_period' ,
            'created_by_user_id' ,
            'updated_by_user_id' ,
        ];
    protected $casts
        = [
            'repeated_days' => 'array',
        ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $guarded = ['id'];

    protected $fillable
        = [
            'name' ,
            'business_type' ,
            'phone' ,
            'address_1' ,
            'address_2' ,
            'website' ,
            'country' ,
            'city' ,
            'state' ,
            'zip' ,
            'extra_information' ,
            'plan_id' ,
            'created_by_user_id' ,
            'updated_by_user_id' ,
        ];

    public function brand()
    {
        return $this->hasMany(Brand::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function supplier()
    {
        return $this->hasMany(Supplier::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }


}

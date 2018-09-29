<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $guarded = ['id'];

    protected $fillable
        = [
            'id' ,
            'name' ,
            'brand_free' ,
            'brand_max' ,
            'outlet_free' ,
            'outlet_max' ,
            'created_by_user_id' ,
            'updated_by_user_id' ,
        ];

    public function company()
    {
        return $this->hasMany(Company::class);
    }
}

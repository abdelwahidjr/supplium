<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = ['id'];

    protected $fillable
        = [
            'name' ,
            'description' ,
            'company_id' ,
            'created_by_user_id' ,
            'updated_by_user_id' ,
        ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function outlet()
    {
        return $this->hasMany(Outlet::class);
    }

    public function supplier()
    {
        return $this->belongsToMany(Supplier::class)->withTimestamps();
    }
}

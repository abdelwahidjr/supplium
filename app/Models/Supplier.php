<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{

    protected $guarded = ['id'];

    protected $fillable
        = [
            'name' ,
            'email' ,
            'phone' ,
            'address' ,
            'directory_option' ,
            'category_id' ,
            'company_id' ,
            'created_by_user_id' ,
            'updated_by_user_id' ,

        ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function supplier_payment()
    {
        return $this->hasOne(SupplierPayment::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function brand()
    {
        return $this->belongsToMany(Brand::class)->withTimestamps();
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

}

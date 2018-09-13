<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    protected $fillable
        = [
            'name',
            'created_by_user_id',
            'updated_by_user_id',
        ];

    public function supplier()
    {
        return $this->hasMany(Product::class);
    }

}

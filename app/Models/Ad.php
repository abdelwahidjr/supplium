<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{

    protected $guarded = ['id'];

    protected $fillable
        = [
            'name',
            'description',
            'url',
            'created_by_user_id',
            'updated_by_user_id',
        ];

}

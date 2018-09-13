<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyUser extends Model
{
    protected $table = 'company_user';

    protected $guarded = ['id'];

    protected $fillable
        = [
            'user_id',
            'company_id',
        ];

}

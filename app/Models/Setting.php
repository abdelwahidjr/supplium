<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $guarded = ['id'];

    protected $fillable
        = [
            'notifications' ,
            'user_id' ,
            'created_by_user_id' ,
            'updated_by_user_id' ,
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

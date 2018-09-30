<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogsActivity;
use Spatie\Activitylog\LogsActivityInterface;

class Outlet extends Model implements LogsActivityInterface
{
    use LogsActivity;

    protected $guarded = ['id'];

    protected $fillable
        = [
            'name' ,
            'phone' ,
            'address' ,
            'longitude' ,
            'latitude' ,
            'city' ,
            'shipping_address' ,
            'brand_id' ,
            'created_by_user_id' ,
            'updated_by_user_id' ,
        ];

    public function getActivityDescriptionForEvent($eventName)
    {
        $class_name = explode('\\' , get_class($this));
        $model_name = $class_name[2] . ' ' . 'Model';

        if ($eventName == 'created')
        {
            return 'created ' . '|' . ' id => ' . $this->id . ' @ ' . $model_name;
        }

        if ($eventName == 'updated')
        {
            return 'updated ' . '|' . ' id => ' . $this->id . ' @ ' . $model_name;
        }

        if ($eventName == 'deleted')
        {
            return 'deleted ' . '|' . ' id => ' . $this->id . ' @ ' . $model_name;
        }

        return '';
    }


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}

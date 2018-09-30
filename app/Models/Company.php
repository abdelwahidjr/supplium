<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogsActivity;
use Spatie\Activitylog\LogsActivityInterface;

class Company extends Model implements LogsActivityInterface
{
    use LogsActivity;

    use LogsActivity;

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

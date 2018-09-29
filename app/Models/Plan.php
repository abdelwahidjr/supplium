<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogsActivity;
use Spatie\Activitylog\LogsActivityInterface;

class Plan extends Model implements LogsActivityInterface
{
    use LogsActivity;

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

    public function getActivityDescriptionForEvent($eventName)
    {
        $class_name = explode('\\' , get_class($this));
        $model_name = $class_name[2];

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


    public function company()
    {
        return $this->hasMany(Company::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierDirectory extends Model
{
    //


    protected $fillable
        = [
            'segment' ,
            'name' ,
            'logo' ,
            'contact_person' ,
            'position' ,
            'phone_number',
            'mobile_number',
            'email',
            'website',
            'address',
            'operation_areas',
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

}

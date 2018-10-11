<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDirectory extends Model
{


    protected $fillable
        = [

            'segment',
            'category',
            'sub_category',
            'supplier',
            'brand',
            'sku',
            'describtion',
            'type',
            'quantity',
            'unit_price',
            'weight',
            'unit',
            'case_price',
            'origin',
            'unit_of_sale'
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

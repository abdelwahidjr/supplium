<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogsActivity;
use Spatie\Activitylog\LogsActivityInterface;

class StandingOrder extends Model implements LogsActivityInterface
{
    use LogsActivity;

    protected $guarded = ['id'];

    protected $fillable
        = [
            'name' ,
            'status' ,
            'start_date' ,
            'end_date' ,
            'repeated_days' ,
            'repeated_period' ,
            'created_by_user_id' ,
            'updated_by_user_id' ,
        ];
    protected $casts
        = [
            'repeated_days' => 'array' ,
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


    public function order()
    {
        return $this->hasMany(Order::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogsActivity;
use Spatie\Activitylog\LogsActivityInterface;

class Setting extends Model implements LogsActivityInterface
{
    use LogsActivity;


    protected $guarded = ['id'];

    protected $fillable
        = [
            'notifications' ,
            'user_id' ,
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

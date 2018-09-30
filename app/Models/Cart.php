<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogsActivity;
use Spatie\Activitylog\LogsActivityInterface;

class Cart extends Model implements LogsActivityInterface
{
    use LogsActivity;

    use LogsActivity;

    protected $guarded = ['id'];

    protected $fillable
        = [
            'status' ,
            'notes' ,
            'outlet_id' ,
            'products' ,
            'created_by_user_id' ,
            'updated_by_user_id' ,
        ];

    protected $casts
        = [
            'products' => 'array' ,
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


    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function product()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}

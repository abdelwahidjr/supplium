<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\LogsActivity;
use Spatie\Activitylog\LogsActivityInterface;

class Supplier extends Model implements LogsActivityInterface
{
    use LogsActivity;
    use  Notifiable;


    protected $guarded = ['id'];

    protected $fillable
        = [
            'name' ,
            'email' ,
            'phone' ,
            'address' ,
            'directory_option' ,
            'category_id' ,
            'company_id' ,
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


    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function supplier_payment()
    {
        return $this->hasOne(SupplierPayment::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function brand()
    {
        return $this->belongsToMany(Brand::class)->withTimestamps();
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

}

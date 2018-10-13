<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogsActivity;
use Spatie\Activitylog\LogsActivityInterface;

class Order extends Model implements LogsActivityInterface
{
    use LogsActivity;

    protected $guarded = ['id'];

    protected $fillable
        = [
            'number' ,
            'products' ,
            'scheduled_on' ,
            'status' ,
            'delivery_status' ,
            'tax' ,
            'tax_val' ,
            'total_price_before_tax' ,
            'total_price_after_tax' ,
            'total_qty' ,
            'notes' ,
            'outlet_id' ,
            'supplier_id' ,
            'standing_order_id' ,
            'created_by_user_id' ,
            'updated_by_user_id' ,
        ];

    protected $casts
        = [
            'products'     => 'array' ,
            'scheduled_on' => 'array' ,
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


    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function product()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    public function standing_order()
    {
        return $this->belongsTo(StandingOrder::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }


}

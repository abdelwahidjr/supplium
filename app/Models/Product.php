<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogsActivity;
use Spatie\Activitylog\LogsActivityInterface;

class Product extends Model implements LogsActivityInterface
{
    use LogsActivity;

    protected $guarded = ['id'];
    protected $fillable
        = [
            'sku' ,
            'name' ,
            'unit' ,
            'price' ,
            'directory_option' ,
            'supplier_id' ,
            'category_id' ,
            'cart_id' ,
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


    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class)->withTimestamps();
    }

    public function cart()
    {
        return $this->belongsToMany(Cart::class)->withTimestamps();
    }
}

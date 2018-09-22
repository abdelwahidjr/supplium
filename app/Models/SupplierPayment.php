<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierPayment extends Model
{
    protected $table = 'supplier_payment';

    protected $guarded = ['id'];

    protected $fillable
        = [
            'payment_type',
            'credit_limit',
            'credit_period',
            'payment_due_date',
            'supplier_id',
            'created_by_user_id',
            'updated_by_user_id',
        ];


    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

}

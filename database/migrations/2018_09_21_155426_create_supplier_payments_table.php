<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_payment' , function (Blueprint $table)
        {
            $table->increments('id');
            $table->enum('payment_type' , ['cash' , 'credit']);
            $table->string('credit_limit')->nullable();
            $table->string('remaining_limit')->nullable();
            $table->enum('restrict' , ['on' , 'off']);
            $table->string('credit_period')->nullable();
            $table->date('period_renewal')->nullable();
            $table->string('payment_due_date')->nullable();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('created_by_user_id')->nullable();
            $table->unsignedBigInteger('updated_by_user_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_payment');
    }
}

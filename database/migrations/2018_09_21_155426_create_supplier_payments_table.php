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
        Schema::create('supplier_payment', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('payment_type', ['cash', 'credit']);
            $table->string('credit_limit')->nullable();
            $table->string('credit_period')->nullable();
            $table->string('payment_due_date')->nullable();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('created_by_user_id')->nullable();
            $table->unsignedBigInteger('updated_by_user_id')->nullable();

            $table->timestamps();
        });
    }

    //	Add agreement terms (Credit Limit, Credit Period, Payment Due Date)

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

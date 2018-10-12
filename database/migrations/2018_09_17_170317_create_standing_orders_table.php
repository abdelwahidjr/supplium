<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandingOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standing_orders' , function (Blueprint $table)
        {

            $table->increments('id');
            $table->string('standing_order_name');
            $table->enum('standing_order_status' , ['active' , 'expired']);
            $table->date('standing_order_start_date');
            $table->date('standing_order_end_date')->nullable();
            $table->text('standing_order_repeated_days'); //array
            $table->enum('standing_order_repeated_period' , ['1 week' , '2 week' , '3 week' , '4 week']);
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
        Schema::dropIfExists('standing_orders');
    }
}

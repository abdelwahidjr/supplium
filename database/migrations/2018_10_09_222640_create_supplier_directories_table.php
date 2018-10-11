<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_directories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('segment');
            $table->string('name');
            $table->string('logo');
            $table->string('contact_person');
            $table->string('position');
            $table->string('phone_number');
            $table->string('mobile_number');
            $table->string('email');
            $table->string('website');
            $table->string('address');
            $table->string('operation_areas');
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
        Schema::dropIfExists('supplier_directories');
    }
}

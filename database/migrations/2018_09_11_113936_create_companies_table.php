<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('business_type');
            $table->string('phone');
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('website')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->text('extra_information')->nullable();
            $table->integer('created_by_user_id')->nullable();
            $table->integer('updated_by_user_id')->nullable();

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
        Schema::dropIfExists('companies');
    }
}

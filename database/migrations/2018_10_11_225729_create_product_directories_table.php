<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('product_directories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('segment');
            $table->string('category');
            $table->string('sub_category');
            $table->string('supplier');
            $table->string('brand');
            $table->string('sku');
            $table->text('describtion');
            $table->string('type');
            $table->integer('quantity');
            $table->decimal('unit_price');
            $table->decimal('weight');
            $table->enum('unit' , ['GM' , 'KG']);
            $table->decimal('case_price');
            $table->string('origin');
            $table->enum('unit_of_sale' , ['GM' , 'CRT']);
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
        Schema::dropIfExists('product_directories');
    }
}

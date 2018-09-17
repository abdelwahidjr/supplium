<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku');
            $table->string('name');
            $table->enum('unit', ['kg', 'liter', 'packet', 'bucket', 'case', 'piece', 'box', 'gallon']);
            $table->decimal('price', 8, 2);
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('category_id');
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
        Schema::dropIfExists('products');
    }
}

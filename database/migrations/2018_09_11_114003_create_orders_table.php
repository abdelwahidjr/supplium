<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->text('products'); /*array*/
            $table->enum('status', ['pending', 'confirmed', 'fully delivered', 'fully delivered + bounce', 'partially delivered', 'not deliverd']);
            $table->decimal('tax', 4, 2);
            $table->integer('total_qty');
            $table->decimal('total_price_before_tax', 8, 2);
            $table->decimal('tax_val', 8, 2);
            $table->decimal('total_price_after_tax', 8, 2);
            $table->text('notes')->nullable();
            $table->text('outlet_id');
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
        Schema::dropIfExists('orders');
    }
}

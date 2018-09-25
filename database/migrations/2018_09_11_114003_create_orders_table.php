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
            $table->text('scheduled_on')->nullable(); /*array*/
            $table->enum('status', ['pending', 'confirmed']);
            $table->enum('deliverd_status', ['fully_delivered', 'fully_delivered_with_bounce', 'partially_delivered', 'not_deliverd']);
            $table->decimal('tax', 4, 2);
            $table->integer('total_qty');
            $table->decimal('total_price_before_tax', 9, 2);
            $table->decimal('tax_val', 8, 2);
            $table->decimal('total_price_after_tax', 9, 2);
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('outlet_id');
            $table->unsignedBigInteger('standing_order_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
}

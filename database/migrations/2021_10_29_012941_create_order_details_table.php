<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('order_details_id');
            $table->string('order_details_order_id');
            $table->string('order_details_customer_id');
            $table->string('order_details_product_name');
            $table->string('order_details_quantity');
            $table->decimal('order_details_product_unit_price', 11,2);
            $table->decimal('order_details_total', 11,2);
            $table->string('order_details_checkout_status');
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
        Schema::dropIfExists('order_details');
    }
}

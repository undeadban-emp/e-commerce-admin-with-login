<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->id('customer_order_id');
            $table->string('customer_order_customer_id');
            $table->date('customer_order_date');
            $table->time('customer_order_time');
            $table->string('customer_order_customer_name');
            $table->string('customer_order_address');
            $table->string('customer_order_delivery_instruction');
            $table->string('customer_order_payment_method');
            $table->string('customer_order_cash_on_hand');
            $table->string('customer_order_sub_total');
            $table->string('customer_order_delivery_fee');
            $table->string('customer_order_total');
            $table->string('customer_order_status');
            $table->dateTime('customer_order_completed')->nullable();
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
        Schema::dropIfExists('customer_orders');
    }
}

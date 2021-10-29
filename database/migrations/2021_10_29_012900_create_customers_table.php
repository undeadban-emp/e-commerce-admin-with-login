<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_gender');
            $table->date('customer_birthdate');
            $table->string('customer_contact_no');
            $table->string('customer_province');
            $table->string('customer_municipal');
            $table->string('customer_barangay');
            $table->string('customer_purok_street');
            $table->integer('customer_no_of_orders');
            $table->string('customer_username');
            $table->string('customer_password');
            $table->string('customer_status');
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
        Schema::dropIfExists('customers');
    }
}

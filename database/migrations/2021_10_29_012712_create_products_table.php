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
            $table->id('product_id');
            $table->string('product_name');
            $table->string('product_category_id');
            $table->string('product_barcode');
            $table->string('product_content');
            $table->integer('product_total_quantity');
            $table->decimal('product_original_price',11,2);
            $table->decimal('product_markup_price',11,2);
            $table->string('product_picture')->nullable();
            $table->string('product_status_id');
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

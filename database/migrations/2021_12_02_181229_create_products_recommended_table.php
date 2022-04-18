<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsRecommendedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_recommended', function (Blueprint $table) {
            $table->unsignedInteger('product_recommended_id');
 $table->foreign('product_recommended_id')->references('id')->on('products')->onDelete('cascade');
 $table->unsignedInteger('product_id');
 $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
 $table->primary('product_recommended_id','product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_recommended');
    }
}

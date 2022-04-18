<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsPurshasedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_purshased', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedBigInteger('user_id');
           
 $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
 
 $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
 $table->primary(['user_id','product_id']);
 $table->integer('quantity');
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_purshased');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('category_product', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('product_id')->unsigned()->nullable();
           $table->integer('category_id')->unsigned()->nullable();
           $table->timestamps();
           $table->foreign('product_id')->references('id')->on('products');
           $table->foreign('category_id')->references('id')->on('categories');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_product');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('order_id')->unsigned();
           $table->integer('product_id')->unsigned();
           $table->integer('quantity')->unsigned()->defaults(1);
           $table->timestamps();
           $table->foreign('order_id')->references('id')->on('orders');
           $table->foreign('product_id')->references('id')->on('products');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_product', function(Blueprint $table){
            $table->dropForeign(['order_id']);
            $table->dropForeign(['product_id']);
        });
        Schema::dropIfExists('order_product');
    }
}

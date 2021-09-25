<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliverKonsultasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliver_konsultasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consult_id');
            $table->string('message')->nullable();
            $table->timestamps();
            $table->foreign('consult_id')->constrained()->references('id')->on('konsultasis')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliver_konsultasis');
    }
}

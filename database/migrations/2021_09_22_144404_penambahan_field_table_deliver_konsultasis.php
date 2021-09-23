<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PenambahanFieldTableDeliverKonsultasis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('deliver_konsultasis', function(Blueprint $table){
            $table->longText('jawaban')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::table('deliver_konsultasis', function(Blueprint $table){
            $table->dropColumn('jawaban');
        });
    }
}

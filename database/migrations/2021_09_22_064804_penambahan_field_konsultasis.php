<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PenambahanFieldKonsultasis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::table('konsultasis', function(Blueprint $table){
            $table->string('city');
            $table->string('age');
            $table->string('gender');
            $table->enum('status', ['ACTIVE', 'INACTIVE']);
            // $table->foreign('profile_id')->references('id')->on('users');
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
         Schema::table('konsultasis', function(Blueprint $table){
            $table->dropColumn('city');
            $table->dropColumn('age');
            $table->dropColumn('gender');
            $table->dropColumn('status');
        });
    }
}

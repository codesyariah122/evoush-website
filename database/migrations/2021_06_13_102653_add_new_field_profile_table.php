<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profile', function (Blueprint $table) {
            //
           $table->string('instagram')->nullable();
           $table->string('facebook')->nullable();
           $table->string('youtube')->nullable();
           $table->string('city');
           $table->string('province');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profile', function (Blueprint $table) {
            //
            $table->dropColumn('instagram');
            $table->dropColumn('facebook');
            $table->dropColumn('youtube');
            $table->dropColumn('city');
            $table->dropColumn('province');
        });
    }
}

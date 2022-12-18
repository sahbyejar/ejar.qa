<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterSliders1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sliders', function(Blueprint $table)
        {
            $table->date('Date_start')->nullable();
            $table->date('Date_end')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sliders', function(Blueprint $table)
        {
            $table->dropColumn('Date_start');
            $table->dropColumn('Date_end');

        });
    }
}

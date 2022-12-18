<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('ville')->nullable();
            $table->string('name_ar')->nullable();
            $table->integer('city_id')->unsigned()->nullable()->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('villes');
    }
}

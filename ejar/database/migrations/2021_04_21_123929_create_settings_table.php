<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('Link_instagram')->nullable();
            $table->string('Link_contact')->nullable();
            $table->string('Link_android')->nullable();
            $table->string('Link_ios')->nullable();
            $table->text('Terms_Condition_ar')->nullable();
            $table->text('Terms_Condition_eg')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->string('name_ar')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('photo')->nullable();
            $table->string('discription_ar')->nullable();
            $table->string('discription')->nullable();
            $table->string('price')->nullable();
            $table->string('phone')->nullable();
            $table->integer('ville_id')->unsigned()->nullable()->index();
            $table->integer('city_id')->unsigned()->nullable()->index();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->integer('vupost')->nullable();
            $table->string('instagrame')->nullable();
            $table->integer('vuinsta')->nullable();
            $table->string('facebook')->nullable();
            $table->integer('vufb')->nullable();
            $table->string('siteweb')->nullable();
            $table->integer('vuweb')->nullable();
            $table->string('linkshare')->nullable();
            $table->integer('cliquephone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->integer('clique_whatsapp')->nullable();
            $table->string('rent_sale')->nullable();
            $table->string('chiket')->nullable();
            $table->string('cautionnement')->nullable();
            $table->string('price_cautionnement')->nullable();
            $table->string('espacer')->nullable();
            $table->string('interface')->nullable();
            $table->string('wifi')->nullable();
            $table->string('kahramam')->nullable();
            $table->string('route_principale')->nullable();
            $table->string('commission')->nullable();
            $table->string('vip1')->nullable();
            $table->string('vip2')->nullable();
            $table->string('parking')->nullable();
            $table->string('Piscine')->nullable();
            $table->string('gym')->nullable();
            $table->string('firstsaken')->nullable();
            $table->string('salon')->nullable();
            $table->string('toilet')->nullable();
            $table->string('room')->nullable();
            $table->string('officeoy')->nullable();
            $table->string('office')->nullable();
            $table->string('secretary')->nullable();
            $table->string('imprimerie')->nullable();
            $table->string('DELETED')->nullable();
            $table->string('accepted')->nullable();
            $table->string('furnished')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('produits');
    }
}

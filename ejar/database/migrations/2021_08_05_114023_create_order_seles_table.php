<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderSelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_seles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('Produit')->nullable();
            $table->string('User')->nullable();
            $table->string('price')->nullable();
            $table->string('datestart')->nullable();
            
            $table->string('cautionnement')->nullable();
            $table->string('total')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_seles');
    }
}

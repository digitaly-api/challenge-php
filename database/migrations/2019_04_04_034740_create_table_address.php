<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idPerson')->unsigned();
            $table->integer('postalCode');
            $table->string('address');
            $table->integer('number');
            $table->string('complement');
            $table->string('state');
            $table->string('country');
            $table->timestamps();

            $table->foreign('idPerson')
                ->references('id')->on('person')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
}

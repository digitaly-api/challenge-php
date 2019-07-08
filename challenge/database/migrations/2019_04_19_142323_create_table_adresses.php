<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAdresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_person');
            $table->string('postal_code', 9);
            $table->string('address', 50);
            $table->string('number', 10);
            $table->string('complement')->nullable();
            $table->string('state', 20);
            $table->string('country', 50);

            $table->foreign('id_person')->references('id')->on('people');

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
        Schema::dropIfExists('addresses');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEnderecos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idPessoa')->unsigned();
            $table->string('cep');
            $table->string('rua');
            $table->integer('numero');
            $table->string('complemento');
            $table->string('estado');
            $table->string('pais');
            $table->timestamps();

            $table->foreign('idPessoa')
                ->references('id')->on('pessoas')
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

        Schema::drop('enderecos');
    }
}

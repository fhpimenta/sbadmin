<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasFuncoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas_funcoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoas_id')->unsigned();
            $table->integer('funcoes_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('pessoas_funcoes', function(Blueprint $table) {
            $table->foreign('pessoas_id')->references('id')->on('pessoas')->onDelete('cascade');
            $table->foreign('funcoes_id')->references('id')->on('funcoes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pessoas_funcoes');
    }
}

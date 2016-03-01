<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoas_id')->unsigned();
            $table->string('rua');
            $table->string('numero')->default('s/n');
            $table->string('cep');
            $table->string('bairro');
            $table->timestamps();
        });

        Schema::table('endereco', function(Blueprint $table) {
           $table->foreign('pessoas_id')->references('id')->on('pessoas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('endereco');
    }
}

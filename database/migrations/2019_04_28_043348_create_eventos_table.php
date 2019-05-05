<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateEventosTable.
 */
class CreateEventosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('eventos', function(Blueprint $table) {
            $table->increments('id');
            $table->date('inicio')->nullable();
            $table->date('final')->nullable();
            $table->string('titulo');
            $table->string('resumo');
            $table->string('imagem')->nullable();
            $table->boolean('publicada')->default(0);
            $table->date('atualizada')->nullable();
            $table->string('status');
            $table->string('tag');
            $table->string('year');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
		Schema::dropIfExists('eventos');
	}
}

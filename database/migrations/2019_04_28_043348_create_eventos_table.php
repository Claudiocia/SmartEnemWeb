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
            $table->dateTime('inicio')->nullable();
            $table->dateTime('final')->nullable();
            $table->string('titulo');
            $table->text('texto');
            $table->string('resumo')->nullable();
            $table->string('imagem')->nullable();
            $table->boolean('publicada')->default(false);
            $table->boolean('atualizada')->default(false);
            $table->string('status');
            $table->string('tag');
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

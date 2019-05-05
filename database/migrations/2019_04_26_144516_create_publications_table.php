<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePublicationsTable.
 */
class CreatePublicationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('publications', function(Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->binary('texto');
            $table->string('resumo');
            $table->string('fonte');
            $table->date('data');
            $table->string('imagem')->nullable();
            $table->string('tag');
            $table->boolean('publicada')->default(0);
            $table->date('atualizada')->nullable();
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
		Schema::dropIfExists('publications');
	}
}

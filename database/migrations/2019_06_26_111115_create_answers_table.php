<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable
{
  /**
   * Tabela de respostas:
   *    title        => resposta do usuário,
   *    question_id  => id da questão associada,
   *    user_id      => id do usuario que respondeu
   */
  public function up()
  {
      Schema::create('answers', function (Blueprint $table)
      {
        $table->bigIncrements('id')->unsigned();
        $table->longText('title');

        $table->integer('question_id')->unsigned();

        $table->foreign('question_id')->references('id')->on('questions')->onDelete('restrict');

        $table->integer('user_id')->unsigned();

        $table->foreign('user_id')->references('id')->on('users_identification')->onDelete('restrict');

        $table->timestamps();
        $table->softDeletes();
      });
  }

  public function down()
  {
      Schema::dropIfExists('answers');
  }
}
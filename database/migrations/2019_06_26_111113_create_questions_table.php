<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable
{
  public function up()
  {
    /**
     * Tabela de questões:
     *    is_active          => define se a questão está ativa ou não,
     *    title              => título, ou pergunta, da questão,
     *    body               => texto complementar para o title,
     *    hint               => dica para a questão,
     *    is_required        => define se a resposta dessa questão é obrigatória,
     *    questionnaire_id   => id do questionário associado,
     *    question_type_id   => id do tipo de questão associado,
     */
      Schema::create('questions', function (Blueprint $table)
      {
        $table->bigIncrements('id')->unsigned();
        $table->boolean('is_active')->default(true);
        $table->string('title');
        $table->longText('body')->nullable();
        $table->string('hint')->nullable();
        $table->boolean('is_required')->default(true);

        $table->integer('questionnaire_id')->unsigned();
        $table->integer('question_type_id')->unsigned();

        $table->foreign('questionnaire_id')->references('id')->on('questionnaires')->onDelete('restrict');
        $table->foreign('question_type_id')->references('id')->on('question_types')->onDelete('restrict');

        $table->timestamps();
        $table->softDeletes();
      });
  }

  public function down()
  {
      Schema::dropIfExists('questions');
  }
}
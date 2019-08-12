<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlternativesTable
{
  /**
   * Tabela de alternativas:
   *    title        => descrição da alternativa,
   *    body         => texto complementar para a alternativa,
   *    question_id  => id da questão associada,
   */
  public function up()
  {
      Schema::create('alternatives', function (Blueprint $table)
      {
        $table->bigIncrements('id')->unsigned();
        $table->string('title');
        $table->longText('body')->nullable();

        $table->integer('question_id')->unsigned();

        $table->foreign('question_id')->references('id')->on('questions')->onDelete('restrict');

        $table->timestamps();
        $table->softDeletes();
      });
  }

  public function down()
  {
      Schema::dropIfExists('alternatives');
  }
}
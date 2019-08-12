<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnairesTable
{
  /**
   * Tabela de questionários:
   *    is_active   => define se o questionário está ativo ou não,
   *    name        => nome do questionário,
   *    answer_once => define se o questionário pode ser respondido apenas uma vez ou não para cada usuário
   */
  public function up()
  {
      Schema::create('questionnaires', function (Blueprint $table)
      {
        $table->bigIncrements('id')->unsigned();
        $table->boolean('is_active')->default(true);
        $table->string('name');
        $table->boolean('answer_once')->default(false);
        $table->timestamps();
        $table->softDeletes();
      });
}

  public function down()
  {
      Schema::dropIfExists('questionnaires');
  }
}
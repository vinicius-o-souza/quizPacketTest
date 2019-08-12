<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTypesTable
{
  /**
   * Tabela de tipos de questões:
   *    name        => nome do tipo de questão,
   *    description => breve descrição do tipo da questão
   */
  public function up()
  {
      Schema::create('question_types', function (Blueprint $table)
      {
        $table->bigIncrements('id')->unsigned();
        $table->string('name');
        $table->text('description');
        $table->timestamps();
        $table->softDeletes();
      });
  }

  public function down()
  {
      Schema::dropIfExists('question_types');
  }
}
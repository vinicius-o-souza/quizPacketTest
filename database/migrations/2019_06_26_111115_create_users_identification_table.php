<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersIdentificationTable
{
  /**
   * Tabela de identificação dos usuários que responderam o questionário:
   *    email             => email do usuário,
   *    questionnaire_id  => id do questionário associado,
   */
  public function up()
  {
      Schema::create('users_identification', function (Blueprint $table)
      {
        $table->bigIncrements('id')->unsigned();
        $table->string('email');

        $table->integer('questionnaire_id')->unsigned();

        $table->foreign('questionnaire_id')->references('id')->on('questionnaires')->onDelete('restrict');

        $table->timestamps();
        $table->softDeletes();
      });
  }

  public function down()
  {
      Schema::dropIfExists('users_identification');
  }
}
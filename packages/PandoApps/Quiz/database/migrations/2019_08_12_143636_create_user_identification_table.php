<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserIdentificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Tabela de identificação dos usuários que responderam o questionário:
         *    user_id             => id do usuário,
         *    questionnaire_id    => id do questionário associado,
         */
        Schema::create('user_identification', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('questionnaire_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('questionnaire_id')->references('id')->on('questionnaires')->onDelete('restrict');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_identification');
    }
}

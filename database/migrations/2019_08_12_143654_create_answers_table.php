<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Tabela de respostas:
         *    title                       => resposta do usuário,
         *    question_id                 => id da questão associada,
         *    user_identification_id      => id do usuario que respondeu
         */
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('title');
            $table->float('score');

            $table->bigInteger('alternative_id')->unsigned()->nullable();
            $table->bigInteger('question_id')->unsigned();
            $table->bigInteger('user_identification_id')->unsigned();

            $table->foreign('alternative_id')->references('id')->on('alternatives')->onDelete('restrict');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('restrict');
            $table->foreign('user_identification_id')->references('id')->on('user_identification')->onDelete('restrict');

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
        Schema::dropIfExists('answers');
    }
}

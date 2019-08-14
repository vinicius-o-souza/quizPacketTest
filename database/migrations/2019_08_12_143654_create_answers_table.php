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
         *    description                 => resposta do usuário,
         *    score                       => nota da resposta,
         *    file                        => arquivo contendo a resposta caso a questão seja do tipo attachment,
         *    question_id                 => id da questão associada,
         *    response_id  => id da relação de questionario e modelo que respondeu o questionário
         */

        $tableNames = config('quiz.table_names');
        Schema::create('answers', function (Blueprint $table) use($tableNames) {
            $table->bigIncrements('id');
            $table->longText('description');
            $table->float('score');
            $table->string('file');

            $table->bigInteger('alternative_id')->unsigned()->nullable();
            $table->bigInteger('question_id')->unsigned();
            $table->bigInteger('response_id')->unsigned();

            $table->foreign('alternative_id')->references('id')->on('alternatives')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('response_id')->references('id')->on($tableNames['response'])->onDelete('cascade');

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

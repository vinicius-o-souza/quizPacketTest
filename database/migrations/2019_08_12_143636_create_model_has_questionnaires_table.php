<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelHasQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Tabela de relação polimorfica do questionário com qualquer modelo
         *    model_id            => id do modelo,
         *    model_type          => tipo do modelo,
         *    questionnaire_id    => id do questionário associado,
         */

        $tableNames = config('quiz.table_names');
        $columnNames = config('quiz.column_names');

        Schema::create($tableNames['model_has_questionnaires'], function (Blueprint $table) use ($tableNames, $columnNames) {
            $table->bigIncrements('id');

            $table->bigInteger($columnNames['model_morph_key'])->unsigned();
            $table->string($columnNames['model_morph_type']);

            $table->bigInteger($columnNames['questionnaire_id'])->unsigned();
            $table->foreign($columnNames['questionnaire_id'])->references('id')->on($tableNames['questionnaires'])->onDelete('cascade');

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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExecutionsTable extends Migration
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
        Schema::create('executions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('model_key')->unsigned();
            $table->string('model_type');

            $table->bigInteger('questionnaire_id')->unsigned();
            $table->foreign('questionnaire_id')->references('id')->on('questionnaires')->onDelete('cascade');

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

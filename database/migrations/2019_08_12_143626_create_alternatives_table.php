<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlternativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Tabela de alternativas:
         *    title        => descrição da alternativa,
         *    body         => texto complementar para a alternativa,
         *    question_id  => id da questão associada,
         */
        Schema::create('alternatives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('body')->nullable();
            $table->float('value');

            $table->bigInteger('question_id')->unsigned();

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');

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
        Schema::dropIfExists('alternatives');
    }
}

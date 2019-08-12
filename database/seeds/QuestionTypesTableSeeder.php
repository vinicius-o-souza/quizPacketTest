<?php


namespace Chaves\QuizGenerator\seeds;

/**
 * Seeder para preenchimento dos tipos de questões
 *    comando laravel => php artisan db:seed --class=QuestionTypesTableSeeder,
 */
class QuestionTypesTableSeeder
{
  /**
   * Este seeder preenche a tabela de tipos de questoes
   */
  public function run()
  {
    $types = [];

    $types[0] = [
      'name'        => 'alternative',
      'description' => 'Question of alternatives'
    ];

    $types[1] = [
      'name'        => 'discursive',
      'description' => 'Discursive question'
    ];

    $types[2] = [
      'name'        => 'file',
      'description' => 'File attachment question'
    ];

    DB::table('question_types')->insert($types);
  }
}
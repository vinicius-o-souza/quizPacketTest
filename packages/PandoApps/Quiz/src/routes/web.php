<?php

Route::resource('questionnaires', 'QuestionnaireController');

Route::resource('question_type', 'QuestionTypeController');

Route::group(['prefix' => 'questionnaires/{questionnaire_id}'], function()
{
    /*
   * Rotas para acesso as questões do questinário
   */
    Route::resource('question', 'QuestionController');

    /*
    * Rotas para acesso aos usuários que responderam os questinários
    */
    Route::resource('user_identification', 'UserIdentificationController');

    /*
   * Rotas para acesso as questões do questinário
   */
    Route::group(['prefix' => 'questions/{question_id}'], function ()
    {
        /*
        * Rotas para acesso as alternativas
        */
        Route::resource('alternatives', 'AlternativeController');

        /*
        * Rotas para acesso as respostas
        */
        Route::resource('answers', 'AnswerController');
    });

});

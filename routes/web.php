<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => config('quiz.models.parent_url_name'). '/{' . config('quiz.models.parent_id'). '}'], function () {
    
    Route::group(['prefix' => 'alternatives'], function () {
        Route::get('/',                                        ['as'=>'alternatives.index',   'uses'=>'\PandoApps\Quiz\Controllers\AlternativeController@index']);
        Route::get('/{alternative_id}',                        ['as'=>'alternatives.show',    'uses'=>'\PandoApps\Quiz\Controllers\AlternativeController@show']);
        Route::match(['put', 'patch'], '/{alternative_id}',    ['as'=>'alternatives.update',  'uses'=>'\PandoApps\Quiz\Controllers\AlternativeController@update']);
        Route::delete('/{alternative_id}',                     ['as'=>'alternatives.destroy', 'uses'=>'\PandoApps\Quiz\Controllers\AlternativeController@destroy']);
        Route::get('/{alternative_id}/edit',                   ['as'=>'alternatives.edit',    'uses'=>'\PandoApps\Quiz\Controllers\AlternativeController@edit']);
    });
    
    Route::group(['prefix' => 'answers'], function () {
        Route::get('/',                                     ['as'=>'answers.index',   'uses'=>'\PandoApps\Quiz\Controllers\AnswerController@index']);
        Route::get('/{answer_id}',                          ['as'=>'answers.show',    'uses'=>'\PandoApps\Quiz\Controllers\AnswerController@show']);
    });
    
    Route::group(['prefix' => 'executables'], function () {
        Route::get('/', '\PandoApps\Quiz\Controllers\ExecutableController@index')->name('executables.index');
        Route::get('/{questionnaire_id}/questionnaire', '\PandoApps\Quiz\Controllers\ExecutableController@statistics')->name('executables.statistics');
        Route::get('{executable_id}/', '\PandoApps\Quiz\Controllers\ExecutableController@show')->name('executables.show');
        Route::get('{questionnaire_id}/create/{model_id}', '\PandoApps\Quiz\Controllers\ExecutableController@create')->name('executables.create');
        Route::post('{questionnaire_id}/store', '\PandoApps\Quiz\Controllers\ExecutableController@store')->name('executables.store');
        Route::post('start', '\PandoApps\Quiz\Controllers\ExecutableController@handleStartExecutable')->name('executables.start');
    });
    
    Route::group(['prefix' => 'questionnaires'], function () {
        Route::get('/',                                          ['as'=>'questionnaires.index',   'uses'=>'\PandoApps\Quiz\Controllers\QuestionnaireController@index']);
        Route::get('/create',                                    ['as'=>'questionnaires.create',  'uses'=>'\PandoApps\Quiz\Controllers\QuestionnaireController@create']);
        Route::post('/',                                         ['as'=>'questionnaires.store',   'uses'=>'\PandoApps\Quiz\Controllers\QuestionnaireController@store']);
        Route::get('/{questionnaire_id}',                        ['as'=>'questionnaires.show',    'uses'=>'\PandoApps\Quiz\Controllers\QuestionnaireController@show']);
        Route::match(['put', 'patch'], '/{questionnaire_id}',    ['as'=>'questionnaires.update',  'uses'=>'\PandoApps\Quiz\Controllers\QuestionnaireController@update']);
        Route::delete('/{questionnaire_id}',                     ['as'=>'questionnaires.destroy', 'uses'=>'\PandoApps\Quiz\Controllers\QuestionnaireController@destroy']);
        Route::get('/{questionnaire_id}/edit',                   ['as'=>'questionnaires.edit',    'uses'=>'\PandoApps\Quiz\Controllers\QuestionnaireController@edit']);
    });

    Route::group(['prefix' => 'questions'], function () {
        Route::get('/',                                         ['as'=>'questions.index',   'uses'=>'\PandoApps\Quiz\Controllers\QuestionController@index']);
        Route::get('/{question_id}',                            ['as'=>'questions.show',    'uses'=>'\PandoApps\Quiz\Controllers\QuestionController@show']);
        Route::match(['put', 'patch'], '/{question_id}',        ['as'=>'questions.update',  'uses'=>'\PandoApps\Quiz\Controllers\QuestionController@update']);
        Route::delete('/{question_id}',                         ['as'=>'questions.destroy', 'uses'=>'\PandoApps\Quiz\Controllers\QuestionController@destroy']);
        Route::get('/{question_id}/edit',                       ['as'=>'questions.edit',    'uses'=>'\PandoApps\Quiz\Controllers\QuestionController@edit']);
    });
    
});
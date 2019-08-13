<?php

namespace PandoApps\Quiz;

use Illuminate\Support\ServiceProvider;

class QuizServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'pandoapps');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'pandoapps');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->app['router']->namespace('PandoApps\\Quiz\\Controllers')
                ->middleware(['web'])
                ->group(function () {
                    $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
                });


        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/quiz.php', 'quiz');

        // Register the service the package provides.
        $this->app->singleton('quiz', function ($app) {
            return new Quiz;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['quiz'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the views.
        $this->publishes([
            __DIR__.'/resources/views' => base_path('resources/views/vendor/pandoapps_quiz'),
        ], 'quiz.views');

        // Publishing the migrations.
        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations'),
        ], 'migrations');


        // Registering package commands.
        // $this->commands([]);
    }
}

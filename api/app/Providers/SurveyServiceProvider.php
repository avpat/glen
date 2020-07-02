<?php

namespace App\Providers;

use App\Services;
use App\Services\SurveyServiceInterface;
use Illuminate\Support\ServiceProvider;

class SurveyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //these get called after all the services load
        //by this, whenever I call this interface it will evaluate the payload
        $this->app->bind(\ruleEvaluatorInterface::class, Services\ruleEvaluatorService::class);
        $this->app->bind(SurveyServiceInterface::class, SurveyService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

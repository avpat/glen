<?php

namespace App\Providers;

use App\Services\SurveyService\SurveyService;
use App\Services\SurveyService\SurveyServiceInterface;
use Illuminate\Support\Facades\App;
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

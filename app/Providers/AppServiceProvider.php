<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Twilio\Rest\Client as TwilioClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TwilioClient::class, function($app){
            return new TwilioClient(env('TWILIO_SID'), env('TWILIO_TOKEN'));
        });

        $this->app->alias(TwilioClient::class, 'Twilio');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}

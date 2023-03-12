<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class OpenAiServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(\OpenAI\Client::class, function () {
            return \OpenAI::client(config('services.open_ai.secret'));
        });
    }


    public function boot(): void
    {
        //
    }
}

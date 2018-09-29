<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Passport::routes();
        Passport::enableImplicitGrant();
        Passport::tokensExpireIn(Carbon::now()
            ->addDays(config('main.TokenExpireIn')));
        Passport::refreshTokensExpireIn(Carbon::now()
            ->addDays(config('main.refreshTokenExpireIn')));

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production')
        {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

    }

}
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public const SeniorClientServiceAgent = 1;
    public const ClientServiceAgent = 2;
    public const FinanceManager = 3;
    public const Receptionist = 4;
    public const Client = 5;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

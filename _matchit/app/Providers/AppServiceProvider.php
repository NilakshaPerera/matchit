<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Log;

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
     * Updated By : Nilaksha
     * Updated On : 5/2/2021
     * Summary : Add new rule to validate password
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('userpassword', function ($attribute, $value, $parameters) {
            //$parameters[0]
            if (!Hash::check($value, Auth::user()->password)) {
                return false;
            }
            return true;
        });
    }
}

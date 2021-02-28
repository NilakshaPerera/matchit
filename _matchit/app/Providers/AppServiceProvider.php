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

    public const UserTypeLocal = 1;
    public const UserTypeRemote = 2;

    public const ChannelTelephone = 1;
    public const ChannelFax = 2;
    public const ChannelPost = 3;
    public const ChannelEmail = 4;
    public const ChannelWebForm = 5;

    public const Complete = 1;
    public const Partial = 2;

    //Report Types
    public const EventSchedule = 1;
    public const Income = 2;
    public const MemberMatches = 3;

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

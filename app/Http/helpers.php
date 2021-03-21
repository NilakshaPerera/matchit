<?php

use App\Mail\SendMail;
use App\Providers\AppServiceProvider;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

// use SendMail;
// use Mail;


function stream_sorter($key = 'total_score'){
    return function ($a, $b) use ($key) {
        return strnatcmp($a[$key], $b[$key]);
    };        
}

function getNewSeniorClientServiceAgent(){

    $faker = Faker::create();
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => "0044" . mt_rand(10000000, 99999999),
        'roles_id' => AppServiceProvider::SeniorClientServiceAgent,
        'password' => Hash::make('Pa$$w0rd!'),
        'dob' => '09/03/1940',
        'channels_id' => AppServiceProvider::ChannelWebForm,
        'status_id' => AppServiceProvider::Complete,
    ];
}

function getNewClientServiceAgent()
{
    $faker = Faker::create();
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => "0044" . mt_rand(10000000, 99999999),
        'roles_id' => AppServiceProvider::ClientServiceAgent,
        'password' => Hash::make('Pa$$w0rd!'),
        'dob' => '09/03/1940',
        'channels_id' => AppServiceProvider::ChannelWebForm,
        'status_id' => AppServiceProvider::Complete,
    ];
}

function getNewFinanceManager()
{
    $faker = Faker::create();
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => "0044" . mt_rand(10000000, 99999999),
        'roles_id' => AppServiceProvider::FinanceManager,
        'password' => Hash::make('Pa$$w0rd!'),
        'dob' => '09/03/1940',
        'channels_id' => AppServiceProvider::ChannelWebForm,
        'status_id' => AppServiceProvider::Complete,
    ];
}

function getNewReceptionist()
{
    $faker = Faker::create();
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => "0044" . mt_rand(10000000, 99999999),
        'roles_id' => AppServiceProvider::Receptionist,
        'password' => Hash::make('Pa$$w0rd!'),
        'dob' => '09/03/1940',
        'channels_id' => AppServiceProvider::ChannelWebForm,
        'status_id' => AppServiceProvider::Complete,
    ];
}

function getNewClient()
{
    $faker = Faker::create();
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => "0044" . mt_rand(10000000, 99999999),
        'roles_id' => AppServiceProvider::Client,
        'password' => Hash::make('Pa$$w0rd!'),
        'dob' => '09/03/1940',
        'channels_id' => [1, 2, 3, 4, 5][array_rand([1, 2, 3, 4, 5], 1)],
        'status_id' => AppServiceProvider::Complete,
        'user_types_id' => [1, 2][(array_rand([1, 2], 1))],
        'gender' => ['Male', 'Female'][(array_rand(['Male', 'Female'], 1))],
        'address' => $faker->name . ' ' . $faker->name,
        'prefered_gender' => ['Male', 'Female', 'Everyone'][(array_rand(['Male', 'Female', 'Everyone'], 1))],
    ];
}

// function getName()
// {
//     $faker = Faker::create();
//     return $faker->name;
// }

// function getEmail()
// {
//     $faker = Faker::create();
//     return $faker->email;
// }

// function getPassword()
// {
//     $faker = Faker::create();
//     return 'password';
// }

// function getPhone()
// {
//     $faker = Faker::create();
//     return  "0044" . mt_rand(10000000, 99999999);
// }

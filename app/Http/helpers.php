<?php 
use App\Providers\AppServiceProvider;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

function getNewSeniorClientServiceAgent(){
    $faker = Faker::create();
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => "0044".mt_rand( 10000000, 99999999),
        'roles_id' => AppServiceProvider::SeniorClientServiceAgent,
        'password' => Hash::make('Pa$$w0rd!'),
        'dob' => '09/03/1940',
        'channels_id' => AppServiceProvider::ChannelWebForm,
        'status_id' => AppServiceProvider::Complete,
    ];
}

function getNewClientServiceAgent(){
    $faker = Faker::create();
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => "0044".mt_rand( 10000000, 99999999),
        'roles_id' => AppServiceProvider::ClientServiceAgent,
        'password' => Hash::make('Pa$$w0rd!'),
        'dob' => '09/03/1940',
        'channels_id' => AppServiceProvider::ChannelWebForm,
        'status_id' => AppServiceProvider::Complete,
    ];
}

function getNewFinanceManager(){
    $faker = Faker::create();
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => "0044".mt_rand( 10000000, 99999999),
        'roles_id' => AppServiceProvider::FinanceManager,
        'password' => Hash::make('Pa$$w0rd!'),
        'dob' => '09/03/1940',
        'channels_id' => AppServiceProvider::ChannelWebForm,
        'status_id' => AppServiceProvider::Complete,
    ];
}

function getNewReceptionist(){
    $faker = Faker::create();
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => "0044".mt_rand( 10000000, 99999999),
        'roles_id' => AppServiceProvider::Receptionist,
        'password' => Hash::make('Pa$$w0rd!'),
        'dob' => '09/03/1940',
        'channels_id' => AppServiceProvider::ChannelWebForm,
        'status_id' => AppServiceProvider::Complete,
    ];
}

function getNewClient(){
    $faker = Faker::create();
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => "0044".mt_rand( 10000000, 99999999),
        'roles_id' => AppServiceProvider::Client,
        'password' => Hash::make('Pa$$w0rd!'),
        'dob' => '09/03/1940',
        'channels_id' => AppServiceProvider::ChannelWebForm,
        'status_id' => AppServiceProvider::Complete,
    ];
}
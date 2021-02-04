<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    /**
     * Created By : Nilaksha 
     * Created At : 2/2/2021
     * Summary : Fills the datatabes with pre set of data
     *
     * @return void
     */
    public function run()
    {
        // To run the seeds, php artisan db:seed to
        
        DB::table('roles')->insert([
            ['id' => '1', 'name' => 'Senior Client Service Agent', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '2', 'name' => 'Client Service Agent', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '3', 'name' => 'Finance Manager', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '4', 'name' => 'Receptionist', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '5', 'name' => 'Client', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
        
        DB::table('user_types')->insert([
            ['id' => '1', 'name' => 'Local', 'fee' => '12' , 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '2', 'name' => 'Remote', 'fee' => '5' , 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        DB::table('channels')->insert([
            ['id' => '1', 'name' => 'Telephone', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '2', 'name' => 'Fax', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '3', 'name' => 'Post', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '4', 'name' => 'Email', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '5', 'name' => 'Web Form', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        DB::table('payment_status')->insert([
            ['id' => '1', 'name' => 'Successful', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '2', 'name' => 'Failed', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        DB::table('status')->insert([
            ['id' => '1', 'name' => 'Completed', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '2', 'name' => 'Partial', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
               
        DB::table('event_types')->insert([
            ['id' => '1', 'name' => 'Coastal walks', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '2', 'name' => 'Yatch Trips', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '3', 'name' => 'Sky Diving', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '4', 'name' => 'Rock Climbing', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '5', 'name' => 'Evening Lectures', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

    }
}

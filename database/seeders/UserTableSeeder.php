<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::statement('SET FOREIGN_KEY_CHECKS=0;');
       User::truncate();
       DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // $faker = \Faker\Factory::create();
        User::create([
         "first_name"=>"Wasim",
         "last_name"=>"Ahmad 1",
         "email"=>"wasimahmad2520@gmail.com",
         "password"=>bcrypt("123456")
        ]);

        User::create([
         "first_name"=>"Wasim",
         "last_name"=>"Ahmad 2",
         "email"=>"wasimahmad@gmail.com",
         "password"=>bcrypt("123456")
        ]);

        User::create([
         "first_name"=>"Wasim",
         "last_name"=>"Ahmad 3",
         "email"=>"wasim@gmail.com",
         "password"=>bcrypt("123456")
        ]);

        User::create([
         "first_name"=>"Wasim",
         "last_name"=>"Ahmad 4",
         "email"=>"ahmad@gmail.com",
         "password"=>bcrypt("123456")
        ]);
        //
    }
}

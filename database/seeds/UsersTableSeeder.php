<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        //reset users table
        DB::table('users')->truncate();

        //generate 3 users/author

        DB::table('users')->insert([
                [
                    'name' => 'Sergio M. Tupaz',
                    'email' => 'sergiotupaz@gmail.com',
                    'password' => bcrypt('password'),
                   
                ],

                [
                    'name' => 'Blake James',
                    'email' => 'blakejames@gmail.com',
                    'password' => bcrypt('password'),
                   
                ],

                [
                    'name' => 'Blue mace',
                    'email' => 'bluemace@gmail.com',
                    'password' => bcrypt('password'),
                   
                ]
        ]);


    }
}

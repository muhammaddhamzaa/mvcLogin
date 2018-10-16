<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => "Muhammad Hamza",
            "email"=> "muhammadhamza@gmail.com",
            "password" => Hash::make("password123"),
            "remember_token"=>str_random(10)
        ]);
    }
}

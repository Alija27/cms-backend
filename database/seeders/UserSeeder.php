<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name"=>"Admin",
            "email"=>"admin@admin.com",
            "password"=>bcrypt("password"),
            "address"=>"Gaindakot",
            "phonenumber"=>"9812919812",
            "date_of_birth"=>"2059/02/08",
            
        ]);
    }
}

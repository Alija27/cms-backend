<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $admin= User::create([
            "name"=>"Admin",
            "email"=>"admin@admin.com",
            "password"=>bcrypt("password"),
            "address"=>"Gaindakot",
            "phonenumber"=>"9812919812",
            "date_of_birth"=>"2059/02/08" 
        ]);
        $admin->assignRole("admin");
        

        $accountant=User::create([
            "name"=>"Accountant",
            "email"=>"account@account.com",
            "password"=>bcrypt("password"),
            "address"=>"Gaindakot",
            "phonenumber"=>"9812919801",
            "date_of_birth"=>"2059/02/09"
        ]);
        $accountant->assignRole("accountant");

        $librarian=User::create([
            "name"=>"Librarian",
            "email"=>"library@library.com",
            "password"=>bcrypt("password"),
            "address"=>"Gaindakot",
            "phonenumber"=>"9812919815",
            "date_of_birth"=>"2059/02/10"
            
            
        ]);
        $librarian->assignRole("librarian");

        
        
    }
}

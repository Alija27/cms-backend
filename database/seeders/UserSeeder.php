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
            "user_name"=>"Admin",
            "email"=>"admin@admin.com",
            "password"=>bcrypt("password"),
            "address"=>"Gaindakot",
            "phonenumber"=>"9812919812",
            "date_of_birth"=>"2059/02/08",
            "guardian_name"=>"Ram",
            "guardian_phonenumber"=>"1234513456",
            "gender"=>"male"
        ]);
        $admin->assignRole("admin");

        $accountant=User::create([
            "user_name"=>"Accountant",
            "email"=>"account@account.com",
            "password"=>bcrypt("password"),
            "address"=>"Gaindakot",
            "phonenumber"=>"9812919801",
            "date_of_birth"=>"2059/02/09",
            "guardian_name"=>"Hari",
            "guardian_phonenumber"=>"1234567123",
            "gender"=>"male",
        ]);
        $accountant->assignRole("accountant");

        $librarian=User::create([
            "user_name"=>"Librarian",
            "email"=>"library@library.com",
            "password"=>bcrypt("password"),
            "address"=>"Gaindakot",
            "phonenumber"=>"9812919815",
            "date_of_birth"=>"2059/02/10",
            "guardian_name"=>"Shyam",
            "guardian_phonenumber"=>"9812919812",
            "gender"=>"male"
            
            
        ]);
        $librarian->assignRole("librarian");

        $examiner=User::create([
            "user_name"=>"   Examiner",
            "email"=>"exam@exam.com",
            "password"=>bcrypt("password"),
            "address"=>"Gaindakot",
            "phonenumber"=>"9812919815",
            "date_of_birth"=>"2059/02/10",
            "guardian_name"=>"Shyam",
            "guardian_phonenumber"=>"981298281",
            "gender"=>"male",
        ]);
        $examiner->assignRole("examiner");
        

        
        
    }
}

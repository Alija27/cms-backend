<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            "name" => "admin",
            "guard_name" => "web",
        ]);

        Role::create([
            "name" => "accountant",
            "guard_name" => "web"
        ]);
        Role::create([
            "name" => "examiner",
            "guard_name" => "web",
        ]);
        Role::create([
            "name" => "librarian",
            "guard_name" => "web",
        ]);

        Role::create([
            "name" => "teacher",
            "guard_name" => "web",
        ]);

        Role::create([
            "name" => "student",
            "guard_name" => "web",
        ]);
    }
}

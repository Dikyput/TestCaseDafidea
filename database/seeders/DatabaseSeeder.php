<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('users')->insert([
            'username' => 'Admin',
            'firtsname' => 'Admin',
            'lastname' => 'Dafidea',
            'password' => '$2y$10$o.SBVt9gzPI.Phcz9GWkBeRMi3rls4L48oqERPmk.bRdmVB/cz0Jq',
            'email' => 'admin@gmail.com',
            ]);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Jose',
                'email' => 'josearceguerrero1997@gmail.com',
                'password' => Hash::make('esunapass'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'is_admin' => 0,
            'purchased_credits' => 1500,
            'password' => Hash::make('secret'),
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'is_admin' => 0,
            'purchased_credits' => 1500,
            'password' => Hash::make('secret'),
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'is_admin' => 0,
            'purchased_credits' => 1500,
            'password' => Hash::make('secret'),
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'is_admin' => 0,
            'purchased_credits' => 1000,
            'password' => Hash::make('secret'),
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'is_admin' => 0,
            'purchased_credits' => 1000,
            'password' => Hash::make('secret'),
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'is_admin' => 0,
            'purchased_credits' => 1000,
            'password' => Hash::make('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'is_admin' => 1,
            'purchased_credits' => 1000,
            'password' => Hash::make('secret'),
        ]);


    }
}

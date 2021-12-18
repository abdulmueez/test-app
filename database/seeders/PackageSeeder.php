<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
            'name' => 'Test package 1',
            'description' => 'this is test description',
            'commitment_period' => 12,
            'credits' => 100,
            'enabled' => 1,
            'sell_limit' => 10,
        ]);

        DB::table('packages')->insert([
            'name' => 'Test package 2',
            'description' => 'this is test description',
            'commitment_period' => 8,
            'credits' => 75,
            'enabled' => 1,
            'sell_limit' => 10,
        ]);

        DB::table('packages')->insert([
            'name' => 'Test package 3',
            'description' => 'this is test description',
            'commitment_period' => 6,
            'credits' => 50,
            'enabled' => 1,
            'sell_limit' => 10,
        ]);

        DB::table('packages')->insert([
            'name' => 'Test package 4',
            'description' => 'this is test description',
            'commitment_period' => 4,
            'credits' => 40,
            'enabled' => 1,
            'sell_limit' => 10,
        ]);

        DB::table('packages')->insert([
            'name' => 'Test package 5',
            'description' => 'this is test description',
            'commitment_period' => 3,
            'credits' => 30,
            'enabled' => 1,
            'sell_limit' => 10,
        ]);

        DB::table('packages')->insert([
            'name' => 'Test package 6',
            'description' => 'this is test description',
            'commitment_period' => 2,
            'credits' => 20,
            'enabled' => 1,
            'sell_limit' => 10,
        ]);
    }
}

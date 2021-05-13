<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'monster-johan',
            'nickname' => 'johan',
            'email' => "johnil5@kth.se",
            'is_verified' => 1,
            'password' => Hash::make('password'),
        ]);
    }
}

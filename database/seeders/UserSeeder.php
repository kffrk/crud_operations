<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Administrator',
                'last_name' => 'Systemu',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$v5awLUVICuDQtat9q4UNFO5C8RA4eAv2KQl7tx9dvZzwy2iHs7glO',
                'role_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'first_name' => 'Default',
                'last_name' => 'User',
                'email' => 'user@gmail.com',
                'password' => '$2y$10$v5awLUVICuDQtat9q4UNFO5C8RA4eAv2KQl7tx9dvZzwy2iHs7glO',
                'role_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
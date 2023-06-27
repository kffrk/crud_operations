<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
            'permissions' => '["players","clubs","leagues"]',
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'name' => 'user',
            'permissions' => '[]',
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
    }
}
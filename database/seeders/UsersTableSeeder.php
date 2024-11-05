<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
         'name' => 'Administrator',
         'email' => 'admin@gmail.com',
         'password' => Hash::make('admineeram'),
         'is_admin' => '1'
        ]);
    }
}

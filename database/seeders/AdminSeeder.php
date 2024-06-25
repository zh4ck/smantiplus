<?php

namespace Database\Seeders;

use App\Models\Administrator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrators')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'slug' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '08888888888',
            'password' => Hash::make('password'),
            'status' => 'Aktif',
            'role_id' => 1, 
        ]);
    }
}
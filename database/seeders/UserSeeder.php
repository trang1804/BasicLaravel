<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
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
            'username' => 'Khuất Thu Trang',
            'email' => 'thutrangk2000@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'role' => 'Admin',
            'remember_token' => Str::random(10),
        ]);
        User::factory()->count(100)->create();
    }
}

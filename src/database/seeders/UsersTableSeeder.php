<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username'   => 'teste1@teste.com',
                'password'   =>  bcrypt('123123'),
                'created_at' =>  date('Y-m-d H:i:s')
            ],
            [
                'username'   => 'teste2@teste.com',
                'password'   =>  bcrypt('123123'),
                'created_at' =>  date('Y-m-d H:i:s')
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Vinicius Sarmento',
                    'email' => 'vinicius@user.com',
                    'password' => bcrypt('@Sarmento123'),
                    'email_verify' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'User 1',
                    'email' => 'user@user.com',
                    'password' => bcrypt('abcd1234'),
                    'email_verify' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'user2',
                    'amail' => 'user@user.com',
                    'password' => bcrypt('@Sarmento123'),
                    'email_verify' => date('Y-m-d H:i:s')
                ]
            ]
        );
    }
}

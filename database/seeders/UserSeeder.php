<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=> 'Mas Admin',
                'email'=> 'admin@ex.com',
                'role'=> 'superadmin',
                'password'=> '12345678'
            ],
            [
                'name'=> 'Ustadz',
                'email'=> 'ustadz@ex.com',
                'role'=> 'admin',
                'password'=> '12345678'
            ],
            [
                'name'=> 'Mas Santri',
                'email'=> 'santri@ex.com',
                'role'=> 'santri',
                'password'=> '12345678'
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }

}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
            ]
        ];

        foreach($data as $user){
            $user = User::create($user);
            $userDetails = [
                    'user_id' => $user->id,
                    'mobile_number' => 01,
                    'user_status' => 1,
            ];

            UserDetails::create($userDetails);
        }
    }
}

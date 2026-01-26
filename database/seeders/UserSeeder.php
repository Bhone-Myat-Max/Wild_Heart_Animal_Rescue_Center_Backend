<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                $users = [
            [
                'name' => 'James Walker',
                'phone' => '09-456-789-123',
                'address' => 'Yangon, Myanmar',
                'status' => 'Active',
                'email' => 'james.walker@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Bob',
                'phone' => '09-987-654-321',
                'address' => 'Mandalay, Myanmar',
                'status' => 'Active',
                'email' => 'bob@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'May Thu Aung',
                'phone' => '09-234-567-890',
                'address' => 'Bago, Myanmar',
                'status' => 'Active',
                'email' => 'maythu@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Robert Smith',
                'phone' => '09-321-654-987',
                'address' => 'Nay Pyi Taw, Myanmar',
                'status' => 'Active',
                'email' => 'robert.smith@yahoo.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Ko Phyo',
                'phone' => '09-765-432-111',
                'address' => 'Taunggyi, Myanmar',
                'status' => 'Active',
                'email' => 'kophyo@gmail.com',
                'password' => Hash::make('password'),
            ],
        ];

        foreach($users as $data){
            User::create($data);
        }

    }
}

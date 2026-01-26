<?php

namespace Database\Seeders;

use App\Models\Donation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
        {

            $donations = [
                [
                    'name' => 'James Walker',
                    'amount' => '100.00',
                    'email' => 'james.walker@gmail.com',
                    'phone' => '09-456-789-123',
                    'purpose' => 'Animal Medical Treatment',
                ],
                [
                    'name' => 'Kelvn',
                    'amount' => '50.00',
                    'email' => 'kelvan@gmail.com',
                    'phone' => '09-987-654-321',
                    'purpose' => 'Food for Rescued Animals',
                ],
                [
                    'name' => 'Mg Thi',
                    'amount' => '75.00',
                    'email' => 'mgthi@gmail.com',
                    'phone' => '09-234-567-890',
                    'purpose' => 'Shelter Maintenance',
                ],
                [
                    'name' => 'Robert Smith',
                    'amount' => '120.00',
                    'email' => 'robert.smith@yahoo.com',
                    'phone' => '09-321-654-987',
                    'purpose' => 'Emergency Rescue Fund',
                ],
                [
                    'name' => 'Poe Nyi',
                    'amount' => '30.00',
                    'email' => 'poenyi@gmail.com',
                    'phone' => '09-765-432-111',
                    'purpose' => 'Vaccination Program',
                ],
                [
                    'name' => 'Daniel Lee',
                    'amount' => '200.00',
                    'email' => 'daniel.lee@gmail.com',
                    'phone' => '09-555-666-777',
                    'purpose' => 'Surgery Support',
                ],
                [
                    'name' => 'Thuta',
                    'amount' => '40.00',
                    'email' => 'thuta@gmail.com',
                    'phone' => '09-222-333-444',
                    'purpose' => 'Animal Feeding Program',
                ],
                [
                    'name' => 'Michael Brown',
                    'amount' => '150.00',
                    'email' => 'michael.brown@gmail.com',
                    'phone' => '09-999-888-777',
                    'purpose' => 'Rescue Vehicle Maintenance',
                ],
                [
                    'name' => 'Bhone Myat',
                    'amount' => '60.00',
                    'email' => 'bhonemyat@gmail.com',
                    'phone' => '09-111-222-333',
                    'purpose' => 'Public Awareness Campaign',
                ],
                [
                    'name' => 'Kyaw Lin',
                    'amount' => '90.00',
                    'email' => 'kyawlin@gmail.com',
                    'phone' => '09-444-555-666',
                    'purpose' => 'Animal Shelter Expansion',
                ],
            ];

            foreach($donations as $data ){
                Donation::create($data);
            }
    }
}

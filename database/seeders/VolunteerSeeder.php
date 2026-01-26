<?php

namespace Database\Seeders;
use App\Models\Volunteer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VolunteerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $volunteer = [
            [
                'name' => 'james',
                'skill' => 'Animal First Aid, Handling',
                'availability' => 'Weekends',
                'phone' => '09-456-789-123',
                'status' => 'Pending'
            ],
            [
                'name' => 'Robert',
                'skill' => 'Feeding & Cleaning',
                'availability' => 'Weekdays (Evening)',
                'phone' => '09-987-654-321',
                'status' => 'Accepted'
            ],
            [
                'name' => 'Aung Min',
                'skill' => 'Rescue Support, Transport',
                'availability' => 'Anytime',
                'phone' => '09-234-567-890',
                'status' => 'Accepted'
            ],
            [
                'name' => 'Thiri Zaw',
                'skill' => 'Animal Care, Cage Cleaning',
                'availability' => 'Weekends',
                'phone' => '09-765-432-111',
                'status' => 'Pending'
            ],
            [
                'name' => 'Kyaw Lin',
                'skill' => 'Driving, Emergency Response',
                'availability' => 'Weekdays',
                'phone' => '09-321-654-987',
                'status' => 'Accepted'
            ],
            [
                'name' => 'May Thu',
                'skill' => 'Fundraising, Public Awareness',
                'availability' => 'Weekends',
                'phone' => '09-888-123-456',
                'status' => 'Pending'
            ],
            [
                'name' => 'Daniel',
                'skill' => 'Medical Assistance',
                'availability' => 'Weekdays (Morning)',
                'phone' => '09-555-666-777',
                'status' => 'Accepted'
            ],
            [
                'name' => 'Hnin Wai',
                'skill' => 'Animal Feeding, Record Keeping',
                'availability' => 'Anytime',
                'phone' => '09-222-333-444',
                'status' => 'Accepted'
            ],
            [
                'name' => 'Michael',
                'skill' => 'Shelter Maintenance',
                'availability' => 'Weekdays',
                'phone' => '09-999-888-777',
                'status' => 'Pending'
            ],
            [
                'name' => 'Su Mon',
                'skill' => 'Social Media, Awareness Campaigns',
                'availability' => 'Weekends',
                'phone' => '09-111-222-333',
                'status' => 'Accepted'
            ]
        ];

        foreach($volunteer as  $data){
            Volunteer::create($data);
        }
    }
}

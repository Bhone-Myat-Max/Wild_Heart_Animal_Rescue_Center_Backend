<?php

namespace Database\Seeders;

use App\Models\RescueCase;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RescueCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cases = [
    [
        'case_title' => 'Injured Dog on Highway',
        'reported_by' => 'Aung Aung',
        'location' => 'North Okkalapa, Yangon',
        'description' => 'A dog was hit by a car and cannot walk properly.',
        'priority_level' => 'High',
        'case_status' => 'Pending',
    ],
    [
        'case_title' => 'Cat Stuck on Tree',
        'reported_by' => 'Su Su Khin',
        'location' => 'Hlaing Township, Yangon',
        'description' => 'A small kitten is stuck on a tall tree for hours.',
        'priority_level' => 'Medium',
        'case_status' => 'In Progress',
    ],
    [
        'case_title' => 'Snake in House',
        'reported_by' => 'U Min Lwin',
        'location' => 'Bahan Township, Yangon',
        'description' => 'A snake entered a house and residents are afraid.',
        'priority_level' => 'Emergency',
        'case_status' => 'Pending',
    ],
    [
        'case_title' => 'Bird with Broken Wing',
        'reported_by' => 'Online Form',
        'location' => 'Mandalay City',
        'description' => 'A bird found on the street with injured wing.',
        'priority_level' => 'Low',
        'case_status' => 'Completed',
    ],
    [
        'case_title' => 'Stray Dog Aggressive Behavior',
        'reported_by' => 'Community Report',
        'location' => 'Insein Township, Yangon',
        'description' => 'A stray dog showing aggressive behavior near school.',
        'priority_level' => 'Medium',
        'case_status' => 'In Progress',
    ],
    [
        'case_title' => 'Cow Stuck in Drainage',
        'reported_by' => 'Farmer Group',
        'location' => 'Bago Region',
        'description' => 'A cow fell into a drainage canal and cannot get out.',
        'priority_level' => 'High',
        'case_status' => 'Pending',
    ],
    [
        'case_title' => 'Monkey Entered Market',
        'reported_by' => 'Market Staff',
        'location' => 'Thanlyin Market',
        'description' => 'A wild monkey entered the market and caused disturbance.',
        'priority_level' => 'Emergency',
        'case_status' => 'Completed',
    ],
    [
        'case_title' => 'Abandoned Puppies',
        'reported_by' => 'Facebook Message',
        'location' => 'Dagon Township, Yangon',
        'description' => 'Five puppies abandoned near garbage dump.',
        'priority_level' => 'Low',
        'case_status' => 'Pending',
    ],
    [
        'case_title' => 'Injured Eagle Found',
        'reported_by' => 'Forest Department',
        'location' => 'Shan State',
        'description' => 'An eagle with injured leg found by forest officers.',
        'priority_level' => 'High',
        'case_status' => 'In Progress',
    ],
    [
        'case_title' => 'Road Accident Dog Rescue',
        'reported_by' => 'Anonymous Caller',
        'location' => 'Pyay Road, Yangon',
        'description' => 'A dog injured after road accident, bleeding heavily.',
        'priority_level' => 'Emergency',
        'case_status' => 'Pending',
    ],
];

     foreach($cases as $data){
            RescueCase::create($data);
        }

    }
}

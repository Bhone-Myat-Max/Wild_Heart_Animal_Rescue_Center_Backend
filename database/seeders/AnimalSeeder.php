<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnimalSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('animals')->insert([
            [
                'tagcode_name'   => 'WH-001-LION',
                'species'        => 'Lion',
                'gender'         => 'Male',
                'estimated_age'  => '5 years',
                'health_status'  => 'Healthy',
                'rescue_id'      => null, // Set to an existing ID if you have rescue_cases
                'rescue_date'    => Carbon::parse('2023-05-15'),
                'current_status' => 'In Rehabilitation',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'tagcode_name'   => 'WH-002-ELE',
                'species'        => 'Elephant',
                'gender'         => 'Female',
                'estimated_age'  => '12 years',
                'health_status'  => 'Injured Leg',
                'rescue_id'      => null,
                'rescue_date'    => Carbon::now()->subMonths(2),
                'current_status' => 'Under Medical Care',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ]);
    }
}

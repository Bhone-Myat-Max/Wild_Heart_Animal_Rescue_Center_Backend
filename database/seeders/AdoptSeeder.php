<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdoptSeeder extends Seeder
{
    public function run(): void
    {
        // Fetch an animal to link the adoption to
        $animal = DB::table('animals')->first();

        if ($animal) {
            DB::table('adopts')->insert([
                [
                    'animal_id'    => $animal->animal_id,
                    'species'      => $animal->species, // Match the species from the animal record
                    'adopted_by'   => 'John Doe',
                    'address'      => '123 Rescue Lane, Yangon',
                    'email'        => 'johndoe@example.com',
                    'phone_number' => '09123456789',
                    'adopted_date' => Carbon::now()->subDays(5),
                ],
                [
                    'animal_id'    => $animal->animal_id,
                    'species'      => $animal->species,
                    'adopted_by'   => 'Jane Smith',
                    'address'      => '456 Sanctuary Road, Mandalay',
                    'email'        => 'janesmith@example.com',
                    'phone_number' => '09987654321',
                    'adopted_date' => Carbon::now(),
                ]
            ]);
        }
    }
}

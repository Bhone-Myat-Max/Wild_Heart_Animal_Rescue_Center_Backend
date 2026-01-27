<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Animal; // Make sure you have models created
use App\Models\User;
use Carbon\Carbon;

class TreatmentSeeder extends Seeder
{
    public function run(): void
    {
        // Get existing IDs so the foreign keys don't fail
        $animalId = DB::table('animals')->first()->animal_id ?? null;
        $userId = DB::table('users')->first()->id ?? null;

        if ($animalId && $userId) {
            DB::table('treatments')->insert([
                [
                    'animal_id'      => $animalId,
                    'user_id'        => $userId,
                    'diagnosis'      => 'Dehydration and minor lacerations',
                    'treatment_date' => Carbon::now()->subDays(2),
                    'notes'          => 'Administered IV fluids and cleaned wounds.',
                    // 'created_at'     => now(),
                    // 'updated_at'     => now(),
                ],
                [
                    'animal_id'      => $animalId,
                    'user_id'        => $userId,
                    'diagnosis'      => 'Routine Vaccination',
                    'treatment_date' => Carbon::now(),
                    'notes'          => 'Rabies and distemper shots given.',
                    // 'created_at'     => now(),
                    // 'updated_at'     => now(),
                ],
            ]);
        }
    }
}

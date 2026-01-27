<?php

use App\Http\Controllers\API\AdoptController;
use App\Http\Controllers\API\AnimalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TreatmentController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Api\VolunteerController;

// Route::get('/ping', function () {
//     return response()->json([
//         'status' => 'ok',
//         'message' => 'Laravel API is working'
//     ]);
// });

Route::post('/auth/login', [AuthController::class, 'login']);
#User
Route::apiResource('/user', UserController::class);
Route::apiResource('/volunteer', VolunteerController::class);

// Route::apiResource('/donation', DonationController::class);


// Animal Routes
Route::apiResource('animals', AnimalController::class);
Route::delete('animals/{id}', [AnimalController::class, 'delete']);

// Treatment Routes
Route::apiResource('treatments', TreatmentController::class);
Route::delete('treatments/{id}', [TreatmentController::class, 'delete']);

// Adoption Routes
Route::apiResource('adopts', AdoptController::class);
Route::delete('adopts/{id}', [AdoptController::class, 'delete']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Api\VolunteerController;

// Route::get('/ping', function () {
//     return response()->json([
//         'status' => 'ok',
//         'message' => 'Laravel API is working'
//     ]);
// });

Route::post('/auth/login', [AuthController::class , 'login']);
#User
Route::apiResource('/user', UserController::class);
Route::apiResource('/volunteer', VolunteerController::class);

// Route::apiResource('/donation', DonationController::class);





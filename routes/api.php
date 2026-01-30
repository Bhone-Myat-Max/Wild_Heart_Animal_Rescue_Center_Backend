<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\DonationController;
use App\Http\Controllers\Api\VolunteerController;
use App\Http\Controllers\API\RescueCaseController;
use App\Http\Controllers\API\RescueAssignController;

// Route::get('/ping', function () {
//     return response()->json([
//         'status' => 'ok',
//         'message' => 'Laravel API is working'
//     ]);
// });

Route::post('/auth/login', [AuthController::class , 'login']);
#User
Route::apiResource('/users', UserController::class);

#Volunteer API
//product
Route::get('volunteers/accepted',[VolunteerController::class, 'acceptedVolunteer']);
Route::get('volunteers/pending',[VolunteerController::class, 'pendingVolunteer']);
Route::get('volunteers/{id}',[VolunteerController::class, 'show']);
Route::post('volunteers', [VolunteerController::class, 'store']);
Route::post('volunteers/{id}',[VolunteerController::class, 'update']);
Route::post('volunteers/{id}/status-update',[VolunteerController::class, 'statusUpdate']);
Route::delete('volunteers/{id}',[VolunteerController::class, 'delete']);


// Route::apiResource('/volunteers', VolunteerController::class);
Route::apiResource('/rescuecases', RescueCaseController::class);
Route::apiResource('/donations', DonationController::class);
Route::apiResource('/rescue_assign', RescueAssignController::class);





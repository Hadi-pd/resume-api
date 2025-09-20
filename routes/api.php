<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\WorkExperienceController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/user/{user}', [AuthController::class, 'updateUser']);
    
    Route::apiResource('skills', SkillController::class);
    Route::apiResource('work-experiences', WorkExperienceController::class);
    Route::apiResource('educations', EducationController::class);
});
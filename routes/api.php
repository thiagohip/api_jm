<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/user/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/user/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/user/logout', [App\Http\Controllers\AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/user/stacks', [App\Http\Controllers\StackUserController::class, 'index']);

Route::post('/user/addStack', [App\Http\Controllers\StackUserController::class, 'create']);

Route::get('/stacks', [App\Http\Controllers\StackController::class, 'index']);
Route::post('/stacks/create', [App\Http\Controllers\StackController::class, 'create']);

Route::post('/stack_user', [App\Http\Controllers\StackUserController::class, 'create']);
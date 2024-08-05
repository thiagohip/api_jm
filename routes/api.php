<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user/stacks/page={page}', [App\Http\Controllers\StackUserController::class, 'index']);
Route::middleware('auth:sanctum')->get('/user/stacks/getMaxPage', [App\Http\Controllers\StackUserController::class, 'maxPage']);

Route::get('/stacks', [App\Http\Controllers\StackController::class, 'index']);
Route::post('/stacks/create', [App\Http\Controllers\StackController::class, 'create']);


Route::post('/stack_user', [App\Http\Controllers\StackUserController::class, 'create']);
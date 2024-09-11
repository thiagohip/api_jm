<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StackController;

Route::get('/teste', function () {return ('Olá mundo');});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->post('/stack/store', [StackController::class , 'store']);
Route::middleware('auth:sanctum')->get('/stack/index', [StackController::class , 'index']);



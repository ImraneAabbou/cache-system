<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

Route::get('/', function () { return view('welcome');});

Route::get('/research', [SearchController::class, 'research']);
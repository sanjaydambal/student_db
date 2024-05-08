<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearnerController;
Route::get('/', function () {
    return view('welcome');
});
Route::resource('learners', LearnerController::class);
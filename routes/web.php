<?php

use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/projects');
Route::resource('projects', ProjectController::class);

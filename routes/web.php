<?php

use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/project');
Route::resource('project', ProjectController::class);

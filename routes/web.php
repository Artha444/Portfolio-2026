<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;

Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::get('/projects', [PageController::class, 'projects'])->name('projects.index');
Route::get('/project/{project}', [PageController::class, 'projectDetail'])->name('project.detail');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function() { 
        $projectCount = \App\Models\Project::count();
        $skillCount = \App\Models\Skill::count();
        return view('admin.dashboard', compact('projectCount', 'skillCount')); 
    })->name('dashboard');
    Route::resource('projects', ProjectController::class);
    Route::resource('skills', SkillController::class);
});

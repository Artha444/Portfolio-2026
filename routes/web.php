<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\AuthController;

Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::get('/projects', [PageController::class, 'projects'])->name('projects.index');
Route::get('/project/{project}', [PageController::class, 'projectDetail'])->name('project.detail');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', function() { 
        $projectCount = \App\Models\Project::count();
        $skillCount = \App\Models\Skill::count();
        $unreadMessages = \App\Models\Message::where('is_read', false)->count();
        return view('admin.dashboard', compact('projectCount', 'skillCount', 'unreadMessages')); 
    })->name('dashboard');
    Route::resource('projects', ProjectController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
});

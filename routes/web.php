<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [StoryController::class, 'home'])->name('home');
Route::get('/logout', [ProfileController::class, 'logout'])->name('profile.logout');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [ProfileController::class, 'users'])->name('admin.users');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //stories
    Route::get('/stories-list', [StoryController::class, 'index'])->name('stories.list');
    Route::get('/stories', [StoryController::class, 'create'])->name('stories.create');
    Route::get('/stories/{id}', [StoryController::class, 'edit'])->name('stories.edit');
    Route::put('/stories/{id}', [StoryController::class, 'update'])->name('stories.update');
    Route::post('/stories', [StoryController::class, 'store'])->name('stories.store');
    Route::post('/update-story-status', [StoryController::class, 'updateStoryStatus'])->name('stories.update.status');
    Route::post('/delete-story', [StoryController::class, 'deleteStory'])->name('stories.delete');
    Route::get('/like-story', [StoryController::class, 'likeStory'])->name('stories.like');


});
Route::get('/stories/{id}/show', [StoryController::class, 'show'])->name('stories.show');

require __DIR__.'/auth.php';

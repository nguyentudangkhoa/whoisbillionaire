<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Web\Content\Questions\QuestionController;
use \App\Http\Controllers\User\UserController;
use \App\Http\Controllers\Web\Content\Levels\LevelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('user', [UserController::class, 'loginForm'])->name('user-login.index');
Route::post('user', [UserController::class, 'login'])->name('user-login.login');
Route::middleware('checkLogin')->group(function(){
    //Question
    Route::get('/', [QuestionController::class, 'index'])->name('question.index');
    Route::get('/question-create', [QuestionController::class, 'create'])->name('question.create');
    Route::post('/question-create', [QuestionController::class, 'store'])->name('question.store');
    Route::get('/question-edit/{id}', [QuestionController::class, 'edit'])->name('question.show');
    Route::put('/question-edit/{id}', [QuestionController::class, 'update'])->name('question.edit');
    Route::delete('/question-delete/{id}', [QuestionController::class, 'destroy'])->name('question.delete');

    //Users
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/user-create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user-create', [UserController::class, 'store'])->name('user.store');
    Route::get('/user-edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user-edit/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user-delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

    //Levels
    Route::get('/levels', [LevelController::class, 'index'])->name('level.index');
    Route::get('/create-levels', [LevelController::class, 'create'])->name('level.create');
    Route::post('/create-levels', [LevelController::class, 'store'])->name('level.store');
    Route::get('/update-levels/{id}', [LevelController::class, 'edit'])->name('level.edit');
    Route::put('/update-levels/{id}', [LevelController::class, 'update'])->name('level.update');
    Route::delete('/delete-levels/{id}', [LevelController::class, 'destroy'])->name('level.destroy');

    //Logout
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
});


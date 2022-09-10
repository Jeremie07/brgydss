<?php

<<<<<<< HEAD
use Illuminate\Support\Facades\Route;
=======
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DocumentListController;
use App\Http\Controllers\DocumentRequestController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\DocumentRequest;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
>>>>>>> d68e117 (Commit)

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


<<<<<<< HEAD
Route::get('/request', function () {
    return view('request');
})->middleware(['auth'])->name('request');


Route::get('/status', function () {
    return view('status');
})->middleware(['auth'])->name('status');

=======


Route::get('/request',[DocumentRequestController::class,'index'])->middleware(['auth','role:resident'])->name('request');
Route::post('/request/create',[DocumentRequestController::class,'store'])->name('documentrequest.store');
Route::get('/status',[DocumentRequestController::class,'show'])->middleware(['auth','role:resident'])->name('status');


Route::get('/documentlist',[DocumentListController::class,'index']);
Route::get('/documentlist/edit/{id}',[DocumentListController::class,'edit'])->name('documentlist.edit');
Route::get('/documentlist/update/{id}',[DocumentListController::class,'update'])->name('documentlist.update');
Route::post('/documentlist/create',[DocumentListController::class,'store'])->name('documentlist.store');
Route::delete('/documentlist/delete/{id}',[DocumentListController::class,'destroy'])->name('documentlist.destroy');
Route::resource('admin/user', UserController::class)->middleware(['auth','role:admin']);
Route::resource('admin/role', RoleController::class)->middleware(['auth','role:admin']);
Route::post('/user/{user}/role',[UserController::class, 'assignRole'])->name('user.assignRole');
Route::delete('/user/{user}/role/{role}',[UserController::class,'removeRole'])->name('user.removeRole');
>>>>>>> d68e117 (Commit)
require __DIR__.'/auth.php';

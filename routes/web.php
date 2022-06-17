<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentGroupController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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
Route::get('dashboard', function () {
    return view('dashboard');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');
Route::resource('students', StudentController::class);
Route::resource('studentGroups', StudentGroupController::class);
Route::resource('rayons', RayonController::class);
Route::resource('publishers', PublisherController::class);
Route::resource('books', BookController::class);
Route::resource('borrowings', BorrowingController::class);

Route::get('/register', [RegisterController::class, 'index']);
Route::get('/search', [StudentController::class, 'search'])->name('search');
Route::get('/search', [BookController::class, 'search'])->name('search');


// route untuk memberikan function store dari RegisterController kepada /register yang mana methodnya POST
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authanticate']);

// route untuk memberikan function store dari RegisterController kepada /register yang mana methodnya POST
Route::post('/register', [RegisterController::class, 'store']);

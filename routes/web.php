<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\ReadingRecordController;
use App\Http\Controllers\AssignedBookController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[AssignedBookController::class,'index'])->name('dashboard');
    /*Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');*/
});

Route::get('assigned_books',[AssignedBookController::class,'index'])->name('assigned_books.index');
Route::post('assigned_books',[AssignedBookController::class,'index'])->name('assigned_books.select');
Route::get('assigned_books/list',[AssignedBookController::class,'index'])->name('assigned_books.list');
Route::post('assigned_books/list',[AssignedBookController::class,'index'])->name('assigned_books.list');
Route::post('assigned_books/add', [AssignedBookController::class,'add'])->name('assigned_books.add');
Route::delete('assigned_books/{assigned_book}', [AssignedBookController::class,'destroy'])->name('assigned_books.destroy');
Route::post('assigned_books/search', [AssignedBookController::class,'search'])->name('assigned_books.search');

Route::post('books/search', [BookController::class,'search']);
Route::get('reading_records/booklist/{id}', [ReadingRecordController::class,'booklist'])->name('reading_records.booklist');
Route::get('reading_records/readerlist', [ReadingRecordController::class,'readerlist'])->name('reading_records.readerlist');
Route::get('reading_records/add/{id}', [ReadingRecordController::class,'add'])->name('reading_records.add');
Route::post('reading_records/search', [ReadingRecordController::class,'search'])->name('reading_records.search');
Route::get('reading_records/searchbyreader', [ReadingRecordController::class,'searchbyreader'])->name('reading_records.searchreader');

Route::resource('books', BookController::class);
Route::resource('readers', ReaderController::class);
Route::resource('reading_records', ReadingRecordController::class);
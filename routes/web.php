<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
//use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\FilterController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

/* Route::get('/mailable', function(){
    $data= Lead::find(1);
    return new App\Mail\NewLeadMessage($data);
}) */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/projects-filtered/{id}', [FilterController::class, 'filter'])->name('filtered');

        Route::resource('projects', ProjectController::class)->parameters([
            'projects' => 'project:slug'
        ]);
        Route::resource('types', TypeController::class)->parameters([
            'types' => 'type:slug'
        ]);
        Route::resource('technologies', TechnologyController::class)->parameters([
            'technologies' => 'technology:slug'
        ]);
    });

require __DIR__ . '/auth.php';

/* Route::get('/photos/popular', [PhotoController::class, 'popular']);
Route::resource('photos', PhotoController::class); */

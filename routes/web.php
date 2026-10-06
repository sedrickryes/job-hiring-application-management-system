<?php
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\WeatherController;

Route::get('/test-weather', [WeatherController::class, 'getWeather']);


Route::get('/', function () {
    return view('welcome');
});


// General dashboard
Route::get('/dashboard', function () {
    $user = request()->user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    if ($user->role === 'applicant') {
        return redirect()->route('applicant.dashboard');
    }

    abort(403, 'Invalid user role.');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {

    Route::resource('/admin/users', UserManagementController::class)
        ->names('admin.users');
        

});

// Administrator / HR Dashboard
Route::get('/admin/dashboard', function () {
    $weather = app(WeatherController::class)->getWeather();

    return view('admin.dashboard', ['weather' => $weather]);
})->middleware(['auth', 'verified', 'role:admin'])
    ->name('admin.dashboard');

Route::resource('/admin/jobs', JobController::class)
    ->names('admin.jobs');

// Applicant Dashboard
Route::get('/applicant/dashboard', function () {
    return view('applicant.dashboard');
})->middleware(['auth', 'verified', 'role:applicant'])
    ->name('applicant.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
<?php

use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Admin/Dashboard', [
            'stats' => ['users' => User::count(), 'orders' => 0, 'blogs' => 0, 'income' => 0]
        ]);
    })->name('dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'fa'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('language.switch');

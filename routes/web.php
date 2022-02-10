<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Backend
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    // Authenticate for admin
    Route::get('/login', [App\Http\Controllers\Admin\AdminController::class, 'showLoginForm']);
    Route::post('/login', [App\Http\Controllers\Admin\AdminController::class, 'login'])->name('admin.login');

    Route::middleware('admin')->group(function () {
        Route::get('search-user', [App\Http\Controllers\StudentController::class, 'index'])->name('search');
        Route::get('search-user/list', [App\Http\Controllers\StudentController::class, 'getStudents'])->name('students.list');

        Route::get('search-contacts', [App\Http\Controllers\SearchController::class, 'index'])->name('searchContacts');
        Route::get('search-contacts/list', [App\Http\Controllers\SearchController::class, 'getContacts'])->name('search.contacts');

        Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/dashboard/statistics', [App\Http\Controllers\Admin\AdminController::class, 'statistics'])->name('statistics');

        Route::group(['namespace' => 'Users'], function () {
            Route::resource('users', 'UserController')->names('admin.users');
        });

        Route::group(['namespace' => 'Cutaway', 'prefix' => 'cutaway'], function () {
            Route::resource('contacts', 'ContactController')->names('admin.cutaway.contacts');
        });
    });
});

// Пользователи
Route::middleware('auth')->group(function () {

    Route::name('edit')->get('/edit/{profileId}', [App\Http\Controllers\Cutaway\CutawayController::class, 'edit']);

    Route::name('edit.profile')->get('/profile/{profileId}', [App\Http\Controllers\Cutaway\CutawayController::class, 'profile']);
    Route::name('uploadAvatar.profile')->post('/profile/uploadAvatar/{profileId}/', [App\Http\Controllers\Cutaway\CutawayController::class, 'uploadAvatar']);
    Route::name('save.profile')->post('/profile/{profileId}', [App\Http\Controllers\Cutaway\CutawayController::class, 'save']);

    Route::name('edit.contacts')->post('/contacts/{profileId}', [App\Http\Controllers\Cutaway\CutawayController::class, 'contacts']);
    Route::name('edit.add-contact')->get('/add-contact/{profileId}/{contactId}', [App\Http\Controllers\Cutaway\CutawayController::class, 'addContact']);

    Route::name('edit.edit-contact')->get('/edit-contact/{profileId}/{contactId}', [App\Http\Controllers\Cutaway\CutawayController::class, 'editContact']);
    Route::name('edit.save-contact')->post('/edit-contact/{profileId}/{contactId}', [App\Http\Controllers\Cutaway\CutawayController::class, 'saveContact']);
    Route::name('edit.delete-contact')->delete('/edit-contact/{profileId}/{contactId}', [App\Http\Controllers\Cutaway\CutawayController::class, 'deleteContact']);


});

Route::get('/{link}', [App\Http\Controllers\Cutaway\CutawayController::class, 'show'])->name('link');
Route::get('/qr/code', [App\Http\Controllers\Cutaway\QrCodeController::class, 'show'])->name('qr');

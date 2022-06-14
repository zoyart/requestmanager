<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PriceListController;
use App\Http\Controllers\PriceListWorkController;
use App\Http\Controllers\PriceListMaterialController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactPersonController;
use App\Http\Controllers\RoleController;

// Стартовая страница
Route::view('/', 'index')->name('index');

// Только гости могут посещать данные страницы
Route::group(['middleware' => 'guest'], function () {
//    Регистрация
    Route::get('/register', [UserController::class, 'register'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');

//    Аутентификация
    Route::get('/login', [UserController::class, 'loginForm'])->name('login.form');
    Route::post('/login', [UserController::class, 'auth'])->name('auth');
});

// Выход из аккаунта
Route::group(['middleware', 'auth'], function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'auth'], function () {
//    Заявка
    Route::put('/requests/change-status/{id}', [RequestController::class, 'changeStatus'])
        ->name('requests.change-status');
    Route::delete('/requests/delete-few', [RequestController::class, 'deleteFew'])
        ->name('requests.delete-few');
    Route::resource('/requests', RequestController::class)
        ->middleware('can:Просмотр всех заявок');

//    Прайс лист
    Route::delete('/price-list/delete-few', [PriceListController::class, 'deleteFew'])
        ->name('price-list.delete-few');
    Route::resource('/price-list', PriceListController::class)
        ->middleware('can:Просмотр всех прайс-листов');

//    Объекты прайс листа
    Route::get('/price-list/work/{id}', [PriceListWorkController::class, 'show'])
        ->name('work.show');
    Route::post('/price-list/work/{id}', [PriceListWorkController::class, 'store'])
        ->name('work.store');
    Route::delete('/price-list/work/delete-few/{id}', [PriceListWorkController::class, 'deleteFew'])
        ->name('work.delete-few');

    Route::get('/price-list/material/{id}', [PriceListMaterialController::class, 'show'])
        ->name('material.show');
    Route::post('/price-list/material/{id}', [PriceListMaterialController::class, 'store'])
        ->name('material.store');
    Route::delete('/price-list/material/delete-few/{id}', [PriceListMaterialController::class, 'deleteFew'])
        ->name('material.delete-few');

//    Аккаунт
    Route::resource('/account', AccountController::class);

//    Сотрудники
    Route::resource('/employees', EmployeeController::class);

//    Клиенты
    Route::resource('/clients', ClientController::class);
    Route::resource('/contact-person', ContactPersonController::class);

});


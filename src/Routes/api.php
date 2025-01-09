<?php

use Illuminate\Support\Facades\Route;
use iamraghavan\CountryStateCity\Http\Controllers\ApiController;

use iamraghavan\CountryStateCity\Http\Controllers\CountryStateCityController;

Route::get('/location-select', [CountryStateCityController::class, 'index'])->name('location.select');
Route::post('/location-select', [CountryStateCityController::class, 'index'])->name('location.select.submit');


Route::prefix('api/v1')->group(function () {
    Route::get('countries', [ApiController::class, 'countries']);
    Route::get('states/{country_id}', [ApiController::class, 'states']);
    Route::get('cities/{state_id}', [ApiController::class, 'cities']);
});

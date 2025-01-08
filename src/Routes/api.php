<?php

use Illuminate\Support\Facades\Route;
use iamraghavan\CountryStateCity\Http\Controllers\ApiController;

Route::prefix('api/v1')->group(function () {
    Route::get('countries', [ApiController::class, 'countries']);
    Route::get('states/{country_id}', [ApiController::class, 'states']);
    Route::get('cities/{state_id}', [ApiController::class, 'cities']);
});

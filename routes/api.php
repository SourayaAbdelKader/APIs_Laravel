<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\functions;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get("/decomposing_number/{number}", [functions::class, 'decomposingNumber']);
Route::get("/binary/{string}", [functions::class, 'integerToBinary']);
Route::get("/calculate_prefix_notations/{expression}", [functions::class, 'calculatePrefixNotations']);
Route::get("/sorting_string/{string}", [functions::class, 'sortingString']);

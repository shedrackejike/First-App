<?php

use App\Http\Controllers\listingController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

// Common Resoure Routes
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  

//All listing
Route::get('/', [listingController::class, 'index']);




// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->name('createJob');



// Store Listing Data
Route::post('/listings', [ListingController::class, 'store']);


//single Listing 
Route::get('/listings/{listing}', [listingController::class, 'show']); 
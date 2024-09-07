<?php

use App\Models\Listing;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\listingController;

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


//show Edit form 
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);


// Store Listing Data
Route::post('/listings', [ListingController::class, 'store']);

// Update Listing
Route::put('/listings/{{listing }}', [ListingController::class, 'update']);

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);



//single Listing 
Route::get('/listings/{listing}', [listingController::class, 'show']); 


// Show Register/Create Form
Route::get('/register', [UserController::class, 'create']);


// Create New User
Route::post('/users', [UserController::class, 'store']);
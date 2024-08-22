<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class listingController extends Controller
{
    // show all listings

    public function index() {
        return view('listings', [
            'heading' => 'Latest Listings',
            'listings' => Listing::all()
        ]);  
    }
    //show single listing
    public function show(Listing $listing) {
        return view('listing', [
            'listing' => $listing
        ]); 
    }
}

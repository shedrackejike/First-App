<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class listingController extends Controller
{
    // show all listings

    public function index() {
        // dd($request); 
        return view('listings.index', [
            'heading' => 'Latest Listings',
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(2)
        ]);  
    }
    //show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]); 
    }

    // show create form

    public function create(){
        return view('listings.create'); 
    }

    //store Listing Data
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required' 
        ]); 

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos ', 'public');
        }

        Listing::create($formFields); 

        return redirect('/')->with('message', 'Listing created succssfully!');
    }

    //Show Edit form
    public function edit(Listing $listing){
        return view('listings.edit',['listing' => $listing]);
    }




      //update Listing Data
      public function update(Request $request, Listing $listing ){
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', ],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required' 
        ]);  

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos ', 'public');
        }

        $listing->update ($formFields); 

        return redirect('/')->with('message', 'Listing updated succssfully!');
        
    }

        //Delete listing 
        public function destroy(Listing $listing){
            $listing->delete();
            return redirect('/')->with('message', 'Listing deleted succssfull!');
        }

}

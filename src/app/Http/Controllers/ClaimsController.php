<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaimsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard')->with(['claims' => Auth::user()->claims()->where('user_id', Auth::user()->id)->get()]);
    }

    /**
    * Show the form for editing a claim
    * @return \Illuminate\Http\Response
    */
    public function claimForm($id = null) {
        // If no ID provided, create a new claim
        if ($id === null) {
            $claim = new \App\Claim();
            $claim->user_id = Auth::user()->id;
            $claim->save();
        }
        // Otherwise, get the claim from the database
        else {
            $claim = \App\Claim::findOrFail($id);
        }
        // Show the form
        return view('claims.edit')->with('claim', $claim);
    }

    /**
    * Save the claim details in the database
    * @return redirect
    */
    public function save(Request $request) {
        // Check the inputs are valid
        $this->validate($request, [
            'id' => 'required|integer|exists:claims,id',
            'company' => 'nullable|min:3',
            'address1' => 'nullable|min:3'
        ]);
        // Get the claim
        $claim = \App\Claim::findOrFail($request->get('id'));
        // Update it
        $claim->company = $request->get('company');
        $claim->address1 = $request->get('address1');
        $claim->address2 = $request->get('address2');
        $claim->city = $request->get('city');
        $claim->county = $request->get('county');
        $claim->postcode = $request->get('postcode');
        $claim->country = $request->get('country');
        $claim->phone = $request->get('phone');
        $claim->part_number = $request->get('part_number');
        $claim->part_quantity = $request->get('part_quantity');
        $claim->reward_preference =$request->get('reward_preference');
        $claim->save();
        // Redirect back to the form
        return redirect(action('ClaimsController@claimForm', ['id' => $request->get('id')]));
    }
}

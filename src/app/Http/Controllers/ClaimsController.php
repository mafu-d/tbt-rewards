<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubmissionConfirmation;

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
            'address1' => 'nullable|min:3',
            'address2' => 'nullable|min:3',
            'city' => 'nullable|min:2',
            'county' => 'nullable|min:3',
            'postcode' => 'nullable|min:5|max:8',
            'country' => 'nullable|in:UK,IE',
            'phone' => 'nullable|regex:/[0-9 \+\(\)]+/|min:10',
            'part_number' => 'nullable|integer',
            'part_quantity' => 'nullable|integer|min:10',
            'reward_preference' => 'nullable|in:1,2,3'
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
        // Check submission validity
        if ($claim->company && $claim->address1 && $claim->city && $claim->county && $claim->country && $claim->phone && $claim->part_number && $claim->part_quantity && $claim->reward_preference) {
            $claim->status = 1;
        }
        else {
            $claim->status = 0;
        }
        $claim->save();
        // Redirect back to the form
        return redirect(action('ClaimsController@claimForm', ['id' => $request->get('id')]));
    }

    /**
    * Submit the claim for processing
    **/
    public function submit(Request $request) {
        // Validate inputs
        $this->validate($request, [
            'id' => 'required|exists:claims,id'
        ]);
        // Check the claim is actually ready for submission
        $claim = \App\Claim::findOrFail($request->get('id'));
        if ($claim->status !== 1) {
            return back()->withErrors(['msg' => 'Claim not ready for processing']);
        }
        // Send confirmation email to the user
        Mail::to($claim->user->email)->send(new SubmissionConfirmation($claim));
        // Update the status
        $claim->status = 2;
        $claim->save();
        // Go back to the dashboard
        $request->session()->flash('status', 'Claim submitted successfully!');
        return redirect(action('ClaimsController@index'));
    }
}

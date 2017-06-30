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

    public function claimForm($id = null) {
        if ($id === null) {
            $claim = new \App\Claim();
            $claim->user_id = Auth::user()->id;
            $claim->save();
        }
        else {
            $claim = \App\Claim::findOrFail($id);
        }
        return view('claims.edit')->with('claim', $claim);
    }

    public function save(Request $request) {
        $this->validate($request, [
            'id' => 'required|integer|exists:claims,id',
            'company' => 'nullable|min:3',
            'address1' => 'nullable|min:3'
        ]);
        $claim = \App\Claim::findOrFail($request->get('id'));
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
        return redirect(action('ClaimsController@claimForm', ['id' => $request->get('id')]));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Attachment;
use App\Claim;

class AdminController extends Controller
{
    /**
    * Create controller instance
    **/
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
    * Allow an administrator to view the details of a claim
    **/
    public function view($id) {
        // Find claim
        $claim = Claim::findOrFail($id);
        // Show it
        return view('claims.view')->with('claim', $claim);
    }

    /**
    * Download a single attachment
    **/
    public function downloadSingle($id) {
        // Find upload
        $attachment = Attachment::findOrFail($id);
        // Return it as a download
        return response()->download(storage_path('app/') . $attachment->filename);
    }

    /**
    * Download all claims as CSV file
    **/
    public function downloadClaims() {
        // Get all claims
        $claims = Claim::all();
        // Export as CSV download
        $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());
        $csv->insertOne([
            'Claim ID',
            'Name', 'Email address',
            'Company',
            'Address line 1', 'Address line 2', 'City', 'County', 'Postcode', 'Country',
            'Phone',
            'Part number', 'Part quantity', 'Reward preference',
            'Attachments',
            'Status'
        ]);
        foreach ($claims as $claim) {
            $csv->insertOne([
                $claim->id,
                $claim->user->name, $claim->user->email,
                $claim->company,
                $claim->address1, $claim->address2, $claim->city, $claim->county, $claim->postcode, $claim->country,
                $claim->phone,
                $claim->part_number, $claim->part_quantity, $claim->reward_preference,
                action('AdminController@downloadAttachments', ['id' => $claim->id]),
                $claim->status()
            ]);
        }
        $csv->output('claims.csv');
    }

    /**
    * Zip and download all attachments for the specified claim
    **/
    public function downloadAttachments($id) {
        // Find claim
        $claim = Claim::findOrFail($id);
        // Create zip file
        $zip = new \Chumper\Zipper\Zipper;
        $zip->make('storage/app/zips/' . $id . '.zip');
        foreach ($claim->attachments as $attachment) {
            $zip->add(storage_path('app/') . $attachment->filename);
        }
        $zip->close();
        // Download it
        return response()->download('storage/app/zips/' . $id . '.zip');
    }
}

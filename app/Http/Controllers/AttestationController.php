<?php

namespace App\Http\Controllers;

use App\Models\Attestation;
use Illuminate\Http\Request;

class AttestationController extends Controller
{
    public function all_attestation(){
        $attestations = Attestation::orderBy('created_at', 'DESC')->get();
        return view('admin.attestation.attestationGeneree', compact('attestations'));
    }
    public function download_attestation(){

    }   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function index()
    {
        return view('layouts.claim.loan_apply');
    }
}

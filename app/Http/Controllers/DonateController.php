<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function index()
    {
        // TODO(robert): The donate buttons from paypal
        // need to be fixed to include the /cancel and 
        // /thankyou redirects
        return view('donate.index');
    }
}

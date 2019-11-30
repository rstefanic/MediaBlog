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

    public function thankyou()
    {
      $requestFrom = request()->headers->get('referer');

      if (isset($requestFrom)) {
        $host = parse_url($requestFrom)["host"];

        if ($host === "paypal.com") {
          return view('donate.thankyou');
        }
      }

      return abort(404);
    }

    public function cancel()
    {
      $requestFrom = request()->headers->get('referer');

      if (isset($requestFrom)) {
        $host = parse_url($requestFrom)["host"];

        if ($host === "paypal.com") {
          return view('donate.cancel');
        }
      }

      return abort(404);
    }
}

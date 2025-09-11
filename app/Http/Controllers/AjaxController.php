<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pincode;

class AjaxController extends Controller
{
    public function pincode(Request $request)
    {
        if(!empty($request->pincode)){
            $pin = Pincode::where('pincode', $request->pincode)->first();
            return response()->json($pin);
        }else{
            return response()->json([]);
        }
    }
}

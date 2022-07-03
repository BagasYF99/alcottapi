<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Auth;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return response()->json([
            "message" => "Logout Successfully"
        ]);
    }
}

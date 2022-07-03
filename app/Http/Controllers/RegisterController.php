<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterRequest $request)
    {
        // $validated = request()->validate([
            
        // ]);
        // dd($request['password']);
        $request['password'] = Hash::make($request['password']);
        // dd($request->all());
        $newData = User::create($request->all());
        return response()->json([
            'message' => 'Success',
            'data' => $newData
        ]);
    }
}

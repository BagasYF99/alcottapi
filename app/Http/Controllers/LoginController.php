<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/login');
    }

    public function authenticate(Request $request)
    {
        // dd($request->all());
        $credentials = request()->validate([
            'username' => ['required', 'min:6', 'max:255'],
            'password' => ['required', 'min:6'],
        ]);
        // dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->with('error', 'error, make sure username and password is correct');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }

    public function loginApiPostman(Request $request)
    {
        $credentials = request()->validate([
            'username' => ['required', 'min:6', 'max:255'],
            'password' => ['required', 'min:6'],
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Your credential is wrong'],401);
        }
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        return response()->json([
            "message" => "Success",
            "data" => $user,
            "meta" => [
                "access_token" => $token,
                "token_type" => "Bearer"
            ]
        ]);
    }
    
    public function loginApi(Request $request)
    {
        $credentials = request()->validate([
            'username' => ['required', 'min:6', 'max:255'],
            'password' => ['required', 'min:6'],
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Your credential is wrong'],401);
        }
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        return response()->json([
            "message" => "Success",
            "data" => $user,
            "meta" => [
                "access_token" => $token,
                "token_type" => "Bearer"
            ]
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

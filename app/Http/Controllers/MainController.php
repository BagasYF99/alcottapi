<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Country;
use App\Models\Province;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Spatie\Fractal\Fractal;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;


class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function register(Request $request)
    {
        $newData = request()->validate([
            'name' => ['min:3', 'max:25', 'unique:users,name', 'required'],
            'email' => ['min:3', 'max:25', 'unique:users,email', 'required'],
            'password' => ['min:6', 'max:25', 'required']
        ]);
        $newData['password']=Hash::make($newData['password']);
        // dd($newData);
        User::create($newData);
        // return fractal()
        //         ->collection($users)
        //         ->transformWith(new UserTransformer())
        //         ->toArray();
        return response()->json($newData);
    }

    public function index()
    {
        $provinces = Province::provinceFilter()->where('id', '>', 0)->get();
        if($provinces == null){
            $provinces = [];
        }
        // dd(request('search'));
        $indonesia = Country::where('name', '=', 'Indonesia')->first();
        $indonesianProvinces = Province::where('country_id', '=', $indonesia->id)->get();
            foreach($indonesianProvinces as $indonesianProvince){
                $manPopulation[] = $indonesianProvince->man_population;
                $womanPopulation[] = $indonesianProvince->woman_population;
            }
        $manPopulationSum = collect($manPopulation)->sum();
        if(!$manPopulationSum){
            $manPopulationSum=0;
        }
        $womanPopulationSum = collect($womanPopulation)->sum();
        if(!$womanPopulationSum){
            $womanPopulationSum=0;
        }
        $indonesianPopulation = $manPopulationSum+$womanPopulationSum;
        if(!$indonesianPopulation){
            $indonesianPopulation=0;
        }

        // dd($indonesianPopulation);
        // dd($provinces[0]->country->name);
        return view('welcome', compact('provinces', 'manPopulationSum', 'womanPopulationSum', 'indonesianPopulation'));
    }

    public function province(Request $request, Province $province)
    {
        // dd($request->search);
        $province = $province->provinceFilter()->where('id', '>', 0)->paginate(10)->withQueryString();;
        // dd($province['password']);
        return response()->json($province);
    }
    public function country(Request $request, country $country)
    {
        // dd($request->search);
        $country = $country->countryFilter()->where('id', '>', 0)->paginate(10)->withQueryString();;
        // dd($country['password']);
        return response()->json($country);
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

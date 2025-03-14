<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    //
    public function index(Request $request){
        $weatherResponse = [];
        if($request->isMethod('post')){
            $city = $request->city;
            $response = Http::withHeaders([
                "x-rapidapi-host" =>
                "open-weather13.p.rapidapi.com",
                "x-rapidapi-key" => "e45172948emsh6702fc0a7d4e64ep18bb20jsn54fd836b6213"
            ])->get("https://open-weather13.p.rapidapi.com/city/{$city}/EN");

            // echo "<pre>";
            $weatherResponse = $response->json();
        }
        return view('weather', 
        [
            'data' => $weatherResponse
        ]);
    }
}

<?php
namespace App\Http\Controllers\API;

use App\Http\Classes\CityWeatherManager;
use App\Models\CityWeather;
use Illuminate\Http\Request;

/**
 *
 * @author yois
 *        
 */
class CityWeatherController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //
    }

    /**
     *
     * @param Request $request            
     * @param string $city_name            
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCityWInfo(Request $request, $city_name)
    {
        $city = CityWeatherManager::getCityWInfo($city_name);
        // if have weather info
        if (isset($city->weather_info)) {
            $weather_info = json_decode($city->weather_info);
            $status = 200;
        } else {
            // not found
            $status = 404;
            $weather_info = $city;
        }
        return response()->json($weather_info, $status);
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
     * @param \Illuminate\Http\Request $request            
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CityWeather $cityWeather            
     * @return \Illuminate\Http\Response
     */
    public function show(CityWeather $cityWeather)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CityWeather $cityWeather            
     * @return \Illuminate\Http\Response
     */
    public function edit(CityWeather $cityWeather)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request            
     * @param \App\Models\CityWeather $cityWeather            
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CityWeather $cityWeather)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CityWeather $cityWeather            
     * @return \Illuminate\Http\Response
     */
    public function destroy(CityWeather $cityWeather)
    {
        //
    }
}

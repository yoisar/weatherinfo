<?php
namespace App\Http\Classes;

use App\Models\CityWeather;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Collection;

/**
 * Contains the logic for query the cities
 *
 * @author yois
 *        
 */
class CityWeatherManager
{

    /**
     */
    private const API_ACCESS_KEY = 'daf641d889633433dbb0b827bc7e63b8';

    /**
     * Returns weather information for a passed city
     *
     * @param unknown $city_name            
     * @return \App\Http\Controllers\unknown
     */
    static public function getCityWInfo($city_name)
    {
        /**
         *
         * @var Collection $city_data
         *
         */
        $city_data = CityWeather::where('city', '=', $city_name)->get();
        $count = $city_data->count();
        // if exists in DB
        if ($count > 0) {
            $city = $city_data[0];
            $is_in_same_hour = self::inSameHour($city->updated_at);
            // if not in the same hour
            if (! $is_in_same_hour) {
                // save and return weather information from the weather stack API
                $city = self::getAndSaveWatherInfo($city_name, $city);
            }
        } else {
            // if it does not exist in database, save and return from the weather stack API
            $city = self::getAndSaveWatherInfo($city_name);
        }
        return json_decode($city);
    }

    /**
     * Returns true if the last checked time is the same time as the current time
     *
     * @param string $last_checked            
     * @return number
     */
    private static function inSameHour($last_checked)
    {
        // last update datetime
        $last_date = new \DateTime($last_checked);
        $current_hour = date('H', time());
        $last_hour = $last_date->format('H');
        return $current_hour == $last_hour;
    }

    /**
     * Returns and save city weather inforamtion from weather stack API
     *
     * @param string $city_name            
     * @param \App\Models\CityWeather $city            
     * @return \App\Models\CityWeather
     */
    static private function getAndSaveWatherInfo($city_name, $city = null)
    {
        $contents = self::getWeatherStackInfo($city_name);
        //
        if (! isset($contents->error)) {
            $data = [
                'city' => $city_name,
                'weather_info' => json_encode($contents)
            ];
            // no city new data
            if (! $city) {
                $city = CityWeather::Create($data);
            } else {
                // update info
                $city['weather_info'] = $data['weather_info'];
            }
            // save data
            $city->save();
        } else {
            // convert to an object
            $city = json_encode($contents->error);
        }
        //
        return $city;
    }

    /**
     * Returns city weather inforamtion from weather stack API
     *
     * @param string $city_name            
     * @return string
     */
    private static function getWeatherStackInfo($city_name)
    {
        $key = self::API_ACCESS_KEY;
        $url = "http://api.weatherstack.com/current?access_key=$key&$city_name";
        $response = Http::accept('application/json')->get($url);
        return json_decode($response->getBody()->getContents());
    }
}
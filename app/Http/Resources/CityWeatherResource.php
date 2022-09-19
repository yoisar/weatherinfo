<?php
namespace App\Http\Resources;

use App\Http\Classes\CityWeatherManager;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 * @author yois
 *        
 */
class CityWeatherResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request            
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    /**
     *
     * @param unknown $city_name            
     * @return string
     */
    public function getCityWInfo($city_name)
    {
        return CityWeatherManager::getCityWInfo($city_name);
    }
}

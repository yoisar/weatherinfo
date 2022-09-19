<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @author yois
 *        
 */
class CityWeather extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'weather_info',
        'updated_at'
    ];
}

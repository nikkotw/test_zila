<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityWeather extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'temperature',
        'wind_speed',
        'wind_degree',
        'humidity',
        'cloudcover',
        'visibility'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherDetails extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'city_code', 'temp_in_degree', 'temp_in_far'];

}

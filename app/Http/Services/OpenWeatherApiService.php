<?php
namespace App\Http\Services;
use Illuminate\Support\Facades\Http;
use App\Models\WeatherDetails;
use App\Models\User;

class OpenWeatherApiService {
    
    /**
     * Description : will fetch temp values from api & insert it into db      
     */
    public static function processTempValues() {
       

       $insert_array = []; 
       
       #dd(config('app.app_cities_info'));
       echo "<pre>";
       foreach(config('app.app_cities_info') as $city=>$lat_long_details ){
           $url = config('app.map_api_url')."?appid=". config('app.map_api_key');
           $url .="&lat=".$lat_long_details['lat']."&lon=".$lat_long_details['long']."&units=metric";
           
           $response   = Http ::get($url);
           
            if($response->getBody()){
                $response = $response->json();
                
                $temp_in_degree = $response['current']['temp'];
                $temp_in_far = self::convertDegreeToFar($temp_in_degree);
                
                $insert_array[] = ['user_id'=>auth()->id(),
                                   'city_code'=> strtoupper(substr($city, 0, 1)),
                                   'temp_in_degree'=>$temp_in_degree,
                                    'temp_in_far'=>$temp_in_far,
                                    'created_at'=>date('Y-m-d H:i:s'),
                                    'updated_at'=>date('Y-m-d H:i:s'),
                                    ];
           }
       }
       
       if( !empty($insert_array) ){
           WeatherDetails::insert($insert_array);           
       }
       

    }
    
    public static function convertDegreeToFar($temp_in_degree) {
        return (int)(1.8*$temp_in_degree+32);
    }
}

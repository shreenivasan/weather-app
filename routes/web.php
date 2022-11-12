<?php

use Illuminate\Support\Facades\Route;
use App\Models\WeatherDetails;
use App\Models\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function (Request $request) {
    $user_id = auth()->user()->id;
    $temp_data = WeatherDetails::where('user_id',$user_id);
    $order = $request->input('order');
    if( !empty($order) ){
        $temp_data = $temp_data->orderBy('temp_in_degree');
    }
    else{
        $temp_data = $temp_data->orderBy('created_at');        
    }
    
    $temp_data = $temp_data->get()->toArray();
    
    $display_data = [];
    foreach( $temp_data as $value ){
        $display_data[$value['city_code']][] = $value;
    }
   
    
    return view('dashboard',compact('display_data'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

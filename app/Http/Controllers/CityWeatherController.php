<?php

namespace App\Http\Controllers;

use App\Models\CityWeather;
use App\Services\WheaterStackService;

use Illuminate\Http\Request;

class CityWeatherController extends Controller
{
    //

    public function search(Request $request)
    {

        $city = $request->query('query');
        $data = CityWeather::where('name', $city)->first();
        if ($data) {
            
            $now = new \DateTime();//fecha de cierre
            $cityDate = new \DateTime($data->updated_at);//fecha inicial
            $intervalo = $cityDate->diff($now);

            
            
               if($intervalo->h > 0){
                $saveData = $this->getDataCity($city);
                
                $city = CityWeather::find($data->id)->update($saveData);
                return response()->json([
                    'city' => $saveData,
                ], 200);
                }else{
                    return response()->json([
                        'city' => $data,
                    ], 200);
                }
           
        } else {
           

            $newCity = new CityWeather();
            $saveData = $this->getDataCity($city);
            $newCity->create($saveData);
            return response()->json([
                'city' => $saveData,
            ], 200);
        }
    }

    public function getDataCity($city){
        $wheatherStack = new WheaterStackService();
        $dataCity = $wheatherStack->getCity($city);
        $saveData = $dataCity['current'];
        $saveData['name'] = $dataCity['location']['name'];

        return $saveData;
    }
}

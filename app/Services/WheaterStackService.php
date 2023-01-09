<?php


namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Http;

class WheaterStackService{
    private $apiKey;
    private $url = '';
    public function __construct()
    {
        $this->apiKey = env('API_KEY_WHEATERSTACK');    
        $this->url = "http://api.weatherstack.com/current?access_key=".$this->apiKey."&query=";
    }

    public function getCity($city){
        $response =  Http::get($this->url.$city);
        return $response->json();
    }
}

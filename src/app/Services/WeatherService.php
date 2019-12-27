<?php


namespace App\Services;


class WeatherService
{
    public function getCityWeather(string $city)
    {
//        $url = config('config.weather.url');
//        $url = sprintf($url, $city, config('config.weather.app_id'));
        $url = 'api.openweathermap.org/data/2.5/weather?q=Kiev&APPID=59002ce7a0903ae2f59dbd6e6214c558';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $json_result = json_decode($result, true);

        $weather = [
            'today' => date("j.m.Y"),
            'temp' => $json_result ['main'] ['temp'],
            'wind' => [
                'speed' => $json_result['wind'] ['speed'],
                'direction' => $json_result['wind'] ['deg']
            ]
        ];



    }

}

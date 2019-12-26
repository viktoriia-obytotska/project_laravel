<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:weather {city} {--queue=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Receiving current weather';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $city = $this->argument('city');
//        $url = config('config.weather.url');
//        $url = sprintf($url, $city, config('config.weather.app_id'));
        $url = 'api.openweathermap.org/data/2.5/weather?q=$city&APPID=59002ce7a0903ae2f59dbd6e6214c558';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $json_result = json_decode($result);
        $cityname = $json_result->name;
        $today = date("j.m.Y");
        $temp = TempHelper::convertKelvinToCelcius($json_result->main->temp);
        $wind_speed = $json_result->wind->speed;
        $wind_direction = $json_result->wind->deg;

        echo "Прогноз погоды на $today" .PHP_EOL;
        echo "В городе $cityname температура $temp";


    }
}

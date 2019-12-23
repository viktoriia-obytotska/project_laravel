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
    protected $signature = 'get:weather {city}';

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

        $curl = curl_init("api.openweathermap.org/data/2.5/weather?q=$city&APPID=59002ce7a0903ae2f59dbd6e6214c558");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $json_result = json_decode($result);
        $cityname = $json_result->name;
        $today = date("j.m.Y");
        $temp = $json_result->main->temp."°C";

        echo "Прогноз погоды на $today" .PHP_EOL;
        echo "В городе $cityname температура $temp";


    }
}

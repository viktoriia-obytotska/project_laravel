<?php

namespace App\Console\Commands;

use App\Restaurant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GetParserRestaurants extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser:restaurants';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Getting restaurant names and logos';

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
        $content = file_get_contents('https://misteram.com.ua/chernigov');

        $items = explode('<div class="name">', $content);
        unset($items[0]);
        foreach ($items as $item) {
            $info = explode('solid">', $item)[1];
            $name = explode('</', $info)[0];

                $image = explode('<img src="', $item)[1];
                $img_url = explode('" alt=', $image)[0];
                $img_info = explode('/', $img_url);
                $img_name = $img_info[count($img_info) - 1];
                $picture = file_put_contents('storage/app/public/uploads/' . $img_name,
                    file_get_contents($img_url));

//                    $path = Storage::disk('public')->path('uploads/'.$img_name);
                    $path = 'uploads/'.$img_name;

                    $bd = new Restaurant();
                    $bd->name = $name;
                    $bd->image = $path;
                    $bd->save();
            }


        }

}

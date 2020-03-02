<?php

namespace App\Console\Commands;

use App\Dish;
use Illuminate\Console\Command;
use phpDocumentor\Reflection\File;

class GetParserDishes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser:dishes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $content = file_get_contents('https://misteram.com.ua/chernigov/pasta-basta-ploscha');
        $values = explode('<div class="card-tiny"', $content)[1];
        $items = trim(explode('base_category_id=&quot;&quot;;', $values)[1]);
        $info = trim(explode('items=', $items)[1]);
        $bloc = trim(explode(';
     categories=', $info)[0]);

        $decode = html_entity_decode($bloc);
        $json = json_decode($decode, true);

        foreach ($json as $item)
        {
            $name = $item['name'];
            $description = $item['description'];
            $price = $item['price'];
            $image = $item['image'];
            $img_url = 'https://assets.misteram.com.ua/misteram-public/'. $image.'-400x0.png';
            $img_info = explode('/', $img_url);
            $img_name = $img_info[count($img_info) - 1];
            $picture = file_put_contents('storage/app/public/uploads/' . $img_name,
                file_get_contents($img_url));

            $path = 'uploads/'.$img_name;

            $bd = new Dish();
            $bd->title = $name;
            $bd->image = $path;
            $bd->description = $description;
            $bd->price = $price;
            $bd->category_id = 6;
            $bd->restaurant_id = 1;
            $bd->save();
        }

    }
}

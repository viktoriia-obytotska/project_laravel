<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetParser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:parser';

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
        $content = file_get_contents('https://book24.ua/publishers/');
        $items = explode('<div class="vendors-section-item">', $content);
        unset($items[0]);

        foreach ($items as $item){
            $image = explode('<img src="', $item)[1];
            $img_url = explode('" width=', $image)[0];
            $img_info = explode('/', $img_url);
            $img_name = $img_info[count($img_info) - 1];
            file_put_contents('public/images/'. $img_name,
                @file_get_contents('https://book24.ua/publishers'. $img_url));

        }
    }
}

<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class DeleteExpiredToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:tokens';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired tokens';

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
        $token = User::select('token')->get();
        $time = 3600;
        foreach ($token as $item)
        {
            $data = strtotime($item->created_at)+$time;
            if($data < time())
            {
                User::find($item->token)->delete();
            }
        }
        $this->info('Token deleted');
    }
}

<?php

namespace App\Console\Commands;
use App\Models\Campaign as exp;
use Illuminate\Console\Command;


class Campaign extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'campaign:expire';

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
     * @return int
     */
    public function handle()
    {
        $users = exp::where([['is_flash', 1], ['end', '<', date('Y-m-d h-m-s')]])->get();
        foreach ($users as $user) {
            $user->is_flash = 0;
            $user->end=Null;
            $user->save();
        }

      
    }
}

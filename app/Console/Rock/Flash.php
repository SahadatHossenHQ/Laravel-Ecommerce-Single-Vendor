<?php

namespace App\Console\Commands;

use App\Models\Chat;
use App\Models\Campaign;
use Illuminate\Console\Command;

class Flash extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Flash:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check user Flash expire date';

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
        $users = Campaign::where([['is_flash', 1], ['end', '<', date('Y-m-d h-m-s')]])->get();
        foreach ($users as $user) {
            $user->is_flash = 0;
            $user->end=Null;
            $user->save();
        }

      
    }
}

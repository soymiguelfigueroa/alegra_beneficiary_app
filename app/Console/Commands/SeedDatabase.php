<?php

namespace App\Console\Commands;

use App\Models\State;
use Illuminate\Console\Command;

class SeedDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed database with initial data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $state = new State();
        $state->name = 'Created';
        $state->save();
        $state = new State();
        $state->name = 'Processing';
        $state->save();
        $state = new State();
        $state->name = 'Delivered';
        $state->save();

        $this->info('The command was successful!');
    }
}

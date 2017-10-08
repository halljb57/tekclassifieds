<?php

namespace App\Console\Commands;

use App\Classified;
use Illuminate\Console\Command;

class DestroyClassifiedCommand extends Command
{
    public $id;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

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
    public function __construct($id)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        return Classified::where('id', $this->id)->delete();
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class ImportSQL extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:sql';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import SQL to database';

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
        try {
            DB::unprepared(file_get_contents('database/sql/countries.sql'));
            $this->info("Import Countries completed succesfully.");
        }catch(\Exception $e) {
            var_dump($e->getMessage());
        }
    }
}

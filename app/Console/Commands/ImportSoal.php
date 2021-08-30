<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SoalImport;

class ImportSQL extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:soal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Soal to database';

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
        Excel::import(new SoalImport, public_path('/file/Soal.xlsx'));
        $this->info("Import Soal completed succesfully.");
    }
}

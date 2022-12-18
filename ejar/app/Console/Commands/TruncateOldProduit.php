<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Produit;
use App\Models\User;
use Carbon\Carbon;
class TruncateOldProduit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Produit:truncate';

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
        Produit::where('DELETED', '=', "Yes")->each(function ($item) {

          $day = Carbon::parse(Carbon::now())->diffInDays($item->delete_date);
          if($day== 0){
            $item->delete();
          }
     });

        User::where('DELETED', '=', "Yes")->each(function ($item) {

          $day = Carbon::parse(Carbon::now())->diffInDays($item->delete_date);
          if($day== 0){
            $item->delete();
          }
     });
    }
}

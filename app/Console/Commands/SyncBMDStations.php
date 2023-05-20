<?php

namespace App\Console\Commands;

use App\Models\BmdStation;
use Illuminate\Console\Command;
use Saidy\BmdStationDataFetch\BmdDataFetch;

class SyncBMDStations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bmd:sync_stations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync BMD Stations information';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->sync_stations(true);
    }

    private function sync_stations($should_update = false)
    {
        $stations = BmdDataFetch::getStationList();
        foreach ($stations as $station) {
            $systemStation = BmdStation::where("code", $station["code"])->first();
            if (!$systemStation) {
                BmdStation::create($station);
                $this->info("Station created : {$station['code']}");
            } else {
                if ($should_update) {
                    if (isset($station["id"])) unset($station["id"]);
                    $systemStation->update($station);
                    $this->info("Station Updated : {$station['code']}");
                }
            }
        }
    }
}

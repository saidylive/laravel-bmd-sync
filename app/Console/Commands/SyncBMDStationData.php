<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Saidy\BmdStationDataFetch\BmdDataFetch;
use App\Models\BmdStation;
use App\Models\BmdStationDataRaw;

class SyncBMDStationData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bmd:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync BMD Station Data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $this->sync_stations(true);
        $this->sync_stations_data();
    }

    private function sync_stations_data(){
        $stations = BmdStation::all();
        foreach ($stations as $station) {
            $this->sync_single_stations_data($station->code, true);
            $this->info("Station Synced : {$station->code}");
        }
    }


    private function sync_single_stations_data($station_code, $should_update = false)
    {
        $stationData = BmdDataFetch::getStationData($station_code);
        foreach ($stationData as $row) {
            $systemData = BmdStationDataRaw::find($row["id"]);
            if (!$systemData) {
                BmdStationDataRaw::create($row);
                $this->info("Station Record Inserted : {$row['id']}");
            } else {
                if ($should_update) {
                    if (isset($row["id"])) unset($row["id"]);
                    $systemData->update($row);
                    $this->info("Station Record Updated : {$systemData->id}");
                }
            }
        }
        // $this->info(json_encode($stationData, JSON_PRETTY_PRINT));
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

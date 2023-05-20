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
            try {
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
            } catch (\Exception $e) {
                $this->error($e->getMessage());
                $this->info(json_encode($row, JSON_PRETTY_PRINT));
            }
        }
    }

}

<?php

namespace App\Console\Commands;

use App\Models\MstShipPosition;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Console\Command;

class SyncShipPositions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:ship_positions';

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
        $filename = 'ship_positions.json';
        $path = storage_path() . "/${filename}";

        // Check if the import file exists
        if(file_exists($path)) {
            $shipPositions = json_decode(file_get_contents($path), true);

            try {
                $this->info('Synchronizing Ship Positions...');

                // Update or Create records
                foreach ($shipPositions as $key => $position){
                    MstShipPosition::updateOrCreate(
                        ['id' => $key + 1],
                        [
                        'mmsi' => $position['mmsi'],
                        'status' => $position['status'],
                        'station_id' => $position['stationId'],
                        'speed' => $position['speed'],
                        'longitude' => $position['lon'],
                        'latitude' => $position['lat'],
                        'location' => new Point($position['lat'], $position['lon']),
                        'course' => $position['course'],
                        'heading' => $position['heading'],
                        'rot' => (!empty($position['rot'])) ? $position['rot'] : null,
                        'timestamp' => date('Y-m-d H:i:s', $position['timestamp']),
                        'unix_timestamp' => $position['timestamp'],
                        ]
                    );
                }
            }catch (\Exception $error){
                $this->warn($error);
                die();
            }

            $this->info('Synchronization Successful!');

            return 0;
        }

        $this->warn('Import file missing!');

        return 0;
    }
}

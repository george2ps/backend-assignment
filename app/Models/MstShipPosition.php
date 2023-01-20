<?php

namespace App\Models;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstShipPosition extends Model
{
    use HasFactory, SpatialTrait;

    protected $table = 'mst_ship_positions';

    protected $fillable = [
        'mmsi',
        'status',
        'station_id',
        'speed',
        'longitude',
        'latitude',
        'location',
        'course',
        'heading',
        'rot',
        'timestamp',
        'unix_timestamp',
    ];

    protected $spatialFields = [
        'location',
    ];
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->json('get', 'http://127.0.0.1:8000/api/get/ship/positions')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'status',
                    'message',
                    'nextUrl',
                    'total',
                    'count',
                    'data' => [
                        '*' => [
                            'id',
                            'mmsi',
                            'status',
                            'station_id',
                            'speed',
                            'longitude',
                            'latitude',
                            'location' => [
                                'type',
                                'coordinates'
                            ],
                            'course',
                            'heading',
                            'rot',
                            'timestamp',
                            'unix_timestamp',
                            'created_at',
                            'updated_at'
                        ]
                    ]
                ]
            );
    }
}

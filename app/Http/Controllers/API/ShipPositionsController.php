<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiLogger;
use App\Http\Controllers\Controller;
use App\Models\MstShipPosition;
use Grimzy\LaravelMysqlSpatial\Types\LineString;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Grimzy\LaravelMysqlSpatial\Types\Polygon;
use Illuminate\Http\Request;

class ShipPositionsController extends Controller
{
    use ApiLogger;

    public function getShipPositions(Request $request)
    {

        $query = MstShipPosition::query();
        $totalRecords = $query->count();

        /** Where MMSI */
        if ($request->has('mmsi')) {
            $mmsiArray = explode(',',$request->get('mmsi'));
            $query = $query->whereIn('mmsi', $mmsiArray);
            $mmsi = $request->get('mmsi');
        }

        /** Where Timestamp */
        if ($request->has('timestamp')) {
            $timestamp = explode(',',$request->get('timestamp'));
            $query = $query->where('unix_timestamp','>=', $timestamp[0]);
            $query = $query->where('unix_timestamp','<=', $timestamp[1]);
            $timestamp = $request->get('timestamp');
        }

        /** Where Latitude and Longitude range */
        if ($request->has('latStart') && $request->has('latEnd') && $request->has('lonStart')&& $request->has('lonStart') && $request->has('lonEnd')) {

            $latStart = $request->get('latStart');
            $latEnd = $request->get('latEnd');
            $lonStart = $request->get('lonStart');
            $lonEnd = $request->get('lonEnd');

            $polygon = new Polygon([new LineString([
                new Point(floatval($latStart), floatval($lonStart)),
                new Point(floatval($latStart), floatval($lonEnd)),
                new Point(floatval($latEnd), floatval($lonEnd)),
                new Point(floatval($latEnd), floatval($lonStart)),
                new Point(floatval($latStart), floatval($lonStart))
            ])]);

            $query = $query->intersects("location", $polygon);
        }


        /** Set offset */
        if ($request->has('offset')) {
            $query = $query->offset($request->get('offset'));
            $offset = $request->get('offset');
        }

        /** Set limit */
        if ($request->has('limit')) {
            $query = $query->limit($request->get('limit'));
            $limit = $request->get('limit');
        }

        /** Update offset for next request */
        if(isset($offset) && isset($limit)) {
            $offset = $offset + $limit;
        }

        try {

            $query = $query->get();

            $response = config('api.responses.successful');
            $response['message'] = 'Successful';
            if (!$query->isEmpty()) {
                $response['nextUrl'] = route('api.getShipPositions') .
                    "?" .
                    (isset($offset) ? '&offset=' . $offset : '') .
                    (isset($limit) ? '&limit=' . $limit : '') .
                    (isset($mmsi) ? '&mmsi=' . $mmsi : '') .
                    (isset($timestamp) ? '&timestamp=' . $timestamp : '') .
                    (isset($lat) ? '&latStart=' . $latStart : '') .
                    (isset($latEnd) ? '&latEnd=' . $latEnd : '').
                    (isset($lonStart) ? '&lonStart=' . $lonStart : '') .
                    (isset($lonEnd) ? '&lonEnd=' . $lonEnd : '');
            }

            $response['total'] = $totalRecords;
            $response['count'] = $query->count();

            $response['data'] = $query->toArray();

            $jsonResponse =  response()->json($response);

            $this->log($request->getRequestUri(), 'SUCCESS');

            return $jsonResponse;

        }catch (\Exception $e){
            $response = config('api.responses.error');
            $response['error'] = json_encode($e);

            $this->log($request->getRequestUri(), 'ERROR', $request['error']);

            return response()->json($response);
        }
    }
}

<?php

namespace App\Helpers;

use App\Models\DevLog;

trait ApiLogger {

    public function log($request, $status, $message = ''){
        return DevLog::create([
            'request' => $request,
            'status' => $status,
            'message' => $message,
        ]);
    }

}

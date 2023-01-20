<?php

return [

    /*
     * Responses
     * Example: return response()->json(config('authenticator.responses.{responseName}'));
     */
    'responses' => [
        'bad' => [
            'status' => 400,
            'message' => 'Bad Request!',
        ],
        'forbidden' => [
            'status' => 403,
            'message' => 'The provided credentials are incorrect!'
        ],
        'successful' => [
            'status' => 200,
            'message' => 'Authenticated!'
        ],
        'unauthorized' => [
            'status' => 401,
            'message' => 'Unauthorized!'
        ],
        'error' => [
            'status' => 500,
            'message' => 'Server Error!'
        ]
    ]
];

<?php

return [
    'paths' => [
        'fetch-data-search',
        'api/*',
        'sanctum/csrf-cookie',
       '/*' 
    ],
    'allowed_methods' => ['GET', 'OPTIONS'],
    'allowed_origins' => [
        'http://127.0.0.1:8000',
        'http://localhost:8000', 
        'https://test2.fishseller.shop'
    ],
    'allowed_headers' => [
        'Accept',
        'Content-Type', 
        'X-Requested-With' 
    ],
    'max_age' => 86400, 
    'supports_credentials' => false
];
<?php

return [

    'default' => env('CACHE_STORE', 'file'),

    'stores' => [
        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
        ],
        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],
        'database' => [
            'driver' => 'database',
            'table' => env('CACHE_DATABASE_TABLE', 'cache'),
            'connection' => env('CACHE_DATABASE_CONNECTION', null),
            'lock_connection' => env('CACHE_LOCK_CONNECTION', null),
        ],
    ],

    'prefix' => env('CACHE_PREFIX', 'laravel_cache'),
];

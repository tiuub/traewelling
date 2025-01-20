<?php

return [
    'post_social'               => env('POST_SOCIAL', false),

    # Brouter
    'brouter'                   => env('BROUTER', true),
    'brouter_url'               => env('BROUTER_URL', 'https://brouter.de/'),
    'brouter_timeout'           => env('BROUTER_TIMEOUT', 10),

    # Polyline
    'polyline_storage_path'     => env('POLYLINE_STORAGE_PATH', 'polylines'),
    'polyline_storage_driver'   => env('POLYLINE_STORAGE_DRIVER', 'local'),
    'polyline_clear_after_copy' => env('POLYLINE_CLEAR_AFTER_COPY', false),

    # DB_REST
    'db_rest'                   => env('DB_REST', 'https://v5.db.transport.rest/'),
    'db_rest_timeout'           => env('DB_REST_TIMEOUT', 3),

    'data_provider'    => env('DATA_PROVIDER', 'bahn'),

    # Points
    'base_points'      => [
        'time_window' => [
            # time windows before and after a journey to get points
            'good_enough' => [
                'before' => (int) env('GOOD_ENOUGH_POINTS_MIN_BEFORE', 60),
                'after'  => (int) env('GOOD_ENOUGH_POINTS_MIN_AFTER', 60),
            ],
            'in_time'     => [
                'before' => (int) env('FULL_POINTS_MIN_BEFORE', 20),
                'after'  => (int) env('FULL_POINTS_MIN_AFTER', 10),
            ],
        ],
        'train'       => [
            'tram'            => env('BASE_POINTS_TRAIN_TRAM', 2),
            'bus'             => env('BASE_POINTS_TRAIN_BUS', 2),
            'subway'          => env('BASE_POINTS_TRAIN_SUBWAY', 2),
            'suburban'        => env('BASE_POINTS_TRAIN_SUBURBAN', 3),
            'ferry'           => env('BASE_POINTS_TRAIN_FERRY', 3),
            'regional'        => env('BASE_POINTS_TRAIN_REGIONAL', 6),
            'regionalExp'     => env('BASE_POINTS_TRAIN_REGIONALEXP', 8),
            'national'        => env('BASE_POINTS_TRAIN_NATIONAL', 8),
            'nationalExpress' => env('BASE_POINTS_TRAIN_NATIONALEXPRESS', 10),
        ]
    ],
    'refresh'          => [
        'max_trips_per_minute' => env('REFRESH_TRIPS_PER_MINUTE', 1)
    ],
    'cache'            => [
        'global-statistics-retention-seconds' => env('GLOBAL_STATISTICS_CACHE_RETENTION_SECONDS', 60 * 60),
        'leaderboard-retention-seconds'       => env('LEADERBOARD_CACHE_RETENTION_SECONDS', 5 * 60),
        'data_provider'                       => env('DATA_PROVIDER_CACHE', false),
    ],
    'year_in_review'   => [
        'alert'     => env('YEAR_IN_REVIEW_ALERT', false),
        'backend'   => env('YEAR_IN_REVIEW_BACKEND', false),
        'scheduler' => env('YEAR_IN_REVIEW_SCHEDULER', false),
    ],
    'webhooks_active'  => env('WEBHOOKS_ACTIVE', false),
    'webfinger_active' => env('WEBFINGER_ACTIVE', false),
];

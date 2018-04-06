$DATABASE_URL = parse_url(getenv("DATABASE_URL"));

return [

    // …

    'connections' => [

        // …

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => $DATABASE_URL["host"],
            'port' => $DATABASE_URL["port"],
            'database' => ltrim($DATABASE_URL["path"] ?? '', "/"),
            'username' => $DATABASE_URL["user"] ?? 'root',
            'password' => $DATABASE_URL["pass"] ?? '',
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'require',
        ],

        // …

    ],

    // …

];

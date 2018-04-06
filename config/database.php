$DATABASE_URL = parse_url(getenv("DATABASE_URL"));

return [

    'fetch' => PDO::FETCH_CLASS,

    'default' => env('DB_CONNECTION', 'psql'),

    'connections' => [

        'testing' => [
             'driver' => 'sqlite',
             'database' => ':memory:',

        'sqlite' => [
            'driver'   => 'sqlite',
            'database' => env('DB_DATABASE', base_path('database/database.sqlite')),
            'prefix'   => env('DB_PREFIX', ''),

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => $DATABASE_URL["host"],
            'port' => $DATABASE_URL["port"],
            'database' => ltrim($DATABASE_URL["forge"], "/"),
            'username' => $DATABASE_URL["user"],
            'password' => $DATABASE_URL["pass"],
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'require',
        ],
        
        'migrations' => 'migrations',

        'redis' => [
 
            'cluster' => env('REDIS_CLUSTER', false),

            'default' => [
                'host'     => env('REDIS_HOST', '127.0.0.1'),
                'port'     => env('REDIS_PORT', 6379),
                'database' => env('REDIS_DATABASE', 0),
                'password' => env('REDIS_PASSWORD', null),


    ],

];

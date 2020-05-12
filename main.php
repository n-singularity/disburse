<?php
putenv('DB_HOST=localhost');
putenv('DB_PORT=3306');
putenv('DB_NAME=testDb');
putenv('DB_USERNAME=root');
putenv('DB_PASSWORD=root');


require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/routes/api.php';


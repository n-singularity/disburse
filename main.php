<?php
putenv('DB_HOST=localhost:3306');
putenv('DB_NAME=testDb');
putenv('DB_USERNAME=root');
putenv('DB_PASSWORD=root');
putenv('NEXTAR_SECRET_KEY=HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41');


require_once __DIR__ . '/vendor/autoload.php';

header('Content-Type: application/json');
require_once __DIR__ . '/routes/api.php';


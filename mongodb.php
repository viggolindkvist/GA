<?php
require_once __DIR__ . '/vendor/autoload.php';

// connect to mongodb
// $m = new MongoClient("mongodb://localhost:27017");
$m = new MongoDB\Driver\Manager("mongodb://localhost:27017");
echo "Connection to database successfully";
print_r($m);


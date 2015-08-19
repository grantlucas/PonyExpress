<?php

require_once __DIR__ . '/../vendor/autoload.php';

// Get the Silex application
$app = require __DIR__ . '/../src/app.php';

// Run the app
$app->run();

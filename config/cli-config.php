<?php

/**
 * Doctrine CLI Configuration
 */
use Doctrine\DBAL\Tools\Console\ConsoleRunner;

// Include the Silex App
$app = require_once __DIR__ . '/../src/app.php';

return ConsoleRunner::createHelperSet($app['db']);

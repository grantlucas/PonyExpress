<?php

/**
 * Doctrine CLI Configuration
 */
use Doctrine\DBAL\Tools\Console\ConsoleRunner;

// Include the Silex App
$app = require_once __DIR__ . '/../src/app.php';

$helperSet = new Symfony\Component\Console\Helper\HelperSet(array(
  'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($app['db']),
  'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($app['orm.em']),
));

return $helperSet;

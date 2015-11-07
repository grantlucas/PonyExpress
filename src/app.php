<?php

namespace PonyExpress;

use Symfony\Component\HttpFoundation\Request;

require __DIR__ . '/../vendor/autoload.php';

// Create the Silex app
$app = new \Silex\Application();

// Environment
//FIXME: Default to dev for now
$env = getenv('APP_ENV') ?: 'dev';

// Register Doctrine DBAL
$app->register(new \Silex\Provider\DoctrineServiceProvider());

// Register Doctrine ORM
$app->register(new \Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider());

// Load Configurations
$app->register(new \Igorw\Silex\ConfigServiceProvider(__DIR__."/../config/$env.yml"));

//TODO: Middleware (http://silex.sensiolabs.org/doc/middlewares.html) to ensure all requests are properly signed

/****** Basic text messages ******/

// POST to create a new message
$app->post('/message', function(Request $request) use ($app) {

  //TODO: Put Doctrine storage on message for persisting to database

  // Validate that a message was provided
  if (empty($request->get('message'))) {
    $app->abort(400, "Message parameter is required and cannot be empty.");
  }

  // Create the message object
  $message = new Entity\Message($request->get('message'));

  // Build data to return
  $data = array(
    'message' => $app->escape($message->getData()),
    'id' => $message->getId(),
  );

  // Return JSON with 201 Created HTTP status
  //TODO: Return the resulting message object
  //TODO: Return a representation (http://fractal.thephpleague.com) Try fractal to abstract the output from the data storage
  //TODO: hal+json? just json?
  return $app->json($data, 201);
});

//TODO: GET a list of messages
//TODO: GET to retrieve a message by ID
//TODO: DELETE to delete a message. Return 204

// Return the final app
return $app;

<?php

use Symfony\Component\HttpFoundation\Request;

// Create the Silex app
$app = new Silex\Application();

// Environment
//FIXME: Default to dev for now
$env = getenv('APP_ENV') ?: 'dev';


// Register Doctrine DBAL
$app->register(new Silex\Provider\DoctrineServiceProvider());

//TODO: Set up Doctrine ORM
// https://github.com/dflydev/dflydev-doctrine-orm-service-provider <-- this is probably the one to use as it leverages the Silex Doctrine service provider
// https://github.com/palmasev/DoctrineORMServiceProvider

// Load Configurations
$app->register(new Igorw\Silex\ConfigServiceProvider(__DIR__."/../config/$env.yml"));


//TODO: Middleware (http://silex.sensiolabs.org/doc/middlewares.html) to ensure all requests are properly signed

/****** Basic text messages ******/

// POST to create a new message
$app->post('/message', function(Request $request) use ($app) {
  $message = $request->get('message');

  //TODO: Store the message and return the representation
  //TODO: Validate that a message was provided and throw 400 if not. Add to test case

  // Build data to return
  $data = array(
    'message' => $app->escape($message),
    'id' => 1,
  );

  // Return JSON with 201 Created HTTP status
  return $app->json($data, 201);
});

//TODO: GET a list of messages
//TODO: GET to retrieve a message by ID
//TODO: DELETE to delete a message. Return 204
//TODO: PUT to edit a message

// Return the final app
return $app;

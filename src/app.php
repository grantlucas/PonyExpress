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
  $message = $request->get('message');

  //TODO: DONT NEED DOCTRINE YET, JUST build, deal with, and return the message object. Don't care about storing and "Doctrine" yet

  //TODO: Create a message entity that's not necessarily Doctrine, do the ORM stuff after
  //TODO: return the message object
  //TODO: Put Doctrine storage on it
  //TODO: Message should have an ID after construction, don't use auto-increment ID. Use UUID isntead. Ben ramsey's lib. 128bit integer

  //TODO: Store the message
  //TODO: Validate that a message was provided and throw 400 if not. Add to test case


  // Create the message object
  $message = new Entity\Message($request->get('message'));

  // Build data to return
  $data = array(
    'message' => $app->escape($message->getData()),
    'id' => 1,
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

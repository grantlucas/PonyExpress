<?php

use Symfony\Component\HttpFoundation\Request;

// Create the Silex app
$app = new Silex\Application();

// Turn on debug mode
$app['debug'] = true;

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

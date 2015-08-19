<?php
namespace PonyExpress\Tests;

use Silex\WebTestCase;

/**
 * Test messages functionality
 */
class MessageTest extends WebTestCase
{
  public function createApplication()
  {
    $app = require __DIR__ . '/../src/app.php';
    $app['debug'] = true;
    unset($app['exception_handler']);

    return $app;
  }

  /**
   * Message creation
   */
  public function testMessageCreation()
  {
    $client = $this->createClient();
    $crawler = $client->request('POST', '/message', array(
      'message' => 'This is the test message.',
      ));

    $this->assertEquals(201, $client->getResponse()->getStatusCode());

    // Get the resulting JSON
    $json = json_decode($client->getResponse()->getContent());

    // Validate the returned JSON
    $this->assertEquals('This is the test message.', $json->message);
    $this->assertEquals(1, $json->id);
  }
}

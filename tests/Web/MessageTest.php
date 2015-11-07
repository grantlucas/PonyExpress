<?php
namespace PonyExpress\Tests\Web;

use Silex\WebTestCase;

/**
 * Test messages functionality
 */
class MessageTest extends WebTestCase
{
  private $client;

  public function setUp()
  {
    parent::setUp();

    $this->client = $this->createClient();
  }

  public function createApplication()
  {
    $app = require __DIR__ . '/../../src/app.php';
    $app['debug'] = true;
    unset($app['exception_handler']);

    return $app;
  }

  /**
   * Message creation
   */
  public function testMessageCreation()
  {
    $crawler = $this->client->request('POST', '/message', array(
      'message' => 'This is the test message.',
    ));

    $this->assertEquals(201, $this->client->getResponse()->getStatusCode());

    // Get the resulting JSON
    $json = json_decode($this->client->getResponse()->getContent());

    // Validate the returned JSON
    $this->assertEquals('This is the test message.', $json->message);
    $this->assertObjectHasAttribute('id', $json);
  }
}

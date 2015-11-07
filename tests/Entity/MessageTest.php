<?php

namespace PonyExpress\Tests\Entity;

use PonyExpress\Entity\Message;

class MessageTest extends \PHPUnit_Framework_TestCase
{
  /**
   * Test trying to create a message with an empty data string
   *
   * @expectedException Exception
   * @expectedExceptionMessage Message data can't be empty
   */
  public function testEmptyData()
  {
    new Message('');
  }

  public function testCreateMessage()
  {
    $message = new Message("This is the string");

    $this->assertInstanceOf('\PonyExpress\Entity\Message', $message);
    $this->assertObjectHasAttribute('id', $message);
    $this->assertNotEmpty($message->getId());
    $this->assertEquals('This is the string', $message->getData());
  }
}

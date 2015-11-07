<?php

namespace PonyExpress\Entity;

use Ramsey\Uuid\Uuid;

class Message
{
  private $id;
  private $data;

  /**
   * @param strine $data The message data
   *
   * @return Message An instance of this object
   */
  public function __construct($data)
  {
    // Ensure data is not empty
    if (empty($data)) {
      throw new \Exception("Message data can't be empty");
    }

    $this->data = $data;

    // Set the ID to a UUID
    $this->id = Uuid::uuid4()->toString();
  }

  /**
   * Get ID
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get Data
   */
  public function getData()
  {
    return $this->data;
  }
}

<?php
namespace VirtualPersistAPI\VirtualPersistBundle\Entity;

use VirtualPersistAPI\VirtualPersistBundle\Entity\User;

class UserEntityTest extends \PHPUnit_Framework_TestCase
{

  public function testCreate() {
    $this->assertNotNull(new User());
  }

}

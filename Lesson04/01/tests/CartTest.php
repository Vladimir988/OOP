<?php

use Lesson04\example01\cart\Cart;

class CartTest extends PHPUnit_Framework_TestCase
{
  public function testCreate()
  {
    $cart = new Cart();
    $this->assertEquals([], $cart->getItems());
  }

  public function testAdd()
  {
    $cart = new Cart();
    $cart->add(5, 3);
    $this->assertEquals([5 => 3], $cart->getItems());
  }

  public function testAddExists()
  {
    $cart = new Cart();
    $cart->add(5, 3);
    $cart->add(5, 4);
    $this->assertEquals([5 => 7], $cart->getItems());
  }

  public function testRemove()
  {
    $cart = new Cart();
    $cart->add(5, 3);
    $cart->remove(5);
    $this->assertEquals([], $cart->getItems());
  }

  public function testClear()
  {
    $cart = new Cart();
    $cart->add(5, 3);
    $cart->clear();
    $this->assertEquals([], $cart->getItems());
  }
}
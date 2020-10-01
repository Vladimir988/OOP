<?php

namespace Lesson03\example02\demo01;

abstract class Animal
{
  public $color;
  public $weight;

  public function sleep()
  {
    // ...
  }

  abstract public function voice();
}

class Dog extends Animal
{
  public function voice()
  {
    return 'gav-gav';
  }
}

class Cat extends Animal
{
  public function voice()
  {
    return 'may-may';
  }
}

class Tiger extends Animal
{
  public function voice()
  {
    return 'rour-rour';
  }

  public function eat(Animal $animal)
  {
    if( $animal instanceof Tiger ) {
      throw new \Exception( 'Я не ем тигрятину ...' );
    } else {
      return 'naym-naym';
    }
  }
}

$dog   = new Dog();
echo $dog->voice() . PHP_EOL;

$cat   = new Cat();
echo $cat->voice() . PHP_EOL;

$tiger = new Tiger();
echo $tiger->voice()       . PHP_EOL;
echo $tiger->eat( $cat )   . PHP_EOL;
echo $tiger->eat( $tiger ) . PHP_EOL;
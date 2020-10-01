<?php

namespace Lesson03\example01\demo01;

class Base
{
  public $name;
  public $email;

  public function __construct( $name, $email )
  {
    $this->name = $name;
    $this->email = $email;
  }

  public function first()
  {
    return 'first';
  }
}

class Sub extends Base
{
  public $date = '2020-01-12';
  public $status;

  public function __construct( $name, $email, $status )
  {
    parent::__construct( $name, $email );
    $this->status = $status;
  }
}

// $base = new Base( 'Vasya', 'ex@sdf.sd' );
// echo $base->first() . PHP_EOL;

// $sub = new Sub( 'Vasya', 'ex@sdf.sd', 'active' );
// echo $sub->first() . PHP_EOL;

/* ================================================================ */
abstract class abstractBase
{
  public function __construct()
  {
    return 'first';
  }

  abstract protected function first();
}

class abstractSub extends abstractBase
{
  public function first()
  {
    return 'abstractSub First Method';
  }
}

$abstractSub = new abstractSub();
echo $abstractSub->first() . PHP_EOL;
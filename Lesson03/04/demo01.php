<?php

namespace Lesson03\example04\demo01;

abstract class Measurable
{
  abstract public function getWidth();
  abstract public function getHeight();
}

class Measurer
{
  public function maxSize(Measurable $obj)
  {
    return max($obj->getWidth(), $obj->getHeight());
  }
}

class Table extends Measurable
{
  public function getWidth() { return 95; }
  public function getHeight() { return 16; }
  public function getPoligons() { return []; }
  public function getColor() { return 0xff0000; }
}

class Kettle extends Measurable
{
  public function move($x, $y) {}
  public function getWidth() { return 9; }
  public function getHeight() { return 4; }
  public function getPoligons() { return []; }
  public function getColor() { return 0xff0000; }
}

$measurer = new Measurer();

$table = new Table();

echo $measurer->maxSize( $table ) . PHP_EOL;
<?php

namespace Lesson03\example04\demo02;

interface Measurable
{
  /* Свойства в интерфейсах объявлять нельзя */
  /* Реализовывать логику объявленных методов нельзя, можно и нужно только объявить необходимые методы
     логику которых необходимо реализовать в классах, которые будут реализовать (implements) данный интерфейс */

  const ACTIVE = 1;

  public function getWidth();
  public function getHeight();
}

interface Colorized
{
  public function getColor();
}

interface Visible extends Colorized
{
  public function getpoligons();
}

class Measurer
{
  public function maxSize($obj)
  {
    return max($obj->getWidth(), $obj->getHeight());
  }
}

class Table implements Measurable
{
  public function getWidth() { return 95; }
  public function getHeight() { return 16; }
  public function getPoligons() { return []; }
  public function getColor() { return 0xff0000; }
}

class Kettle implements Measurable
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
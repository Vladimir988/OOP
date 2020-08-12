<?php

namespace lesson02\lesson02;
error_reporting(-1);

class Student
{
  public static $val; // переменная, которая висит у класса, а не у каждого нового созданного объекта, таким образом, если ее заменить, то в любой момент времени она будет у всех объектов одной и тойже, это единственная переменная, а не для каждого объекта/экземпляра класса.

  const TYPE_OCHN = 1;
  const TYPE_ZAOCHN = 2;

  private $attributes = array();
  private $name;
  private $type;

  public function __construct($name, $type)
  {
    $this->name = $name;
    $this->type = $type;
  }

  public static function createOchn($name)
  {
    return new self($name, self::TYPE_OCHN);
  }

  public static function createZaochn($name)
  {
    return new self($name, self::TYPE_ZAOCHN);
  }

  public function __get($name)
  {
    return $this->attributes[$name] ?? null;
  }

  public function __set($name, $value)
  {
    $this->attributes[$name] = $value;
  }

  public function __isset($name)
  {
    return isset($this->attributes[$name]);
  }

  public function __unset($name)
  {
    unset($this->attributes[$name]);
  }

  public function __call($name, $params)
  {
    return 'Call ' . $name . ' ' . print_r($params, true);
  }

  public function __toString()
  {
    return '<pre>' . print_r($this, true) . '</pre>';
  }

  public function __invoke($params)
  {
    return 'Invoke ' . print_r($params, true);
  }

  public function __destruct()
  {
    // ...
  }
}

$student  = new Student('Ivan Ivanov', Student::TYPE_OCHN);
$student2 = new Student('Ivan2 Ivanov2', Student::TYPE_ZAOCHN);
$student->attr1 = '001';
$student->attr2 = '002';
echo $student->attr1 . PHP_EOL;
echo $student->attr2 . PHP_EOL;
echo $student->move('sdsdfsdf', 123) . PHP_EOL;
echo (string)$student . PHP_EOL;
echo (string)$student2 . PHP_EOL;
echo $student(123) . PHP_EOL;

$studentOCHN   = Student::createOchn('Ivan Ochn');
$studentZAOCHN = Student::createZaochn('Ivan Zaochn');

echo '<pre>';
print_r($studentOCHN);
print_r($studentZAOCHN);
echo '</pre>';

/* ======================================================== */
$stdClass = new \stdClass();
$stdClass->attr1 = 'stdClass - 001';
$stdClass->attr2 = 'stdClass - 002';
/*echo '<pre>';
print_r($stdClass);
echo '</pre>';*/
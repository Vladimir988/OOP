<?php

namespace Lesson03\example02\demo02;

class Loader
{
  public function load( $url )
  {
    return file_get_contents( $url );
  }

  abstract public function voice();
}

class Parser
{
  public function getPage( $url )
  {
    $loader = new Loader();
    return $loader->load( $url );
  }
}

class Exchanger
{
  public function getRate( $currency )
  {
    $loader = new Loader();
    return $loader->load( '...?id=' . $currency );
  }
}

$parser = new Parser();
echo $parser->getPage('...') . PHP_EOL;

$exchanger = new Exchanger();
echo $exchanger->getRate('USD') . PHP_EOL;
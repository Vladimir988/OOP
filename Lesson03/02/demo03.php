<?php

namespace Lesson03\example02\demo03;

class Loader
{
  public function load( $url )
  {
    return file_get_contents( $url );
  }
}

class Parser
{
  private $loader;

  public function __construct(Loader $loader)
  {
    $this->loader = $loader;
  }

  public function getPage( $url )
  {
    return $this->loader->load( $url );
  }
}

class Exchanger
{
  private $loader;

  public function __construct(Loader $loader)
  {
    $this->loader = $loader;
  }

  public function getRate( $currency )
  {
    return $this->loader->load( '...?id=' . $currency );
  }
}

class devLoader extends Loader
{
  public function load( $url )
  {
    return '<!DOCTYPE html>
            <html>
              <head>
                <title></title>
              </head>
              <body>
                TEST DEV LOADER
              </body>
            </html>';
  }
}

define( 'DEV_ENVIRONMENT', true );
if( DEV_ENVIRONMENT ) {
  $loader = new devLoader();
} else {
  $loader = new Loader();
}

$parser = new Parser($loader);
echo $parser->getPage('...') . PHP_EOL;

$exchanger = new Exchanger($loader);
echo $exchanger->getRate('USD') . PHP_EOL;
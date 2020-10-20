<?php

namespace Lesson03\example02\demo04;

trait FilterTrait
{
  public $temp;

  protected function filter($content)
  {
    return strip_tags($content);
  }
}

trait UploadTrait
{
  public $temp;

  protected function upload($file)
  {
    return $file;
  }
}

/* =============================================================== */

class Post
{
  use FilterTrait, UploadTrait;

  public function beforeSafe($insert)
  {
    return $this->filter($insert);
  }

  public function someEcho($insert)
  {
    return $insert;
  }
}

$post = new Post();
$html = '<span>SOME TEXT</span> <br> !!! <br> <span>SOME TEXT</span>';
echo $post->beforeSafe( $html ) . PHP_EOL;
<?php


class TypeHinting 
{

  public function dumpArr(array $str)
  {
    var_dump($str); 
  }

}

$a = new TypeHinting();
$a->dumpArr(array("abcdefg"));



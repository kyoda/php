<?php


class TypeHinting 
{

  private $VERSION = 0.1;

  public function dumpArr(array $str)
  {
    var_dump($str); 
  }

  public function dumpObj(TypeHinting $obj)
  {
    var_dump($obj);
  }

}

$a = new TypeHinting();
$a->dumpArr(array("abcdefg"));
$a->dumpObj($a);



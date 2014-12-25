<?php

class Magical
{

  function showMagical()
  {

    echo __LINE__ ."\n";
    echo __FILE__ ."\n";
    echo __DIR__ ."\n";
    echo __FUNCTION__ ."\n";
    echo __CLASS__ ."\n";
    //echo __TRAIT__ ."\n";
    echo __METHOD__ ."\n";
    echo __NAMESPACE__ ."\n";

  }

}


$m = new Magical();
$m->showMagical();


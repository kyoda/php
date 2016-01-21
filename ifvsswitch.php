<?php

define('MAX', 1000000);

function ifcal()
{

  $st = microtime(true);
  $b = 0;

  for ($i = 0; $i < MAX; $i++) {

    $a = rand(1, 99);
    if ($a > 0 && $a < 10) {
      $b += $a;
    }  else {
      $b += 10;
    }

  }

  $en = microtime(true) - $st;
  printf("if_time: %f sec\n", $en);
  
  return $b;

}

function switchcal()
{

  $st = microtime(true);
  $b = 0;
  for ($i = 0; $i < MAX; $i++) {
    $a = rand(1, 99);
    switch (true) {
      case ($a > 0 && $a < 10):
        $b += $a;
        break;
      default:
        $b += 10;
        break;
    }
    $a = null;
  }

  $en = microtime(true) - $st;
  printf("switch_time: %f sec\n", $en);

  return $b;
}

printf("%d\n", ifcal());
printf("%d\n", switchcal());


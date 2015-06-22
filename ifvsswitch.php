<?php

define('MAX', 1000000);

function ifcal()
{

  $st = microtime(true);
  $b = 0;

  for ($i = 0; $i < MAX; $i++) {

    $a = rand(1, 9);
    if ($a == 1) {
      $b += 1;
    } elseif ( $a == 2) {
      $b += 2;
    } elseif ( $a == 3) {
      $b += 3;
    } elseif ( $a == 4) {
      $b += 4;
    } elseif ( $a == 5) {
      $b += 5;
    } elseif ( $a == 6) {
      $b += 6;
    } elseif ( $a == 7) {
      $b += 7;
    } elseif ( $a == 8) {
      $b += 8;
    } elseif ( $a == 9) {
      $b += 9;
    }

  }

  printf("if_time: %f sec\n", microtime(true) - $st);
  
  return $b;

}

function switchcal()
{

  $st = microtime(true);
  $b = 0;
  for ($i = 0; $i < MAX; $i++) {
    $a = rand(1, 9);
    switch ($a) {
      case 1:
        $b += 1;
        break;
      case 2:
        $b += 2;
        break;
      case 3:
        $b += 3;
        break;
      case 4:
        $b += 4;
        break;
      case 5:
        $b += 5;
        break;
      case 6:
        $b += 6;
        break;
      case 7:
        $b += 7;
        break;
      case 8:
        $b += 8;
        break;
      case 9:
        $b += 9;
        break;
    }
    $a = null;
  }

  printf("switch_time: %f sec\n", microtime(true) - $st);

  return $b;
}

switchcal();
ifcal();


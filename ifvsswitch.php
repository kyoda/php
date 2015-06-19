<?php

define('MAX', 1000000);

function ifcal()
{

  $st = microtime(true);

  for ($i = 0; $i < MAX; $i++) {

    $a = rand(1, 9);
    if ($a == 1) {
      $a++;
    } elseif ( $a == 2) {
      $a++;
    } elseif ( $a == 3) {
      $a++;
    } elseif ( $a == 4) {
      $a++;
    } elseif ( $a == 5) {
      $a++;
    } elseif ( $a == 6) {
      $a++;
    } elseif ( $a == 7) {
      $a++;
    } elseif ( $a == 8) {
      $a++;
    } elseif ( $a == 9) {
      $a++;
    }

  }

  printf("if_time: %f sec\n", microtime(true) - $st);

}

function switchcal()
{

  $st = microtime(true);

  for ($i = 0; $i < MAX; $i++) {
    $a = rand(1, 9);
    switch ($a) {
      case 1:
        $a++;
        break;
      case 2:
        $a++;
        break;
      case 3:
        $a++;
        break;
      case 4:
        $a++;
        break;
      case 5:
        $a++;
        break;
      case 6:
        $a++;
        break;
      case 7:
        $a++;
        break;
      case 8:
        $a++;
        break;
      case 9:
        $a++;
        break;
    }
    $a = null;
  }

  printf("switch_time: %f sec\n", microtime(true) - $st);

}

switchcal();
ifcal();


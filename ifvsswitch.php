<?php

define('MAX', 1000000);

function ifcal()
{

  $st = microtime(true);
  $b = 0;

  for ($i = 0; $i < MAX; $i++) {

    $a = rand(1, 9);
    if ($a == 1) {
      $b++;
    } elseif ( $a == 2) {
      $b++;
    } elseif ( $a == 3) {
      $b++;
    } elseif ( $a == 4) {
      $b++;
    } elseif ( $a == 5) {
      $b++;
    } elseif ( $a == 6) {
      $b++;
    } elseif ( $a == 7) {
      $b++;
    } elseif ( $a == 8) {
      $b++;
    } elseif ( $a == 9) {
      $b++;
    }

  }

  printf("if_time: %f sec\n", microtime(true) - $st);

}

function switchcal()
{

  $st = microtime(true);
  $b = 0;
  for ($i = 0; $i < MAX; $i++) {
    $a = rand(1, 9);
    switch ($a) {
      case 1:
        $b++;
        break;
      case 2:
        $b++;
        break;
      case 3:
        $b++;
        break;
      case 4:
        $b++;
        break;
      case 5:
        $b++;
        break;
      case 6:
        $b++;
        break;
      case 7:
        $b++;
        break;
      case 8:
        $b++;
        break;
      case 9:
        $b++;
        break;
    }
    $a = null;
  }

  printf("switch_time: %f sec\n", microtime(true) - $st);

}

switchcal();
ifcal();


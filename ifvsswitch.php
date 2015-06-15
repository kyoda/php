<?php

define('MAX', 10000000);

$st = microtime(true);

$a = 4;
for ($i = 0; $i < MAX; $i++) {
  if ($a === 1) {

  } elseif ( $a === 2) {

  } elseif ( $a === 3) {

  } elseif ( $a === 4) {

  }
}

printf("if_time: %f sec\n", microtime(true) - $st);


$st = null;
$st = microtime(true);

$a = 4;
for ($i = 0; $i < MAX; $i++) {
  switch ($a) {
  case 1:
    break;
  case 2:
    break;
  case 3:
    break;
  case 4:
    break;
  }
}

printf("switch_time: %f sec\n", microtime(true) - $st);



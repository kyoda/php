<?php

function cmp($a, $b)
{
  return strcmp($a['num'], $b['num']);
}

function rcmp($a, $b)
{
  return strcmp($a['id'], $b['id']);
}

$arr = array(array('id' => 0, 'num' => 5), array('id' => 1, 'num' => 8), array('id' => 3, 'num' => 4));

$st = microtime(true);
usort($arr, 'cmp');
var_dump($arr);
usort($arr, 'rcmp');
var_dump($arr);
printf("%f sec\n", microtime(true) - $st);


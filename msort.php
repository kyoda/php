<?php

define("MAX", 100000);

function cmp($a, $b)
{
  return strcmp($a['num'], $b['num']);
}

function rcmp($a, $b)
{
  return strcmp($a['name'], $b['name']);
}


//$arr = array(array('id' => 0, 'num' => 5), array('id' => 1, 'num' => 8), array('id' => 3, 'num' => 4));

$st = microtime(true);
for ($i = 0; $i < MAX; $i++) {
  $arr[] = array('name' => sprintf("%010d", $i), 'num' => mt_rand());
}
usort($arr, 'cmp');
usort($arr, 'rcmp');
//var_dump($arr);
printf("%f sec\n", microtime(true) - $st);


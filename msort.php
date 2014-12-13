<?php

function cmp($a, $b)
{
  return strcmp($a['num'], $b['num']);
}

$arr = array(array('id' => 0, 'num' => 5), array('id' => 1, 'num' => 8), array('id' => 3, 'num' => 4));

usort($arr, 'cmp');

var_dump($arr);


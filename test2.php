<?php


/*
$a = "あaいiうuえお";
print mb_detect_encoding($a)."\n";
var_dump(preg_split("//u", $a, -1, PREG_SPLIT_NO_EMPTY));
*/


$r = preg_replace('/(.*)(\/\/|#).*/', '\1', 'aiueo // # あいうえお');
print $r."\n";

$dir = ".";

include_once('locatefile.class.php');
$a = new LocateFile();

$list = $a->getFileList($dir);
//var_dump($list);


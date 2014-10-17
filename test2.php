<?php


/*
$a = "あaいiうuえお";
print mb_detect_encoding($a)."\n";
var_dump(preg_split("//u", $a, -1, PREG_SPLIT_NO_EMPTY));
*/


$r = preg_replace('/(\/\/|#).*/', '', 'aiueo #//#/// あいうえお //aaa');
print $r."\n";

$dir = ".";

include_once('locatefile.class.php');
$a = new LocateFile();

$list = $a->getFileList($dir);
//var_dump($list);


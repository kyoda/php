<?php


echo round(100*1.1) ."\n";
echo round(105*1.1) ."\n";

/*
$a = "あaいiうuえお";
print mb_detect_encoding($a)."\n";
var_dump(preg_split("//u", $a, -1, PREG_SPLIT_NO_EMPTY));
*/


print preg_replace('/(\/\/|#).*/', '', 'aiueo #//#/// あいうえお //aaa') ."\n";
//print preg_replace('/(\/\/|#).*/', '\1', 'aiueo #//#/// あいうえお //aaa') ."\n";

$dir = ".";

include_once('locatefile.class.php');
$a = new LocateFile();

$list = $a->getFileList($dir);
//var_dump($list);



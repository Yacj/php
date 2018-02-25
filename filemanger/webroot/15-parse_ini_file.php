<?php
header('content-type:text/html;charset=utf-8');
$filename='test.ini';
// $filename='php.ini';
// $info=parse_ini_file($filename);
// print_r($info);

// echo '<hr/>';
// $info=parse_ini_file($filename,true);
// print_r($info);
// echo '<hr/>';
$string=file_get_contents($filename);
//parse_ini_string($string):解析一个配置文件形式的字符串
$string=parse_ini_string($string);
print_r($string);
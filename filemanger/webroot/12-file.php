<?php
header('content-type:text/html;charset=utf-8');
$filename='4.txt';
$info=file($filename);
echo '<pre>';
print_r($info);

$info=file($filename,FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);//过滤空行
print_r($info);
echo '</pre>';
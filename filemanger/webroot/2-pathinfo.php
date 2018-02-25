<?php
header('content-type:text/html;charset=utf-8');
$filename='test.txt';
//fileinfo($filename):取得文件相关信息
$fileInfo=pathinfo($filename);
echo '<pre>';
print_r($fileInfo);
/*
 Array
(
    [dirname] => .
    [basename] => test.txt
    [extension] => txt
    [filename] => test
)
 */
$filename="http://localhost/fileFunc/2-pathinfo.php";
$fileInfo=pathinfo($filename);
/*
 Array
(
    [dirname] => http://localhost/fileFunc
    [basename] => 2-pathinfo.php
    [extension] => php
    [filename] => 2-pathinfo
)
 */
print_r($fileInfo);
echo '<br/>';
echo '文件扩展名为：'.$fileInfo['extension'].'<br/>';
echo '<hr/>';
echo pathinfo($filename,PATHINFO_DIRNAME).'<br/>';
echo pathinfo($filename,PATHINFO_BASENAME).'<br/>';
echo pathinfo($filename,PATHINFO_EXTENSION).'<br/>';
echo pathinfo($filename,PATHINFO_FILENAME).'<br/>';
echo '文件路径部分：'.dirname($filename).'<br/>';
echo '文件名部分：'.basename($filename).'<br/>';
echo '<br/>';
$filename="../test.php";
//realpath($filename):返回规范化的绝对路径
echo realpath($filename);











echo '</pre>';
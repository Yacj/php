<?php
header('content-type:text/html;charset=utf-8');
$filename='4.txt';
$handle=fopen($filename,'rb+');
//ftruncate($handle,$size):将文件截断到给定的长度
// ftruncate($handle, 5);
//feof($handle):判断文件指针是否到了文件末尾
// var_dump(feof($handle));exit;
while(!feof($handle)){
    //一个字符一个字符读取
//     echo fgetc($handle);
    //fgets($handle):一行一行读取
//     echo fgets($handle);
//fgetss($handle):一行一行读取，过滤内容中的HTML标记
    echo fgetss($handle);
    echo '<br/>';
}
fclose($handle);
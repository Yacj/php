<?php
header('content-type:text/html;charset=utf-8');
$filename='4.txt';
// $handle=fopen($filename,'rb+');//将文件指针指向文件头
//fwrite($handle,$string):向文件中写内容
// fwrite($handle,'1234');
// fputs($handle,'5678');
// $handle=fopen($filename,'wb');//写入的模式
// $handle=fopen($filename,'wb+');//读写的模式
$handle=fopen($filename,'ab');
// fwrite($handle,'this is a test');
fwrite($handle,'1234');
// rewind($handle);
// echo "文件内容为：".fread($handle,filesize($filename));
fclose($handle);
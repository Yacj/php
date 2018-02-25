<?php
header('content-type:text/html;charset=utf-8');
// file_put_contens($filename,$data):向文件中写入内容，如果文件不存在，则创建
//fopen()/fwrite()/fclose()
$filename='5.txt';
$data='maizi';
$data=array('a','b','c','d','test'=>'e');
file_put_contents($filename, $data);
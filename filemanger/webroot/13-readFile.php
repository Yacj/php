<?php
// header('content-type:text/html;charset=utf-8');
$filename='4.txt';
$filename="myPic.jpg";
//readfile($filename):输出文件中的内容
header('content-type:image/jpeg');
// readfile($filename);
$handle=fopen($filename,'rb');
fpassthru($handle);//输出当前指针之后剩余的所有数据
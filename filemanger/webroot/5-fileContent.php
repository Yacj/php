<?php
header('content-type:text/html;charset=utf-8');
$filename="2.txt";
//打开这个文件
//fopen($filename,$mode):打开文件
$handle=fopen($filename,'r');
// var_dump($handle);
//fread($handle,$size):读取文件内容
// echo fread($handle,filesize($filename));
echo fread($handle,6);
echo '<hr/>';
echo fread($handle,5);
echo '<hr/>';
echo fread($handle,2);
echo '<hr/>';
//ftell($handle):得到当前指针所在位置
echo '当前指针所在位置为：'.ftell($handle).'<br/>';
//rewind($handle):重置文件指针
rewind($handle);
echo '当前指针所在位置为：'.ftell($handle).'<br/>';
echo fread($handle,3).'<br/>';
echo '<hr/>';
fseek($handle, 12);
echo '当前指针所在位置为：'.ftell($handle).'<br/>';
fseek($handle,0);
echo '当前指针所在位置为：'.ftell($handle).'<br/>';
//fclose($handle):关闭文件句柄
fclose($handle);
/*
 Warning: fread(): 3 is not a valid stream resource in 
 G:\zendstudio13\PHPAdvance\fileFunc\5-fileContent.php on line 30
 */
// fread($handle,3);








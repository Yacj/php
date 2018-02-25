<?php
header('content-type:text/html;charset=utf-8');
$filename="4.txt";
//file_get_contents($filename):得到文件中的所有内容
/*
 * fopen()/fread()/fclose()
Warning: file_get_contents(): http:// wrapper is disabled in the server configuration by allow_url_fopen=0 
in G:\zendstudio13\PHPAdvance\fileFunc\10-file_get_contents.php on line 6
 */
// $filename="http://www.baidu.com";
// $str=file_get_contents($filename);
// echo $str;
$filename="http://www.maiziedu.com/uploads/avatar/2016/03/cacc4c50-ea68-11e5-a40c-00163e004db2_middle.jpg";
copy($filename,"myPic.jpg");
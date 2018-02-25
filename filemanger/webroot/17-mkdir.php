<?php
header('content-type:text/html;charset=utf-8');
$path='a';
/*
 Warning: mkdir(): File exists in 
 G:\zendstudio13\PHPAdvance\fileFunc\17-mkdir.php on line 4
 */
// @mkdir($path);
// if(!file_exists($path)){
//     mkdir($path);
// }
$path='b/c';
// if(!file_exists($path)){
//     mkdir($path);
// }
// mkdir($path,$mode,true):可以创建多级目录
// if(!file_exists($path)){
//     mkdir($path,755,true);
// }
$path='b';
/*
Warning: rmdir(b): Directory not empty in 
G:\zendstudio13\PHPAdvance\fileFunc\17-mkdir.php on line 21
 */
rmdir($path);//删除空目录















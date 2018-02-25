<?php
header('content-type:text/html;charset=utf-8');
$filename="test.txt";
echo "<h1>文件信息如下：</h1>";
//filesize($filename):得到文件大小
echo '文件大小为：'.filesize($filename).'<br/>';
//filectime($filename):得到文件创建时间，返回的是时间戳
echo '文件创建时间为：'.date("Y-m-d H:i:s",filectime($filename)).'<br/>';
//filemtime($filename):得到文件的修改时间
echo '文件的修改时间为：'.date("Y-m-d H:i:s",filemtime($filename)).'<br/>';
//fileatime($filename):得到文件最后访问的时间
echo '文件最后访问的时间为：'.date("Y-m-d H:i:s",fileatime($filename)).'<br/>';
// $filename="test";
//filetype($filename):得到文件类型
echo '文件类型：'.filetype($filename).'<br/>';
//is_readable($filename):检测文件是否可读
// var_dump(is_readable($filename));
echo is_readable($filename)?'可读':'不可读';
echo '<br/>';
//is_writable($filename):检测文件是否可写
echo is_writable($filename)?'可写':'不可写';
echo '<br/>';
//is_executable($filename):检测文件是否可执行
echo is_executable($filename)?"可执行":'不可执行';
echo '<br/>';
echo '文件所属组：'.filegroup($filename).'<br/>';
echo '文件的inode：'.fileinode($filename).'<br/>';
echo '文件的权限：'.fileperms($filename).'<br/>';
//is_file($filename):检测是否是文件，如果是文件并且存在，返回为true，否则返回false
$filename='1.txt';
$filename='test';
var_dump(is_file($filename));
echo '<hr/>';


























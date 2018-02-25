<?php
header('content-type:text/html;charset=utf-8');
$filename='test.csv';
$handle=fopen($filename,'rb+');
//读取文件中的一行作为CSV格式的解析
// $row=fgetcsv($handle);
// print_r($row);
// $str=fread($handle,filesize($filename));
// $arr=explode(',',$str);
// print_r($arr);
// while(($row=fgetcsv($handle))!==false){
//     print_r($row);
//     echo '<hr/>';
// }

while(($row=fgetcsv($handle,0,'-'))!==false){
    print_r($row);
    echo '<hr/>';
}









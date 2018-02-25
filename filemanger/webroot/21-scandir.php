<?php
header('content-type:text/html;charset=utf-8');
$path='test';
$path='1-file.php';
$info=@scandir($path);//列出指定路径中的文件和目录
// var_dump($info);
$info=glob('test/*.php');
$info=glob('test/*');
// print_r($info);
$arr=array();
foreach($info as $val){
    if(is_file($val)){
        $arr['file'][]=$val;
    }
    if(is_dir($val)){
        $arr['dir'][]=$val;
    }
}
print_r($arr);







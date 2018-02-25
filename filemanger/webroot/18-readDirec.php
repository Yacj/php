<?php
header('content-type:text/html;charset=utf-8');
//读取test目录下的所有内容
$path="test";
$handle=opendir($path);//打开指定目录
// var_dump($handle);
// $item=readdir($handle);
// echo $item.'<br/>';
// $item=readdir($handle);
// echo $item.'<br/>';

// $item=readdir($handle);读取目录中的内容
// echo $item.'<br/>';
while(($item=@readdir($handle))!==false){
    echo $item,'<br/>';
    echo filetype($path.'/'.$item).'<br/>';
    echo '<hr/>';
}
rewinddir($handle);//重置指针
echo '<hr color="red"/>';
while(($item=readdir($handle))!==false){
    //去掉.和..的情况
    if($item!='.'&&$item!='..'){
        echo $item,'<br/>';
    }
}
closedir($handle);//关闭目录句柄














<?php
header('content-type:text/html;charset=utf-8');
$filename="2.txt";
//touch($filename):创建文件
// if(touch($filename)){
//     echo '文件创建成功';
// }else{
//     echo '创建失败';
// }
//file_exists($filename):检测文件或者目录是否存在，如果存在返回true
//否则返回false
// if(!file_exists($filename)){
//     if(touch($filename)){
//         echo '成功';
//     }else{
//         echo '失败';
//     }
// }else{
//     echo '存在同名文件';
// }
//unlink($filename):删除文件
/*
Warning: unlink(2.txt): No such file or directory in 
G:\zendstudio13\PHPAdvance\fileFunc\3-fileControl.php on line 22
 */
// if(unlink($filename)){
//     echo '删除文件成功';
// }else{
//     echo '删除文件失败';
// }
$filename='1.txt';
if(file_exists($filename)){
    if(unlink($filename)){
        echo '删除成功';
    }else{
        echo '删除失败';
    }
}else{
    echo '目标文件不存在';
}





















<?php
header('content-type:text/html;charset=utf-8');
// $filename="test.txt";
//rename($filename,$newname):重命名
// if(rename($filename,'111.txt')){
//     echo '重命名成功';
// }else{
//     echo '重命名失败';
// }
//如果目标文件已存在，会产生覆盖
// $filename='111.txt';
// if(rename($filename,'1.txt')){
//     echo '重命名成功';
// }else{
//     echo '重命名失败';
// }
// $filename='1.txt';

// $newname='2.txt';
// //检测目标文件是否存在，不存在则重命名
// if(!file_exists($newname)){
//     if(rename($filename,$newname)){
//         echo '重命名成功';
//     }else{
//         echo '重命名失败';
//     }
// }else{
//     echo '存在同名文件，请重新起名';
// }
// //剪切同样使用rename
// $filename='1.txt';
// $newname='test/1.txt';
// if(!file_exists($newname)){
//     if(rename($filename,$newname)){
//         echo '剪切成功';
//     }else{
//         echo '前切失败';
//     }
// }else{
//     echo '存在同名文件';
// }
//copy($filename,$dest):拷贝文件
$filename='1-file.php';
$dest='test/1-file.php';
if(!file_exists($dest)){
    if(copy($filename,$dest)){
        echo '成功';
    }else{
        echo '失败';
    }
}else{
    echo '存在同名文件';
}





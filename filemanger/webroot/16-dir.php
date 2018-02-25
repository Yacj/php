<?php
header('content-type:text/html;charset=utf-8');
$path='1.txt';
$path='./test';
var_dump(is_dir($path));//检测是否为目录
echo '<hr/>';
echo getcwd();
echo '<hr/>';
echo '磁盘剩余空间：'.disk_free_space(getcwd());
echo '<br/>';
echo '磁盘总大小：'.disk_total_space(getcwd()).'<br/>';
echo 'C盘剩余空间：'.diskfreespace('C:').'<br/>';
echo 'C盘总大小：'.disk_total_space('C:').'<br/>';

function transByte($size,$digits=2){
    $unit=array('B','KB','MB','GB','TB','PB','EB');
    $base=1024;
    $i=floor(log($size,$base));
    return round($size/pow($base,$i),$digits).$unit[$i];
}

function transByte1($size,$digits=2){
    $unit=array('B','KB','MB','GB','TB','PB','EB');
    $i=0;
    while($size>1024){
        $size/=1024;
        $i++;
    }
    return round($size,$digits).$unit[$i];
}

echo transByte(disk_free_space(getcwd()));
echo '<br/>';
echo transByte1(disk_total_space(getcwd()));













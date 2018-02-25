<?php
/**
 * Created by PhpStorm.
 * User: a1356
 * Date: 2018/1/28
 * Time: 12:45
 * @path:转换单位
 */

function transByte($size,$digits=2){
    $unit = array('B','kB','MB','GB','TB','PB');
    $base = 1024;
    $i = floor(log($size,$base));
    return @round($size/pow($base,$i),$digits).$unit[$i];
}

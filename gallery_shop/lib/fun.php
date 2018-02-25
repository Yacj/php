<?php
/**
 * Created by PhpStorm.
 * User: a1356
 * Date: 2018/2/25
 * Time: 12:29
 */
function mysqlInit($host,$username,$password,$dbName){
    $con = mysql_connect($host,$username,$password);
    if (!$con){
        return false;
    }

    mysql_select_db($dbName);
    mysql_set_charset('utf8');

    return $con;


}
function createPassword($password){
    if(!$password){
        return false;
    }

    return md5(md5($password).'ZJJ');
}

function msg($type,$msg=null,$url=null)
{
    $toUrl = "Location:msg.php?type={$type}";
    $toUrl.=$msg?"&msg={$msg}":'';
    $toUrl.=$url?"&url={$url}":'';
    header($toUrl);
    exit;
}
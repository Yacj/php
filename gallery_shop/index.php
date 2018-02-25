<?php
/**
 * Created by PhpStorm.
 * User: a1356
 * Date: 2018/2/25
 * Time: 12:29
 */
session_start();

if(!isset($_SESSION['user'])||empty($_SESSION['user']))
{
    header('Location:login.php');
    exit;
}
echo '商品中心';
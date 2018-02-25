<?php
header('content-type:text/html;charset=utf-8');
// $filename='userInfo.txt';
// $handle=fopen($filename,'rb');
// $info=fscanf($handle, "%s%s%d");
// print_r($info);
// while($info=fscanf($handle, "%s%s%d")){
//     echo "username:".$info[0].'<br/>';
//     echo "email:".$info[1].'<br/>';
//     echo 'age:'.$info[2].'<br/>';
//     echo '<hr/>';
//     list($username,$email,$age)=$info;
// }
// fclose($handle);


$str="2016 3 21";
$info=sscanf($str, "%d%d%d");
print_r($info);












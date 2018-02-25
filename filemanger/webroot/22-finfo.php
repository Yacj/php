<?php
header('content-type:text/html;charset=utf-8');
// phpinfo();
$filename="2.txt";
$filename='1.png';
$filename='myPic.jpg';
$finfo=finfo_open(FILEINFO_MIME);//text/plain; charset=us-ascii
$finfo=finfo_open(FILEINFO_MIME_TYPE);
$finfo=finfo_open(FILEINFO_MIME_ENCODING);
echo finfo_file($finfo,$filename);
finfo_close($finfo);
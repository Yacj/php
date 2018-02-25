<?php
header('content-type:text/html;charset=utf-8');
$data=array(
  array('a','b','c','d'),
  array('你','好','麦','子')
);
$handle=fopen('test4.csv','w+');
// foreach($data as $val){
//     fputcsv($handle, $val);
// }
// fclose($handle);
// foreach($data as $val){
//     fwrite($handle,join(',',$val).PHP_EOL);
// }
// fclose($handle);
foreach($data as $val){
    fputcsv($handle, $val,'-');
}
fclose($handle);


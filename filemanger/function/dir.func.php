<?php
/**
 * Created by PhpStorm.
 * User: a1356
 * Date: 2018/1/28
 * Time: 12:45
 */
function readDirec($path){
    $handle=opendir($path);
    while (($item=@readdir($handle))!==false){
        if($item!='.'&&$item!='..'){
            $filePath =$path.'/'.$item;
            $info['filename']=$filePath;
            $info['showname']=$item;
            $info['readable']=is_readable($filePath)?true:false;
            $info['writable']=is_writeable($filePath)?true:false;
            $info['executable']=is_executable($filePath)?true:false;
            $info['ctime']=date("Y-m-d",filectime($filePath));
            $info['mtime']=date("Y-m-d",filectime($filePath));
            $info['atime']=date("Y-m-d",filectime($filePath));
            if(is_file($filePath)){
                $arr['file'][] = $info;
            }
            if(is_dir($filePath)){
                $arr['dir'][] = $info;
            }
        }
    }
    closedir($handle);
    return $arr;
}

function getDirSize($path){
    $sum = 0;
    global $sum;
    $handle = opendir($path);

    while(($item=@readdir($handle))!==false){
        if($item!='.'&&$item!='..'){
            if(is_file($path.'/'.$item)){
                $sum+=filesize($path.'/'.$item);
            }
            if(is_dir($path.'/'.$item)){
                $func=__FUNCTION__;
                $func($path.'/'.$item);
            }
        }
    }
    closedir($handle);
    return $sum;
}

function checkDirName($dirName){
    $pattern  = "/[\?\*<>\|]/";
    if(preg_match($pattern,$dirName)){
        return false;
    }else{
        return false;
    }
}
function createDir($dirName){
    if(checkDirName($dirName)){
        return '目录名称中包含非法字符';
    }
    if(file_exists($dirName)){
        return '存在同名目录';
    }
    if(!mkdir($dirName,755,true)){
        return '目录创建失败';
    }
    return '目录创建成功';
}
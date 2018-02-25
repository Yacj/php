<?php
header('content-type:text/html;charset=utf-8');
// $filename='4|.txt';
// $pattern="/[\/\*<>\?\|]/";
// if(!preg_match($pattern,$filename)){
// if(!file_exists($filename)){
// if(touch($filename)){
// echo '创建成功';
// }else{
// echo '创建失败';
// }
// }else{
// echo '存在同名文件';
// }
// }else{
// echo '文件名中包含特殊字符';
// }

/**
 * 检测文件名合法性
 * 
 * @param string $filename            
 * @return boolean
 */
function checkFileName($filename)
{
    $pattern = "/[\/\*<>\?\|]/";
    if (preg_match($pattern, $filename)) {
        return false;
    } else {
        return true;
    }
}

/**
 * 创建文件
 * 
 * @param string $filename            
 * @return string
 */
function createFile($filename)
{
    // 首先检测文件名合法性
    if (checkFileName($filename)) {
        // 检测是否存在同名文件
        if (! file_exists($filename)) {
            if (touch($filename)) {
                $mes = '创建成功';
            } else {
                $mes = '创建失败';
            }
        } else {
            $mes = '存在同名文件';
        }
    } else {
        $mes = '文件名中包含非法字符';
    }
    return $mes;
}

/**
 * 创建文件
 * 
 * @param string $filename            
 * @return string
 */
function createFile1($filename)
{
    if (! checkFileName($filename)) {
        return '文件名中包含非法字符';
    }
    if (file_exists($filename)) {
        return '存在同名文件';
    }
    if (! touch($filename)) {
        return '文件创建失败';
    }
    return '文件创建成功';
}

/**
 * 删除文件
 * 
 * @param string $filename            
 * @return string
 */
function delFile($filename)
{
    if (! file_exists($filename)) {
        return '文件不存在';
    }
    if (! unlink($filename)) {
        return '文件删除失败';
    }
    return '文件删除成功';
}

/**
 * 重命名文件
 * 
 * @param string $oldName            
 * @param string $newName            
 * @return string
 */
function renameFile($oldName, $newName)
{
    if (! checkFileName($oldName)) {
        return '文件名包含非法字符';
    }
    $dir = dirname($oldName);
    if (file_exists($dir . '/' . $newName)) {
        return '存在同名文件';
    }
    if (! rename($oldName, $newName)) {
        return '重命名失败';
    }
    return '重命名成功';
}

/**
 * 剪切
 * 
 * @param string $filename
 *            源文件
 * @param string $dest
 *            目标目录
 * @return string
 */
function cutFile($filename, $dest)
{
    if (! file_exists($filename)) {
        return '源文件不存在';
    }
    // 检测目标目录是否存在，如果不存在则创建
    if (! file_exists($dest)) {
        mkdir($dest, 755, true);
    }
    // 检测目标路径下是否存在同名文件，如果不存在则剪切
    if (file_exists($dest . '/' . basename($filename))) {
        return '目标目录存在同名文件，剪切失败';
    }
    if (! rename($filename, $dest . '/' . basename($filename))) {
        return '剪切失败';
    }
    return '剪切成功';
}
// $filename='newfile.php';
// $dest='king';
// $filename="king/2.txt";
// $dest="./";
// echo cutFile($filename, $dest);
/**
 * 拷贝文件
 * 
 * @param string $filename            
 * @param string $dest
 *            目标目录
 * @return string
 */
function copyFile($filename, $dest)
{
    if (! file_exists($filename)) {
        return '源文件不存在';
    }
    if (file_exists($dest . '/' . basename($filename))) {
        return '目标目录下存在同名文件，复制失败';
    }
    if (! copy($filename, $dest . '/' . basename($filename))) {
        return '拷贝失败';
    }
    return '拷贝成功';
}













<?php
header('content-type:text/html;charset=utf-8');
// 得到整个目录的大小
/**
 * 得到目录大小
 * 
 * @param string $path            
 * @return unknown|number
 */
function getDirSize($path)
{
    $handle = opendir($path);
    $sum = 0;
    global $sum;
    while (($item = readdir($handle)) !== false) {
        if ($item != '.' && $item != '..') {
            $filePath = $path . '/' . $item;
            if (is_file($filePath)) {
                $sum += filesize($filePath);
            }
            if (is_dir($filePath)) {
                $func = __FUNCTION__;
                $func($filePath);
            }
        }
    }
    closedir($handle);
    return $sum;
}
// $path='test';
// echo getDirSize($path);
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
 * 检测目录名称是否符合规范
 * 
 * @param string $dirName            
 * @return boolean
 */
function checkDirName($dirName)
{
    $pattern = "/[\*<>\?\|]/";
    if (preg_match($pattern, $dirName)) {
        return false;
    } else {
        return true;
    }
}

// 创建目录
function createDir($dirName)
{
    // 检测目录名的合法性
    if (! checkDirName($dirName)) {
        return '目录名中包含非法字符';
    }
    if (file_exists($dirName)) {
        return '存在同名目录';
    }
    if (mkdir($dirName, 755, true)) {
        return '目录创建成功';
    } else {
        return '目录创建失败';
    }
}
// $dirName='test1';
// $dirName='c/d';
// $dirName='e/f';
// $res=createDir($dirName);
// echo $res;
// 复制目录
/**
 * 拷贝目录
 * 
 * @param string $dirName
 *            原目录
 * @param string $dest
 *            目录目录名称
 * @return string
 */
function copyDir($dirName, $dest)
{
    if (! is_dir($dirName)) {
        return '源文件不是一个目录';
    }
    // 检测目标目录是否存在，如果不存在则创建
    if (! file_exists($dest)) {
        createDir($dest);
    }
    $handle = opendir($dirName);
    while (($item = readdir($handle)) !== false) {
        if ($item != '.' && $item != '..') {
            $filePath = $dirName . '/' . $item;
            if (is_file($filePath)) {
                copy($filePath, $dest . '/' . $item);
            }
            if (is_dir($filePath)) {
                $func = __FUNCTION__;
                $func($filePath, $dest . '/' . $item);
            }
        }
    }
    closedir($handle);
    return '拷贝成功';
}
// $dirName="test";
// $dest='b/test';
// echo copyDir($dirName, $dest);
// 重命名目录
/**
 * 重命名目录
 * 
 * @param string $oldName
 *            原目录名称
 * @param unknown $newName
 *            新目录名称
 * @return string
 */
function renameDir($oldName, $newName)
{
    // 检测原目录是否存在
    if (! file_exists($oldName)) {
        return '原目录不存在';
    }
    // 检测新文件名的合法性
    if (! checkDirName($newName)) {
        return '目录名中包含非法字符';
    }
    // 检测当前目录下是否存在同名文件
    if (file_exists($newName)) {
        return '存在同名目录';
    }
    if (rename($oldName, $newName)) {
        return '重命名目录成功';
    } else {
        return '重命名目录失败';
    }
}
// $oldName='ee';
// $newName='b';
// echo renameDir($oldName, $newName);

// 剪切目录
/**
 * 剪切目录
 * 
 * @param string $src
 *            原目录
 * @param unknown $dst
 *            目录目录
 * @return string
 */
function cutDir($src, $dst)
{
    // 检测原目录是否存在
    if (! file_exists($src)) {
        return '原目录不存在';
    }
    // 检测路径名称合法性
    if (! checkDirName($dst)) {
        return '目录名称包含非法字符';
    }
    // 检测目录路径是否存在，如果不存在则创建
    if (! file_exists($dst)) {
        createDir($dst);
    }
    // 检测目标路径下是否存在同名文件
    if (file_exists($dst . '/' . basename($src))) {
        return '目标目录下存在同名目录';
    }
    // 剪切文件
    if (rename($src, $dst . '/' . basename($src))) {
        return '剪切成功';
    } else {
        return '剪切失败';
    }
}
// $src="b/maizi";
// $dst='c';
// echo cutDir($src, $dst);
// 删除目录
/**
 * 删除非空目录
 * 
 * @param string $dirName
 *            目录
 * @return string
 */
function delDir($dirName)
{
    $handle = opendir($dirName);
    while (($item = readdir($handle)) !== false) {
        if ($item != '.' && $item != '..') {
            $filePath = $dirName . '/' . $item;
            if (is_file($filePath)) {
                unlink($filePath);
            }
            if (is_dir($filePath)) {
                $func = __FUNCTION__;
                $func($filePath);
            }
        }
    }
    closedir($handle);
    rmdir($dirName);
    return '目录删除成功';
}
$path = 'king';
echo delDir($path);

























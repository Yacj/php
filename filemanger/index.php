<?php
error_reporting(0);

require_once 'function/dir.func.php';
require_once 'function/file.func.php';
define("PATH","webroot");
$path = $_REQUEST['path']?$_REQUEST['path']:PATH;
$act = $_REQUEST['act'];
$dirName = $_REQUEST['dirName'];
$info = readDirec($path);
switch ($act){
    case 'createDir':
        $res=createDir($path.'/'.$dirName);
        exit($res);
        break;
}
//print_r($info);exit;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/normalize/7.0.0/normalize.css">
    <link rel="stylesheet" href="lib/css/bootstrap.css">
    <link rel="stylesheet" href="lib/css/bootstrap-theme.css">
    <link rel="stylesheet" href="lib/css/cikonss.css">
    <link rel="stylesheet" href="lib/css/main.css">
    <style>
        @media screen and (max-width: 600px) {
            .hideContent{
                display: none;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header" >
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand">Web在线文件管理器</a>
        </div>
        <div class="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="index.php">
                        主目录
                    <span class="icon icon-small"><span class="icon-mail"></span></span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" data-target="#createDir" data-toggle="modal">
                        新建文件夹
                        <span class="icon icon-small"><span class="icon-folder"></span></span>
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        新建文件
                        <span class="icon icon-small"><span class="icon-file"></span></span>
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        上传文件
                        <span class="icon icon-small"><span class="icon-upload"></span></span>
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        系统信息
                        <span class="icon icon-small"><span class="icon-stats"></span></span>
                    </a>
                </li>
                </li>
                <li>
                    <a href="index.php">
                        联系我
                        <span class="icon icon-small"><span class="icon-mail"></span></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section id="download">
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h1>Web在线文件管理器<code>v1.0</code></h1>
                <p><a href="#" class="btn btn-primary btn-lg">欢迎大家来下载</a></p>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">文件路径:根目录</div>
            <div class="col-md-2">返回上级</div>
        </div>
    </div>
</section>

<section id="list">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive table-hover table-bordered">
                    <tr>
                        <th>类型</th>
                        <th>名称</th>
                        <th>大小</th>
                        <th class="hideContent">读</th>
                        <th class="hideContent">写</th>
                        <th class="hideContent">执行</th>
                        <th class="hideContent">创建</th>
                        <th class="hideContent">修改</th>
                        <th class="hideContent">访问</th>
                        <th>操作</th>
                    </tr>
                    <?php
                    if(!empty($info['dir'])){
                        foreach ($info['dir'] as $val){
                            ?>
                            <tr>
                                <td><span class="icon icon-mid"><span class="icon-folder"></span></span></td>
                                <td><?php echo $val['showname'];?></td>
                                <td><?php $sum=0;global $sum; echo transByte(getDirSize($val['filename']))?></td>
                                <td><span class="icon icon-mid"><span class="<?php echo  $val['readable']?'icon-play':'icon-pause';?>"></span></span></td>
                                <td><span class="icon icon-mid"><span class="<?php echo  $val['writable']?'icon-play':'icon-pause';?>"></span></span></td>
                                <td><span class="icon icon-mid"><span class="<?php echo  $val['executable']?'icon-play':'icon-pause';?>"></span></span></td>
                                <td><?php echo $val['ctime'];?></td>
                                <td><?php echo $val['mtime'];?></td>
                                <td><?php echo $val['atime'];?></td>
                                <td>
                                    <a href="index.php?path=<?php echo $val['filename'];?>" class="btn btn-info btn-sm">打开</a>
                                    <a href="javascript:void(0)"  class="btn btn-info btn-sm renameDir" data-target="#renameDir" data-toggle="modal" data-filename="<?php echo $val['filename'];?>">重命名</a>
                                </td>
                            </tr>
                    <?php
                        }
                    }?>

                    <?php
                    if(!empty($info['file'])){
                        foreach ($info['file'] as $val){
                    ?>
                            <tr>
                                <td><span class="icon icon-mid"><span class="icon-file"></span></span></td>
                                <td><?php echo $val['showname'];?></td>
                                <td><?php echo transByte(filesize($val['filename']));?></td>
                                <td><span class="icon icon-mid"><span class="<?php echo  $val['readable']?'icon-play':'icon-pause';?>"></span></span></td>
                                <td><span class="icon icon-mid"><span class="<?php echo  $val['writable']?'icon-play':'icon-pause';?>"></span></span></td>
                                <td><span class="icon icon-mid"><span class="<?php echo  $val['executable']?'icon-play':'icon-pause';?>"></span></span></td>
                                <td><?php echo $val['ctime'];?></td>
                                <td><?php echo $val['mtime'];?></td>
                                <td><?php echo $val['atime'];?></td>
                                <td>
                                    <a href="index.php?path=<?php echo $val['filename'];?>" class="btn btn-info btn-sm">打开</a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</section>
<footer>
    <p>@2012-2018 Zblack.com</p>
    <p>皖</p>
</footer>



<!-- Modal -->
<div class="modal fade" id="createDir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">新建文件夹</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                  <label for="dirName">请输入文件夹名称:</label>
                  <input type="text" class="form-control" id="dirName" placeholder="文件夹名称不要包含特殊字符">
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary createDir">确定</button>
            </div>
        </div>
    </div>
</div>

<!--重命名 Start-->
<div class="modal fade" id="renameDir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">重命名文件夹:</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="newDirName">请输入新文件夹名称:</label>
                    <input type="text" class="form-control" id="newDirName" placeholder="文件夹名称不要包含特殊字符">
                    <input type="hidden" id="oldDirName" data-fileName=""/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary renameDirSub">确定</button>
            </div>
        </div>
    </div>
</div>
<!--重命名 over-->
<input type="hidden" id="hiddenPath" value="<?php echo $path;?>">

<div class="modal fade" id="msgAlert">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">信息提示</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="reload">关闭</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.bootcss.com/jquery/2.2.1/jquery.js"></script>
<script src="lib/js/bootstrap.js"></script>
<script src="lib/js/dir.js"></script>
</body>
</html>
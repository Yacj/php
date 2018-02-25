$(function () {
//新建文件夹
    $('.createDir').click(function () {
       var dirName = $('#dirName').val();
       var path = $('#hiddenPath').val();
       $.ajax({
           type:'POST',
           url:'index.php?act=createDir',
           data:{dirName:dirName,path:path},
           success:function (data) {
               $('#createDir').modal('hide');
               $('#msgAlert .modal-body').html(data);
               $('#msgAlert').modal();
           }
       });
    });

    //重命名文件夹
    $('.renameDir').click(function () {
        var filename = $(this).attr('data-filename');
        alert(filename);
    });
    $('#reload').click(function () {
        location.reload();
    });
});
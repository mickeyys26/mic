<?php
$folder_path= 'Upload/';
$file_path = $folder_path.$_FILES['upload_file']['name'];
$flag = true;



// check file trùng
if(file_exists($file_path)){
    echo "File đã tồn tại";
    $flag = false;
}
// check loại file
$ex = array('jpg','png','jpeg','img','docx','ppt','pdf','mp3','mp4','txt');
$file_type =strtolower(pathinfo($file_path,PATHINFO_EXTENSION));
if(!in_array($file_type,$ex)){
    echo "Loại file ko hợp lệ";
    $flag = false;
}
// check dung luong
if($_FILES['upload_file']['size']>700000){
    echo " Dung lượng file quá lớn";
    $flag = false;
}

if($flag){
    move_uploaded_file($_FILES['upload_file']['tmp_name'],$file_path);
    echo"Upload thành công!!!";
}else{
    echo"K upload dc";
}
?>
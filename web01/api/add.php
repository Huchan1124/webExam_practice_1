<?php
include_once "../base.php";

$db = new DB($_POST['table']);

// $_FILES 判斷檔案上傳是否成功

if (isset($_FILES['img']['tmp_name'])){
    // 如果檔案有上傳成功，幫我把圖片檔案移到某個資料夾去
    move_uploaded_file($_FILES['img']['tmp_name'], "../img2/".$_FILES['img']['name']);
    // 
    $data['img'] = $_FILES['img']['name'];
}



// 判斷
switch($_POST['table']){
    //如果傳進來的資料是admin
    case "admin":
        $data['acc']=$_POST['acc'];
        $data['pw']= $_POST['pw'];
    break;

    case "menu":
        $data['text']=$_POST['text'];
        $data['href']= $_POST['href'];
    break;
    default:
        $data['text']=$_POST['text'];
}



$db->save($data);

to("../backend.php?do=".$_POST['table']);


?>
<?php
include('../conn/conn.php');
session_start();
$cus_id = $_SESSION['cus_id'];
$nt_id = $_GET['nt_id'];
$file_detail = $_GET['file_detail'];

$nail_picture = pathinfo(basename($_FILES['cus_file']['name']), PATHINFO_EXTENSION);
if ($nail_picture != "") {
    $new_image_name = 'img' .uniqid() . "." . $nail_picture;
     //echo $new_image_name;
    $image_path = "../img/uploadfile";
    $upload_path = $image_path . "/" . $new_image_name;
     //echo $upload_path;
 
     //uploading
    $upload = move_uploaded_file($_FILES['cus_file']['tmp_name'], $upload_path);
    if ($upload == FALSE) {
         echo "ไม่สามารถ UPLOAD รูปภาพได้";
         exit();
    }
    $uploadfile = "../img/uploadfile/".$new_image_name;
    $picup = $uploadfile;
}
mysqli_query($conn, "insert into book_nail_detail (cus_id, nt_id, file_detail, cus_file) 
 values ('$cus_id','$nt_id', '$file_detail', '$picup')");
//  header('location:../header/header_uplode.php');
?>


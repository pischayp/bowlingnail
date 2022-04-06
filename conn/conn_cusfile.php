<?php
include('../conn/conn.php');
session_start();
$cus_id = $_SESSION['cus_id'];
$nt_id = $_POST['nt_id'];
$file_detail = $_POST['file_detail'];
$stId = '82';



$nail_picture = pathinfo(basename($_FILES['cus_file']['name']), PATHINFO_EXTENSION);
if ($nail_picture != "") {
    $new_image_name = 'img' . uniqid() . "." . $nail_picture;
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
    $uploadfile = "../img/uploadfile/" . $new_image_name;
    $picup = $uploadfile;
}

$queryBooking = "SELECT * FROM booking where cus_id = $cus_id AND book_status = 0 ";
$bookingQuery = mysqli_query($conn, $queryBooking);
$numrow = mysqli_num_rows($bookingQuery);
$sqlselect = "SELECT * FROM booking WHERE cus_id = $cus_id ORDER BY book_id DESC LIMIT 1";
$resultselect = mysqli_query($conn, $sqlselect);

if ($numrow < 1) {
    $sqlInsert = "INSERT INTO booking(cus_id,book_status) VALUES($cus_id,0)";
    $result = mysqli_query($conn, $sqlInsert);

    $sqlselect2 = "SELECT * FROM booking WHERE cus_id = $cus_id ORDER BY book_id DESC LIMIT 1";
    $resultselect2 = mysqli_query($conn, $sqlselect2);
    $rowselect2 = mysqli_fetch_array($resultselect2);
    $book_id = $rowselect2['book_id'];
    // $insrtDetail = "INSERT INTO book_nail_detail(book_id,S_ID,ST_ID,cus_price,date_add) VALUES ($book_id,$S_ID,$st_id,$price,'$date')";
    mysqli_query($conn, "insert into book_nail_detail ( nt_id, file_detail,book_id, cus_file) 
 values ('$nt_id', '$file_detail','$book_id','$picup')");
} else {

    $rowselect = mysqli_fetch_array($resultselect);
    $book_id = $rowselect['book_id'];
    // $insrtDetail = "INSERT INTO book_nail_detail(book_id,S_ID,ST_ID,cus_price,date_add) VALUES ($book_id,$S_ID,$st_id,$price,'$date')";
    mysqli_query($conn, "insert into book_nail_detail ( nt_id, file_detail,book_id, cus_file,ST_ID) 
    values ('$nt_id', '$file_detail','$book_id','$picup','$stId')");
}

header('location:../header/header_uplode.php');

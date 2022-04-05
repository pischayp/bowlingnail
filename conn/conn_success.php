<?php 
include('conn.php');
session_start();
$cus_id = $_SESSION['cus_id'];
$book_id = $_GET['book_id'];

$querysuccess = "SELECT * FROM booking where cus_id = $cus_id AND book_status = 0  ORDER BY book_id DESC LIMIT 1";
$booksuccess = mysqli_query($conn, $querysuccess); 
$row = mysqli_fetch_assoc($booksuccess);
$id = $row['book_id'];
$sql = "UPDATE booking SET booking.book_status = 1 where booking.book_id = $id";
mysqli_query($conn,$sql);
// $numrow = mysqli_num_rows($bookisuccess);
// $sqlsuccess = "SELECT * FROM booking WHERE cus_id = $cus_id ORDER BY book_id DESC LIMIT 1";
// $resultselect = mysqli_query($conn, $sqlsuccess);
// con checkตระกร้าจองเสร็จให้ขึ้นสถานะ1
?>
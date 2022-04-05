<?php
include('conn.php');
$book_id = $_GET['book_id'];
$nailer_book = 1;
mysqli_query($conn,"UPDATE booking SET nailer_book= 1  WHERE book_id='$book_id'");	
header('location:../nailer/nailer_working.php');
?>
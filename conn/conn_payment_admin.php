<?php
// ไฟล์ที่เชื่อมกับดาต้าเบส
	 include('conn.php');
    $book_id = $_GET['book_id'];
    $status_id = $_GET['status_id'];
   
    mysqli_query($conn, "update booking set status_id = '$status_id' where book_id='$book_id' ");	
    header('location:../admin/show_booking.php');

?>

<?php
// ไฟล์ที่เชื่อมกับดาต้าเบส
	 include('conn.php');
    
    $book_id = $_GET['book_id'];
    $total_price = $_GET['price'];
	$pay_type = $_POST['pay_type'];
    $slip_pic = pathinfo(basename($_FILES['upload']['name']), PATHINFO_EXTENSION);
	if ($slip_pic != "") {
		$new_image_name = 'img' .uniqid() . "." . $slip_pic;
		 //echo $new_image_name;
		$image_path = "../img/slip";
		$upload_path = $image_path . "/" . $new_image_name;
		 //echo $upload_path;
	 
		 //uploading
		$upload = move_uploaded_file($_FILES['upload']['tmp_name'], $upload_path);
		if ($upload == FALSE) {
			 echo "ไม่สามารถ UPLOAD รูปภาพได้";
			 exit();
		}
		$pro_image = "../img/slip/".$new_image_name;
		$pic = $pro_image;
    }
   
    mysqli_query($conn, "update booking set status_id = '0' , slip ='$pic', total_price = $total_price , payment_status = $pay_type where book_id='$book_id' ");	
    header('location:../booking/book_success.php');

?>

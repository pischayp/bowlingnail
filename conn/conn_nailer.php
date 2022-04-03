<?php
	include('conn.php');

	$nailer_id=$_POST['nailer_id'];
	$nailer_name=$_POST['nailer_name'];
	$nailer_tel=$_POST['nailer_tel'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$nailer_username=$_POST['nailer_username'];
	$password=$_POST['password'];
	$nailer_picture=$_POST['nailer_picture'];

	$nailer_picture = pathinfo(basename($_FILES['pic_index']['name']), PATHINFO_EXTENSION);
	if ($nailer_picture != "") {
		$new_image_name = 'img' .uniqid() . "." . $file;
		 //echo $new_image_name;
		$image_path = "img";
		$upload_path = $image_path . "/" . $new_image_name;
		 //echo $upload_path;
	 
		 //uploading
		$upload = move_uploaded_file($_FILES['pic_index']['tmp_name'], $upload_path);
		if ($upload == FALSE) {
			 echo "ไม่สามารถ UPLOAD รูปภาพได้";
			 exit();
		}
		$pro_image = "/img/nailer/".$new_image_name;
		$pic = $pro_image;
 

     mysqli_query($conn, "insert into nailer (nailer_id, nailer_name, nailer_tel, nailer_username, password) 
	 values ('$nailer_id','$nailer_name', '$nailer_tel', '$nailer_username', '$password', '$pic')");
     header('location:../nailer/nailer_working.php');
	}
?>
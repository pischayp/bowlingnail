<?php  
include("conn.php");  
session_start();
  
if(isset($_POST['login']))  
{  
    
    $username=$_POST['username'];  
    $password=$_POST['password'];
  
   $sql="select * from customer where username='$username' and password='$password'";
   $result = mysqli_query($conn,$sql);
   $num_row = mysqli_num_rows($result);
	
 if ($num_row > 0)	 
 
    {$row=mysqli_fetch_array($result);
       
        if($row["typeuser_id"]==1){
            $_SESSION["username"]=$row["username"];
            $_SESSION["password"]=$row["password"];
            $_SESSION["cus_id"]=$row["cus_id"];
            echo "<script>window.location='../index/index_admin.php'</script>";
        }        
        else if($row["typeuser_id"]==2){
            $_SESSION["username"]=$row["username"];
            $_SESSION["password"]=$row["password"];
            $_SESSION["cus_id"]=$row["cus_id"];
            echo "<script>window.location='../header/header_user.php'</script>";
        }			
    }  

    $nailer_username=$_POST['username'];  
    $password=$_POST['password'];
  
   $sql2="select * from nailer where nailer_username='$nailer_username' and password='$password'";
   $result2 = mysqli_query($conn,$sql2);
   $num_row2 = mysqli_num_rows($result2);
	
 if ($num_row2 > 0)	 
 
    {$row2=mysqli_fetch_array($result2);
       
        if($row2["typeuser_id"]==3){
            $_SESSION["nailer_username"]=$row2["nailer_username"];
            $_SESSION["nailer_name"]=$row2["nailer_name"];
            $_SESSION["password"]=$row2["password"];
            $_SESSION["nailer_id"]=$row2["nailer_id"];
            echo "<script>window.location='../nailer/nailer_working.php'</script>";
        }        			
    }  
    else  
    {  
    //echo $username."<br>".$password;
       echo "<script>alert('email or password is incorrect!')</script>";  
	   echo "<script>window.open('../index.php','_self')</script>";  
    }  
}

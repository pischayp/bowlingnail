<?php include "../session.php" ?>
<?php include '../conn/conn.php'?>
<?php include "../function/getNumOfCart.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bowling Nail & Spa. | ร้านทำเล็บและสปา</title>
    <link rel="stylesheet" href="../css.css">
    <link rel="stylesheet" href="../css_breadcrumb.css">
    <link rel="icon" type="image/x-icon" href="../img/bowling-logo.svg" />
    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/541e01753a.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <style>
    body {
    background-image: url('https://i.pinimg.com/564x/af/c2/10/afc21018708639dabcbb588ecee0f3a2.jpg');
    background-repeat: no-repeat;
    /* background-attachment: fixed; */
    background-size: 100% 100%;
    }
    </style>
       
</head>
<body>
<header>

<div class="container">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light color-dark shadow-sm fixed-top rounded" id="menu">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10"
            aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="../header/header_user.php">
                    <img src="../img/logo.png" width="150" height="60" class="d-inline-block align-text-top">
                </a>
            </div>
        </nav>

        <div class="collapse navbar-collapse justify-content-md-end " id="navbarsExample10">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../header/header_renail.php">แนะนำลายเล็บ</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" 
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ลายเล็บมือ
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../header/headerh_p.php">แบบลายเล็บมือ (ต่อนิ้ว)</a>
                    <a class="dropdown-item" href="../header/headerh_pset.php">แบบลายเล็บมือ (เซต)</a>
                    <a class="dropdown-item" href="../header/header_uplode.php">อัปโหลดลายเล็บที่ต้องการ</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ลายเล็บเท้า
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../header/headerf_p.php">แบบลายเล็บเท้า (ต่อนิ้ว)</a>
                    <a class="dropdown-item" href="../header/headerf_pset.php">แบบลายเล็บเท้า (เซต)</a>
                    <a class="dropdown-item" href="../header/header_uplode.php">อัปโหลดลายเล็บที่ต้องการ</a>
                </div>
            </li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../header/header_spa.php">สปามือและเท้า</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../header/header_nailer.php">โปรไฟล์ช่างทำเล็บ</a></li>
            <li class="nav-item">
                <a class="nav-link" class="nav-link js-scroll-trigger" href="../booking/booking_nail.php">
                    <div class="basket-num">
                        <div class="basket">
                        &emsp;
                        <?php echo $numOfCart ?>&nbsp;
                        <i class="fas fa-shopping-cart"></i><img class="icon_cart"  alt="" width="5">
                        &emsp;
                        </div>
                    </div>
                </a>
            </li>
            <li class="nav-item dropdown"  id="menu_user">
            <!-- <button class="btn btn-secondary btn-sm"> -->
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" 
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?PHP
                        if(isset($_SESSION['username'])){
                            echo "ผู้ใช้งาน : ".$_SESSION['username'];
                        }else{  
                            echo "<script>alert('username or password is incorrect!')</script>";  
                            echo "<script>window.open('../index.php','_self')</script>";  
                        }  
                    ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../user/user_profile.php">ข้อมูลส่วนตัว</a>
                    <a class="dropdown-item" href="../user/user_reserve.php">ประวัติการจอง</a>
                    <a class="dropdown-item" href="../user/user_booking.php">ตรวจสอบสถานะการจอง</a>
                    <hr>
                    <a class="dropdown-item" href="../index.php">ออกจากระบบ</a>
                </div>
            <!-- </button> -->
            </li>
            </ul>
        </div>
    </nav>
</div>

</header>  
</body>
</html>

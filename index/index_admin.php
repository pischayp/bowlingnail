<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bowling Nail & Spa. | ร้านทำเล็บและสปา</title>
    <link rel="stylesheet" href="../css.css">
    <link rel="stylesheet" href="../css_admin.css">
    <link rel="stylesheet" href="../css_user.css">
    <link rel="icon" type="image/x-icon" href="../img/bowling-logo.svg" />
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <style>
        body{
            background-attachment: fixed;
            background-image: '../img/bg/bg1.jpg';
        }
    </style>

</head>
<body>
    <?php include('../header_admin.php'); ?>

    <div class="container-fluid">
        <!-- <div class="row">
            <div class="col-12">
            <div class="card-group">
                <div class="col-4" id="page_admin">
                    <a href="../admin/show_user.php">
                    <div class="card text-center" width="100%" id="menu_admin">
                    <div class="card-header">
                        <br>
                        <img src="../img/user-data.svg">
                        <br><br>
                        <p class="card-title">จัดการข้อมูลสมาชิก</p>
                    </div>
                    </div>
                    </a>
                </div>
                <div class="col-4" id="page_admin">
                    <a href="../admin/show_nailer.php">
                    <div class="card text-center" width="100%" id="menu_admin">
                    <div class="card-header">
                        <br>
                        <img src="../img/nailer_data.png">
                        <br><br>
                        <p class="card-title">จัดการข้อมูลช่างทำเล็บ</p>
                    </div>
                    </div>
                    </a>
                </div>
                <div class="col-4" id="page_admin">
                    <a href="../admin/editnail_hand_one.php">
                    <div class="card text-center" width="100%" id="menu_admin">
                    <div class="card-header">
                        <br>
                        <img src="../img/nail_data.png">
                        <br><br>
                        <p class="card-title">จัดการข้อมูลการบริการ</p>
                    </div>
                    </div>
                    </a>
                </div>
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
            <div class="card-group">
                <div class="col-4" id="page_admin">
                    <a href="../admin/show_booking.php">
                    <div class="card text-center" width="100%" id="menu_admin">
                    <div class="card-header">
                        <br>
                        <img src="../img/user_data.png">
                        <br><br>
                        <p class="card-title">จัดการข้อมูลการจอง</p>
                    </div>
                    </div>
                    </a>
                </div>
                <div class="col-4" id="page_admin">
                    <a href="../admin/show_record.php">
                    <div class="card text-center" width="100%" id="menu_admin">
                    <div class="card-header">
                        <br>
                        <img src="../img/record.png">
                        <br><br>
                        <p class="card-title">ประวัติการจองของลูกค้า</p>
                    </div>
                    </div>
                    </a>
                </div>
                <div class="col-4" id="page_admin">
                    <a href="../admin/show_test.php">
                    <div class="card text-center" width="100%" id="menu_admin">
                    <div class="card-header">
                        <br>
                        <img src="../img/record.png">
                        <br><br>
                        <p class="card-title">หน้าทดสอบ</p>
                    </div>
                    </div>
                    </a>
                </div>
            </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col"></div>
            <div class="col-12">
                <div class="card-group" id="card-renail">
                <div class="card">
                    
                    <img src="../img/user-data.svg" class="card-img-top">
                    <div class="card-body">
                    <a href="../admin/show_user.php" class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash"></span>จัดการข้อมูลสมาชิก</a>
                    </div>
                </div>
                &emsp;
                <div class="card">
                    <img src="../img/nailer_data.png" class="card-img-top">
                    <div class="card-body">
                    <a href="../admin/show_nailer.php" class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash"></span>จัดการข้อมูลช่างทำเล็บ</a>
                    </div>
                </div>
                &emsp;
                <div class="card">
                    <img src="../img/nail_data.png" class="card-img-top">
                    <div class="card-body">
                    <a href="../admin/editnail_hand_one.php" class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash"></span>จัดการข้อมูลการบริการ</a>
                    </div>
                </div>
                &emsp;
                <div class="card">
                    <img src="../img/user_data.png" class="card-img-top">
                    <div class="card-body">
                    <a href="../admin/show_booking.php" class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash"></span>จัดการข้อมูลการจอง</a>
                    </div>
                </div>
                &emsp;
                <div class="card">
                    <img src="../img/record.png" class="card-img-top">
                    <div class="card-body">
                    <a href="../admin/show_record.php" class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash"></span>ประวัติการจองของลูกค้า</a>
                    </div>
                </div>
                &emsp;
                <div class="card">
                    <img src="../img/img-dashboard.png" class="card-img-top">
                    <div class="card-body">
                    <a href="../admin/dashboard.php" class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash"></span>รายงานสรุปผล</a>
                    </div>
                </div>
                </div>
            </div>
            <div class="col"></div>
        </div>  
    </div><br><br>

       
</body>
</html>
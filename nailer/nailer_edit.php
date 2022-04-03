<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../header_nailer.php"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bowling Nail & Spa. | ร้านทำเล็บและสปา</title>
    <link rel="icon" type="image/x-icon" href="../img/bowling-logo.svg" />
    <!-- Google font -->
    <link rel="stylesheet" href="../css.css">
    <link rel="stylesheet" href="../css_nailer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/541e01753a.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


</head>
<body>

    <div class="container">
        <div class="row" id="header_nailer">
            <div class="col-1"></div>
            <div class="col-10" id="hr-nailer">
                <h2>ข้อมูลส่วนตัวของช่างทำเล็บ</h2>
                <h6>ร้านทำเล็บ Bowling Nail and Spa.</h6>
            </div>
            <div class="col-1"></div>
        </div>
    </div><br>

    <div class="row">
        <div class="col-2">
            <?php
            $nailer_id = $_SESSION["nailer_id"];
            include('../conn/conn.php');
            $querynailer = "SELECT * FROM nailer WHERE nailer_id='$nailer_id' ";
            $result1 = mysqli_query($conn, $querynailer);
            $rownailer = mysqli_fetch_array($result1)

            ?>

        </div>
        <div class="col-8">
            <div class="row" id="nailer_profile">
                <div class="card h-80">

                    <img src="<?php echo $rownailer["nailer_picture"] ?>" class="card-img-top rounded-circle" />

                    <div class="card w-75" id="nailer_data">
                        <div class="card-body">
                            <form action="#" enctype="multipart/form-data" method="POST">
                                <div class="row">
                                    <div class="col-3">
                                        <label>รหัสช่างทำเล็บ : </label><br>
                                    </div>
                                    <div class="col-9">
                                        <input class="form-control input-lg" type="text" value="<?php echo $rownailer['nailer_id']; ?> " size="5" name="nailer_id" readonly>
                                    </div><br><br>

                                    <div class="col-3">
                                        <label>ชื่อช่างทำเล็บ : </label><br>
                                    </div>
                                    <div class="col-9">
                                        <input class="form-control input-lg" type="text" value="<?php echo $rownailer['nailer_name']; ?> " size="30" name="nailer_name" readonly>
                                    </div><br><br>

                                    <div class="col-3">
                                        <label>ชื่อ : </label><br>
                                    </div>
                                    <div class="col-9">
                                        <input class="form-control input-lg" class="form-control input-lg" value="<?php echo $rownailer['fname']; ?>" size="30" name="fname" readonly>
                                    </div><br><br>

                                    <div class="col-3">
                                        <label>นามสกุล : </label><br>
                                    </div>
                                    <div class="col-9">
                                        <input class="form-control input-lg" class="form-control input-lg" value="<?php echo $rownailer['lname']; ?>" size="30" name="lname" readonly>
                                    </div><br><br>


                                    <div class="col-3">
                                        <label>เบอร์โทรศัพท์ : </label><br>
                                    </div>
                                    <div class="col-9">
                                        <input class="form-control input-lg" type="text" value="<?php echo $rownailer['nailer_tel']; ?> " size="30" name="nailer_tel" readonly>
                                    </div><br><br>
                                </div>
                                <a href="#nailer_edit<?php echo $rownailer['nailer_id']; ?>" data-toggle="modal">
                                    <button type="button" class="btn btn-warning btn-md" type="button">
                                        แก้ไขข้อมูล</button>
                                </a>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div><?php 
    include("../model/nailer_edit.php");


?>

</body>

</html>
<?php include '../function/getNumOfCart.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bowling Nail & Spa. | ร้านทำเล็บและสปา</title>
    <link rel="stylesheet" href="../css.css">
    <link rel="stylesheet" href="../table.css">
    <link rel="stylesheet" href="../css_user.css">
    <link rel="stylesheet" href="../css_breadcrumb.css">
    <link rel="icon" type="image/x-icon" href="../img/bowling-logo.svg" />
    <!-- Google font -->
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
    <header>
        <div>
            <?php include('../header_menubarnail.php'); ?>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-12" id="booknail-header">
                <h2>ขั้นตอนการจองคิวร้านทำเล็บ</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="wrapper">
                    <ul>
                        <li class="active">
                            <a href="booking_nail.php">
                                <i class="fas fa-shopping-basket icon"></i>
                                <p>สินค้าในตะกร้า</p>
                            </a>
                        </li>
                        <li><a href="../booking/booking_nailer.php">
                                <i class="fas fa-calendar-alt icon"></i>
                                <p>เลือกวัน / เวลา / ช่างทำเล็บ</p>
                            </a>
                        </li>
                        <li><a href="booking_payment.php">
                                <i class="fas fa-money-check icon"></i>
                                <p>ชำระเงิน / ยืนยันการจอง</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-2"></div>
        </div><br><br><br>
    </div>
        <div class="row" id="cart_booking">
            <div class="col-1"></div>
            <div class="col-lg-10" id="cartbook">
                <i class="fas fa-shopping-cart"></i>&nbsp;&nbsp; ตะกร้าสินค้า 
                <hr>
            </div>
            <!-- <div class="col-lg-5" id="cartbook">
                <i class="fas fa-shopping-cart"></i>&nbsp;&nbsp; ตะกร้าสปามือและเท้า
                <hr>
            </div> -->
            <div class="col-1"></div>
        </div><br>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-lg-10">
            <table class="table table-striped table-hover" id="table_booking">
                <thead>
                    <th width="10%">รูปภาพ </th>
                    <th width="10%">ชื่อบริการ</th>
                    <th width="10%">รายละเอียด</th>
                    <th width="10%">รูปแบบ</th>
                    <th width="10%">ราคา</th>
                    <th width="5%"></th>
                </thead>
                <tbody>
                    <?php
                    include('../conn/conn.php');
                    $cus_id = $_SESSION['cus_id'];
                    $sqlselect = "SELECT * FROM booking WHERE cus_id = $cus_id and book_status = 0 ORDER BY book_id DESC LIMIT 1";
                    $resultselect = mysqli_query($conn, $sqlselect);
                    $rowselect = mysqli_fetch_array($resultselect);
                    $book_id = $rowselect['book_id'];
                    $numrow = mysqli_num_rows($resultselect);
                    if ($numrow > 0) {
                        $_SESSION['book_id'] = $rowselect['book_id'];
                        $sqldetail = "SELECT * FROM book_nail_detail INNER join service_item on service_item.ST_ID = book_nail_detail.ST_ID 
                                        INNER join nail_set on service_item.ns_id = nail_set.ns_id 
                                        WHERE  book_id = $book_id";
                        $resultdetail = mysqli_query($conn, $sqldetail);

                        while ($rowdetail = mysqli_fetch_array($resultdetail)) { ?>
                            <tr>
                                <td width="10%"><img width=50 src="<?php echo $rowdetail['file'] ?>"></th>
                                <td width="10%"><?php echo $rowdetail['name'] ?></td>
                                <td width="20%"><?php echo $rowdetail['detail'] ?></td>
                                <td width="10%"><?php echo $rowdetail['ns_name'] ?></td>
                                <td width="10%"><?php echo $rowdetail['price'] ?></td>
                                <td style="width:8%;">
                                    <span>
                                        <a href="#delbook<?php echo $rowdetail['bd_id']; ?>" data-toggle="modal" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-trash"></span>ลบ </a>
                                        <?php include('../model/booking_model.php'); ?>

                                    </span>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
                <br><br>

            </table>
            <br><br>
            </div>
            
            <!-- <div class="col-lg-5">
            <table class="table table-striped table-hover" id="table_booking">
                <thead>
                    

                    <th width="10%">รูปภาพ </th>
                    <th width="10%">ชื่อลาย</th>
                    <th width="10%">รายละเอียด</th>
                    <th width="10%">รูปแบบ</th>
                    <th width="10%">ราคา</th>
                    <th width="5%"></th>
                </thead>
                <tbody>
                    <?php
                    include('../conn/conn.php');
                    $cus_id = $_SESSION['cus_id'];
                    $sqlselect = "SELECT * FROM booking WHERE cus_id = $cus_id and book_status = 0 ORDER BY book_id DESC LIMIT 1";
                    $resultselect = mysqli_query($conn, $sqlselect);
                    $numrow = mysqli_num_rows($resultselect);
                    if ($numrow > 0) {
                        $rowselect = mysqli_fetch_array($resultselect);
                        $book_id = $rowselect['book_id'];
                        $sqldetail = "SELECT * FROM book_nail_detail INNER join service_item on service_item.ST_ID =  book_nail_detail.ST_ID 
                                        INNER join nail_set on service_item.ns_id = nail_set.ns_id 
                                        WHERE service_item.S_ID != 1 and service_item.S_ID != 2 and service_item.S_ID != 3 
                                        and service_item.S_ID != 4 and service_item.S_ID != 5 and book_id = $book_id";
                        $resultdetail = mysqli_query($conn, $sqldetail);

                        while ($rowdetail = mysqli_fetch_array($resultdetail)) { ?>
                            <tr>
                                <td width="10%"><img width=50 src="<?php echo $rowdetail['file'] ?>"></th>
                                <td width="10%"><?php echo $rowdetail['name'] ?></td>
                                <td width="20%"><?php echo $rowdetail['detail'] ?></td>
                                <td width="10%"><?php echo $rowdetail['ns_name'] ?></td>
                                <td width="10%"><?php echo $rowdetail['price'] ?></td>
                                <td style="width:8%;">
                                    <span>
                                        <a href="#delbook<?php echo $rowdetail['bd_id']; ?>" data-toggle="modal" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-trash"></span>ลบ </a>
                                        <?php include('../model/booking_model.php'); ?>
                                    </span>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
                <br><br>
            </table>
            <br><br>
            </div> -->
            <div class="col-1"></div>
        </div>

        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button id="btnback" type="button" class="btn btn-secondary btn-md" disabled>ย้อนกลับ</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="booking_nailer.php">
                        <button id="btnnext" type="button" class="btn btn-outline-danger btn-md" type="button"> หน้าถัดไป</button>
                    </a>
                </div>
            </div>
            <div class="col-4"></div>
        </div>

        <?php include('../model/main_model.php'); ?>

        <br><br>
    <div>
        <?php include('../footer.php'); ?>
    </div>
</body>

</html>
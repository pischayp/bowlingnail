<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bowling Nail & Spa. | ร้านทำเล็บและสปา</title>
    <link rel="stylesheet" href="../css.css">
    <link rel="stylesheet" href="../table.css">
    <link rel="stylesheet" href="../css_user.css">
    <link rel="icon" type="image/x-icon" href="../img/bowling-logo.svg" />
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
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
            <div class="col-4"></div>
            <div class="col-4" id="user-header">
                <p>ตรวจสอบสถานะการจอง</p>
                <h6>ร้านทำเล็บ Bowling Nail and Spa.</h6>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-striped table-hover">
                <thead>
                    <th width="30%"><i class="bi bi-circle-fill"></i> ข้อมูล และรายละเอียดบริการ</th>
                    <th width="10%"><i class="bi bi-circle-fill"></i> วันและเวลาที่จอง</th>
                    <th width="10%"><i class="bi bi-circle-fill"></i> ช่างทำเล็บ</th>
                    <th width="10%"><i class="bi bi-circle-fill"></i> ราคารวมทั้งหมด</th>
                    <th width="15%"><i class="bi bi-circle-fill"></i> สถานะการจอง</th>
                </thead>

                <tbody>
                    <?php
                    $cus_id =  $_SESSION["cus_id"];
                    include('../conn/conn.php');
                    $query =  "SELECT * FROM booking
                        INNER JOIN book_nail_detail on book_nail_detail.book_id=booking.book_id
                        INNER JOIN nailer on book_nail_detail.nailer_id = nailer.nailer_id 
                        where booking.cus_id='$cus_id' 
                        group by booking.book_id
                        Order by book_date DESC";

                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        $book_id = $row['book_id'];
                       
                    ?>
                        <tr>
                        
                            <td data-label="รายละเอียดสินค้า">
                                <?php
                                $sqldetail = "SELECT * FROM book_nail_detail
                                INNER JOIN booking ON book_nail_detail.book_id=booking.book_id 
                                INNER JOIN service_item on book_nail_detail.st_id = service_item.st_id   
                                INNER JOIN nail_set on nail_set.ns_id = service_item.ns_id 
                                INNER JOIN nail_type on nail_type.nt_id = service_item.nt_id  
                                where book_nail_detail.book_id = $book_id ";
                                $resultdetail = mysqli_query($conn, $sqldetail);
                                while ($rowdetail = mysqli_fetch_array($resultdetail)) { ?>
                               
                                <?php
                               
                                    if ($rowdetail['ST_ID'] == 82) {
                                        
                                    ?>
                                        <img class="img-responsive" src="<?php echo $rowdetail['cus_file'] ?>" width="70px" />
                                    
                                    <?php
                                    } else {
                                    ?>
                                          <img class="img-responsive" src="<?php echo $rowdetail['file'] ?>" width="70px" />
                                       
                                    <?php
                                    }


                                    ?>
                                  
                                   

                                    <b class="user_word"> สินค้า : </b><?php echo $rowdetail['name']; ?>
                                    ( <?php echo $rowdetail['ns_name']; ?>,
                                    <?php echo $rowdetail['nt_name']; ?>,
                                    <?php echo $rowdetail['price']; ?> บาท )<br>
                                <?php } ?>

                            </td>

                            <td data-label="วันและเวลาที่จอง">
                                <b class="user_word"><i class="bi bi-calendar2-week"></i> <?php echo $row['book_date']; ?></b><br>
                                <b class="user_word"><i class="bi bi-clock"></i> <?php echo $row['timeslots']; ?></b>
                            </td>
                            <td data-label="ช่างทำเล็บ">
                                <b class="user_word"><i class="bi bi-person"></i> <?php echo $row['nailer_name']; ?></b>
                            </td>
                            <td data-label="ราคารวม">
                                <b class="user_payment"><?php echo $row['total_price']; ?></b> บาท <br>
                            </td>

                            <!-- สถานะ : จองสำเร็จ or กำลังดำเนินการ -->


                            <td data-label="สถานะการจอง">

                                <?php if ($row['nailer_book'] == '0') {
                                    echo '<b><p class="success-wait"><i class="bi bi-clock-history"></i> รอการดำเนินงาน</p></b>';
                                } else if ($row['nailer_book'] == '1') { ?>
                                <?php
                                    echo '<b><p class="success-work"><i class="bi bi-hourglass-split"></i> กำลังดำเนินงาน</p></b>';
                                } else { ?>
                                    <?php
                                    echo '<b><p class="success-con"><i class="bi bi-check-lg"></i> ทำงานเสร็จสิ้น <b>'; ?>
                                <?php  }
                                ?>
                            </td>
                            <!-- <td data-label="รูปแบบการชำระเงิน">
                                <?php if ($row['payment_status'] == '0') {
                                    echo '<i class="bi bi-cash-coin"></i> ชำระเงินโดยจ่ายเงินสด';
                                } else { ?>
                                  <img class="img-responsive img-thumbnail" src="<?php echo $row['slip'] ?>" /> 
                                <?php } ?>
                                    
                            </td> -->
                        </tr>
                    <?php
                    
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <br><br>
        <div class="col-md-1"></div>
    </div>


</body>

</html>
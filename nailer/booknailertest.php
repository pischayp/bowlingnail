<?php include '../function/getNumOfCart.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bowling Nail & Spa. | ร้านทำเล็บและสปา</title>
    <link rel="stylesheet" href="../css.css">
    <link rel="stylesheet" href="../css_user.css">
    <link rel="stylesheet" href="../css_nailer.css">
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

    <script>
        
    </script>
</head>
<body>
    <header>
        <div>
            <?php include('../header_menubarnail.php'); ?>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-12" id="booknailer-header">
                <h2>ขั้นตอนการจองคิวร้านทำเล็บ</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="wrapper">
                    <ul>
                        <li><a href="../booking/booking_nail.php">
                                <i class="fas fa-shopping-basket icon"></i>
                                <p>สินค้าในตะกร้า</p>
                            </a></li>

                        <li class="active"><a href="booking_nailer.php">
                                <i class="fas fa-calendar-alt icon"></i>
                                <p>เลือกวัน / เวลา และช่างทำเล็บ</p>
                            </a></li>

                        <li><a href="../booking/booking_payment.php">
                                <i class="fas fa-money-check icon"></i>
                                <p>ชำระเงิน / ยืนยันการจอง</p>
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-2"></div>
        </div> <br><br>


        <div class="row">
            <div class="col-4">
                <div class="select-day">
                    <form action="booking_nailer.php" method="GET">
                        <div class="row-check">
                            <?php
                            $query1 = "SELECT * FROM book_nail_detail ";
                            $date = mysqli_query($conn, $query1); ?>
                            <div>
                                <label class="pickdatestr"><i class="bi bi-calendar2-week"></i> &nbsp;กรุณาเลือกวันที่ต้องการจอง : </label>
                            </div>
                            <div>
                                <input name="bookingdate" class="form-control" type="date" value="0000-00-00" id="date" name="date" min='1899-01-01' max='3000-12-12' required>
                                <script>
                                    var today = new Date();
                                    var dd = today.getDate() + 1;
                                    var mm = today.getMonth() + 1; //January is 0!
                                    var yyyy = today.getFullYear();
                                    if (dd < 10) {
                                        dd = '0' + dd
                                    }
                                    if (mm < 10) {
                                        mm = '0' + mm
                                    }
                                    today = yyyy + '-' + mm + '-' + dd;
                                    document.getElementById("date").setAttribute("min", today);
                                </script>

                                <input class="btn-date" type="submit" value="ยืนยัน">
                            </div>
                            <hr>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-8">
                <?php
                $sqlselect = "SELECT * FROM booking WHERE cus_id = $cus_id ORDER BY book_id DESC LIMIT 1";
                $resultselect = mysqli_query($conn, $sqlselect);
                $rowselect = mysqli_fetch_array($resultselect);
                $book_id = $rowselect['book_id'];

                ?>
                <form action="../conn/conn_bookingstep2.php?cus_id=<?php echo $cus_id ?>&book_id=<?php echo $book_id ?>" method="POST">
                    <?php if (isset($_GET['bookingdate'])) {
                        $date = $_GET['bookingdate'];
                    ?>
                        <input style="display: none;" type="date" name="date3" value="<?php echo $date ?>">
                        <div>
                            <label class="pickdatestr"><i class="bi bi-calendar2-week"></i> &nbsp;วันที่เลือกจอง : <?php echo $date ?> </label>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row" id="choose-date">
                                            <input class="date" type="text" name="date" value="<?php echo $date ?>">
                                            <?php
                                            $n = 1;
                                            include('../conn/conn.php');
                                            $query2 = mysqli_query($conn, "select * from nailer where nailer_id = 1");
                                            while ($row1 = mysqli_fetch_array($query2)) {
                                                $nailerid = $row1['nailer_id'];
                                            ?>
                                                <div class="col-md-4">
                                                    <div>
                                                        <img src="<?php echo $row1['nailer_picture'] ?>" class="img-fluid rounded-start" width="90%">
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <p class="card-text">
                                                    <p class="name">
                                                        <i class="fas fa-id-card"></i> &nbsp;&nbsp;<?php echo $row1['nailer_name']; ?>
                                                    </p>
                                                    <a href="..">กดเพื่อดูโปรไฟล์ช่างทำเล็บ</a>
                                                    </p>
                                                    </ /?php $arraytmend=array(); $arraytmstr=array(); $qr_allDetail=mysqli_query($conn, "select * from book_nail_detail WHERE nailer_id = $nailerid AND date_add = '$date'" ); while ($row_allDetail=mysqli_fetch_array($qr_allDetail)) { $allDetaildate=$row_allDetail['date_add']; $timestart=date("H", strtotime($row_allDetail['time_start'])); $timeend=date("H", strtotime($row_allDetail['time_end'])); array_push($arraytmstr, $timestart); array_push($arraytmend, $timeend); } ?>
                                                    <div class="content-nailer">
                                                        <div class="dp">
                                                            <div class="py">
                                                                <input class="option-input radio" name="radionailer" type="radio" 
                                                                        value="<?php echo $row1['nailer_id'] ?>" checked="checked" required/>
                                                                        &nbsp;&nbsp; เลือกช่างทำเล็บ
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                        <label class="label nailer1" for="clocknailer1">
                                                            <i class="bi bi-alarm"></i>
                                                            &nbsp;&nbsp;เลือกเวลาของช่างทำเล็บ :
                                                        </label>
                                                        <!-- <input class="clocknailer1" id="clocknailer1" /> -->
                                                    
                                                        <!-- <label class="timenailer"><i class="bi bi-alarm"></i>
                                                            &nbsp;&nbsp;เลือกเวลาของช่างทำเล็บ :
                                                        </label><br> -->

                                                        <?php
                                                        $startTime = [];
                                                        // $select = ["10:00-11:00", "16:00-17:00"];
                                                        $select_date = $_GET['bookingdate'];
                                                        $chknailer = $row1['nailer_id'];
                                                        $sql = "SELECT * from booking
                                                        INNER JOIN book_nail_detail ON book_nail_detail.book_id=booking.book_id
                                                        where booking.book_date = '$select_date' and  book_nail_detail.nailer_id=$chknailer ";
                                                        // $query = '10:00-11:00,16:00-17:00';
                                                        $result_emp1 = mysqli_query($conn, $sql);
                                                        while ($query_emp1 = mysqli_fetch_assoc($result_emp1)) {
                                                            $chktmslot = $query_emp1['timeslots'];
                                                            $select = explode(",", $chktmslot);
                                                            // print_r($select);
                                                            foreach ($select as $element) {
                                                                // echo $element;
                                                                array_push($startTime, explode("-", $element)[0]);
                                                            }
                                                        }
                                                        // print_r($startTime);

                                                        // while($row=mysqli_fetch_assoc($result)){
                                                        //     print_r($row);
                                                        // }
                                                        // print_r($select);
                                                        // print_r($startTime);
                                                        $time = ["10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00"];
                                                        for ($i = 0; $i < count($time) - 1; $i++) {
                                                        ?>
                                                        <!-- <input class="clocknailer1" id="clocknailer1" type="radio" /> -->
                                                            <div class="content-nailer">
                                                                <div class="dp">
                                                                    <div class="option">
                                                                        <label for="timeslot">
                                                                            <!-- radio button /css ให้กูเหมือนกดไม่ได้g -->
                                                                            <input class="option-input radio"  type="radio" name="timeslot[]" 
                                                                            <?php echo in_array($time[$i], $startTime) ? 'readonly disabled' : $time[$i] ?> value="<?php echo $time[$i] ?> ">
                                                                            <?php if (in_array($time[$i], $startTime)) { ?>

                                                                                <?php echo '<span class="non-clock">' . $time[$i] ?> - <?php echo $time[$i + 1] . '</span>';
                                                                                                                                    } else {
                                                                                                                                        echo '<span>' . $time[$i] ?> - <?php echo $time[$i + 1] . '</span>';
                                                                                                                                    } ?>

                                                                            <!-- <span class="non-clock"> -->
                                                                            <?php if (in_array($time[$i], $startTime)) { ?>
                                                                                <!-- </span> -->
                                                                                <span class="non-work">(ไม่ว่าง)</span>
                                                                                <!-- css radio button -->
                                                                            <?php } ?>
                                                                            <!-- radio button ที่ลูกค้าเลือกเวลาไปแล้ว เขียนไม่ว่าง -->
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                        <?php
                                                        }
                                                        $i++;
                                                        ?>
                                                    
                                                </div>
                                            <?php
                                            }
                                            $n++
                                            ?>
                                        </div>
                                        <div class="row">
                                        <div class="col-4">
                                                        <label class="label nailer1" for="clocknailer1">
                                                            <i class="bi bi-alarm"></i>
                                                            &nbsp;&nbsp;เลือกเวลาของช่างทำเล็บ :
                                                        </label>
                                                        <!-- <input class="clocknailer1" id="clocknailer1" /> -->
                                                    
                                                        <!-- <label class="timenailer"><i class="bi bi-alarm"></i>
                                                            &nbsp;&nbsp;เลือกเวลาของช่างทำเล็บ :
                                                        </label><br> -->

                                                        <?php
                                                        $startTime = [];
                                                        // $select = ["10:00-11:00", "16:00-17:00"];
                                                        $select_date = $_GET['bookingdate'];
                                                        $chknailer = $row1['nailer_id'];
                                                        $sql = "SELECT * from booking
                                                        INNER JOIN book_nail_detail ON book_nail_detail.book_id=booking.book_id
                                                        where booking.book_date = '$select_date' and  book_nail_detail.nailer_id=$chknailer ";
                                                        // $query = '10:00-11:00,16:00-17:00';
                                                        $result_emp1 = mysqli_query($conn, $sql);
                                                        while ($query_emp1 = mysqli_fetch_assoc($result_emp1)) {
                                                            $chktmslot = $query_emp1['timeslots'];
                                                            $select = explode(",", $chktmslot);
                                                            // print_r($select);
                                                            foreach ($select as $element) {
                                                                // echo $element;
                                                                array_push($startTime, explode("-", $element)[0]);
                                                            }
                                                        }
                                                        // print_r($startTime);

                                                        // while($row=mysqli_fetch_assoc($result)){
                                                        //     print_r($row);
                                                        // }
                                                        // print_r($select);
                                                        // print_r($startTime);
                                                        $time = ["10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00"];
                                                        for ($i = 0; $i < count($time) - 1; $i++) {
                                                        ?>
                                                        <!-- <input class="clocknailer1" id="clocknailer1" type="radio" /> -->
                                                            <div class="content-nailer">
                                                                <div class="dp">
                                                                    <div class="option">
                                                                        <label for="timeslot">
                                                                            <!-- radio button /css ให้กูเหมือนกดไม่ได้g -->
                                                                            <input class="option-input radio"  type="radio" name="timeslot[]" 
                                                                            <?php echo in_array($time[$i], $startTime) ? 'readonly disabled' : $time[$i] ?> value="<?php echo $time[$i] ?> ">
                                                                            <?php if (in_array($time[$i], $startTime)) { ?>

                                                                                <?php echo '<span class="non-clock">' . $time[$i] ?> - <?php echo $time[$i + 1] . '</span>';
                                                                                                                                    } else {
                                                                                                                                        echo '<span>' . $time[$i] ?> - <?php echo $time[$i + 1] . '</span>';
                                                                                                                                    } ?>

                                                                            <!-- <span class="non-clock"> -->
                                                                            <?php if (in_array($time[$i], $startTime)) { ?>
                                                                                <!-- </span> -->
                                                                                <span class="non-work">(ไม่ว่าง)</span>
                                                                                <!-- css radio button -->
                                                                            <?php } ?>
                                                                            <!-- radio button ที่ลูกค้าเลือกเวลาไปแล้ว เขียนไม่ว่าง -->
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                        <?php
                                                        }
                                                        $i++;
                                                        ?>
                                                    
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row" id="choose-date">
                                            <input class="date" type="text" name="date" value="<?php echo $date ?>">
                                            <?php
                                            $n = 1;
                                            include('../conn/conn.php');
                                            $query2 = mysqli_query($conn, "select * from nailer where nailer_id=2");
                                            while ($row2 = mysqli_fetch_array($query2)) {
                                                $nailerid = $row2['nailer_id'];
                                            ?>
                                                <div class="col-md-4">
                                                    <div>
                                                        <img src="<?php echo $row2['nailer_picture'] ?>" class="img-fluid rounded-start" width="90%">
                                                    </div>

                                                </div>
                                                <div class="col-4">
                                                    <p class="card-text">
                                                    <p class="name">
                                                        <i class="fas fa-id-card"></i> &nbsp;&nbsp;<?php echo $row2['nailer_name']; ?>
                                                    </p>
                                                    <a href="..">กดเพื่อดูโปรไฟล์ช่างทำเล็บ</a>
                                                    </p>
                                                    </ /?php $arraytmend=array(); $arraytmstr=array(); $qr_allDetail=mysqli_query($conn, "select * from book_nail_detail WHERE nailer_id = $nailerid AND date_add = '$date'" ); while ($row_allDetail=mysqli_fetch_array($qr_allDetail)) { $allDetaildate=$row_allDetail['date_add']; $timestart=date("H", strtotime($row_allDetail['time_start'])); $timeend=date("H", strtotime($row_allDetail['time_end'])); array_push($arraytmstr, $timestart); array_push($arraytmend, $timeend); } ?>
                                                    <div class="content-nailer">
                                                        <div class="dp">
                                                            <div class="py">
                                                            
                                                            <input class="option-input radio" name="radionailer" id="show-nailer2" type="radio" 
                                                                        value="<?php echo $row1['nailer_id'] ?>" required/>
                                                                <label class="label" for="show-nailer2">เลือกช่างทำเล็บ</label>
                                                                <br>

                                                                <!-- <input class="option-input radio"  type="radio" name="radionailer" 
                                                                    value="<?php echo $row2['nailer_id'] ?>" required />
                                                                    <label>&nbsp;&nbsp; เลือกช่างทำเล็บ </label> -->
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label class="label nailer2" for="clocknailer2">
                                                        <i class="bi bi-alarm"></i>
                                                        &nbsp;&nbsp;เลือกเวลาของช่างทำเล็บ :
                                                    </label>
                                                        <br>
                                                    <!-- <label class="timenailer" for="show-clock2">
                                                        <i class="bi bi-alarm"></i> &nbsp;&nbsp;เลือกเวลาของช่างทำเล็บ :
                                                    </label><br> -->
                                                    <?php

                                                    $startTime2 = [];
                                                    // $select = ["10:00-11:00", "16:00-17:00"];
                                                    $chknailer2 = $row2['nailer_id'];
                                                    $sql = "SELECT * from booking
                                                        INNER JOIN book_nail_detail ON book_nail_detail.book_id=booking.book_id
                                                        where booking.book_date = '$select_date' and  book_nail_detail.nailer_id=$chknailer2 ";
                                                    // $query = '10:00-11:00,16:00-17:00';
                                                    $result_emp2 = mysqli_query($conn, $sql);
                                                    while ($query_emp2 = mysqli_fetch_assoc($result_emp2)) {
                                                        $chktmslot2 = $query_emp2['timeslots'];

                                                        $select2 = explode(",", $chktmslot2);
                                                        // print_r($select);
                                                        foreach ($select2 as $element2) {
                                                            // echo $element;
                                                            array_push($startTime2, explode("-", $element2)[0]);
                                                        }
                                                    }
                                                    // echo($query);
                                                    // exit;
                                                    // print_r($startTime);

                                                    $time2 = ["10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00"];
                                                    for ($i = 0; $i < count($time2) - 1; $i++) {
                                                    ?>
                                                        <div class="content-nailer">
                                                            <div class="dp">
                                                                <div class="option">
                                                                    <label for="timeslot">
                                                                        
                                                                        <input class="option-input radio" id="clocknailer2" type="radio" name="timeslot[]" 
                                                                        <?php echo in_array($time2[$i], $startTime2) ?
                                                                            'readonly disabled'  : $time[$i] ?> value="<?php echo $time[$i] ?>">
                                                                        <?php if (in_array($time2[$i], $startTime2)) { ?>
                                                                            <?php echo '<span class="non-clock">' . $time2[$i] ?> - <?php echo $time2[$i + 1] . '</span>';
                                                                                                                                } else {
                                                                                                                                    echo '<span>' . $time2[$i] ?> - <?php echo $time2[$i + 1] . '</span>';
                                                                                                                                } ?>
                                                                        <?php if (in_array($time2[$i], $startTime2)) { ?>
                                                                            <!-- </span> -->
                                                                            <span class="non-work">(ไม่ว่าง)</span>
                                                                            <!-- css radio button -->
                                                                        <?php } ?>
                                                                        
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                    <?php
                                                    }
                                                    $i++;
                                                    ?>
                                                
                                            </div>
                                        </div>
                                    <?php
                                            }
                                            $n++
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4" style="width:100%">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <a href="booking_nail.php">
                                        <button id="btnback" type="button" class="btn btn-danger btn-xs">ย้อนกลับ</button>
                                    </a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="../booking/booking_payment.php">
                                        <button id="btnnext" type="submit" class="btn btn-outline-danger btn-xs" type="button">หน้าถัดไป</button>
                                    </a>
                                </div>
                            </div>
                            <div class="col-4"></div>
                        </div>

                    <?php } ?>
                    <?php include('../model/main_model.php'); ?>
            </div>
            </form>
        </div>
    </div>
    </div>
    <br>

    <div>
        <?php include('../footer.php'); ?>
    </div>
</body>

</html>
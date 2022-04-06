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
    <link rel="stylesheet" href="../table.css">
    <link rel="stylesheet" href="../table_card.css">
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

    <div class="container--fluid" id="header_nailer">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10" id="hr-nailer">
                <h2>รายการดำเนินการของช่างทำเล็บ</h2>
                <h6>ร้านทำเล็บ Bowling Nail and Spa.</h6>
            </div>
            <div class="col-1"></div>
        </div><br>


        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <table class="table table-striped table-hover w-100">
                    <thead class="header-table" width="100%">
                        <tr>
                            <th scope="col" width="20%"><i class="bi bi-circle-fill"></i> ข้อมูลการจองลูกค้า</th>
                            <th scope="col" width="25%"><i class="bi bi-circle-fill"></i> รายละเอียดสินค้า</th>
                            <th scope="col" width="10%"><i class="bi bi-circle-fill"></i> ราคารวม</th>
                            <th scope="col" width="20%"><i class="bi bi-circle-fill"></i> สถานะการทำงาน</th>
                        </tr>
                    </thead>

                    <tbody class="header-table">
                        <?php
                        include('../conn/conn.php');
                        $nailer_id =  $_SESSION["nailer_id"];
                        
                        $sql = "SELECT * FROM booking
                        INNER JOIN book_nail_detail ON book_nail_detail.book_id=booking.book_id
                        INNER JOIN customer ON booking.cus_id=customer.cus_id
                        INNER JOIN nailer ON book_nail_detail.nailer_id=nailer.nailer_id 
                        where nailer.nailer_id = $nailer_id 
                        group by booking.book_id
                        order by book_nail_detail.book_id desc ";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            $booking_id = $row["book_id"]; ?>
                            

                            <tr>
                                <td data-label="ข้อมูลลูกค้า" class="icon-data">
                                    <b><i class="bi bi-journal-check"></i> รหัสการจอง : </b> <?php echo $row['book_id']; ?><br>
                                    <b><i class="bi bi-person"></i> ชื่อลูกค้า : </b> <?php echo $row['username']; ?> <br>
                                    <b><i class="bi bi-calendar2-week"></i> วันที่จอง : </b> <?php echo $row['date_add']; ?> <br>
                                    <b><i class="bi bi-clock"></i> เวลาที่จอง : </b> <?php echo $row['timeslots']; ?>
                                </td>

                                <td data-label="รายละเอียดสินค้า">

                                    <?php
                                   
                                    $sqldetail = "SELECT * FROM book_nail_detail
                                    INNER JOIN booking ON book_nail_detail.book_id=booking.book_id 
                                    INNER JOIN service_item on book_nail_detail.st_id = service_item.st_id  
                                    INNER JOIN nail_set on nail_set.ns_id = service_item.ns_id 
                                    INNER JOIN nail_type on nail_type.nt_id = service_item.nt_id  
                                    where book_nail_detail.book_id = $booking_id";
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
                                        
                                       
                                        <b> สินค้า : </b><?php echo $rowdetail['name']; ?><br><br>
                                        <!-- <b> รายละเอียด : </b><?php echo $rowdetail['detail']; ?><br> -->
                                    <?php } ?>
                                </td>

                                <td data-label="ราคา"><?php echo $row['total_price']; ?> บาท</td>
                                <td data-label="สถานะการทำงาน" class="working-success">
                                        <?php 
                                            if ($row['nailer_book'] == '0') {
                                                echo '';
                                        ?>
                                            <a href="../conn/conn_working.php?book_id=<?php echo $row["book_id"] ?>&nailer_book=1" 
                                            class="btn btn-outline-primary"><i class="bi bi-clock-history"></i> เริ่มการดำเนินงาน</a>
                                        <?php } 
                                            else if($row['nailer_book'] == '1'){ 
                                                echo '<p class="success-work"><i class="bi bi-hourglass-split"></i> กำลังดำเนินงาน...</p>';
                                        ?>  
                                            
                                            <a href="../conn/conn_worksuccess.php?book_id=<?php echo $row["book_id"] ?>&nailer_book=2" 
                                            id="success-con" class="btn btn-outline-success">ยืนยันการดำเนินงานเสร็จสิ้น</a>
                                        <?php } 
                                            else {
                                         echo '<b class="success-con"><p><i class="bi bi-check-circle"></i> ดำเนินงานเสร็จสิ้น</p></b>';
                                    }
                                    ?>
                                </td>

                            <?php
                        }
                            ?>
                            </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-1"></div>
        </div><br>

    </div>
</body>
</html>
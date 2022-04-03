
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
                <thead href="#payment_model.php">
                    <th width="7%">รูปภาพ</th>
                    <th width="7%">ชื่อสินค้า</th>
                    <!-- <th width="15%">รายละเอียด</th>
                    <th width="15%">ประเภทและรูปแบบ</th> -->
                    <th width="10%">ช่างทำเล็บ</th>
                    <th width="10%">วันที่จอง</th>
                    <th width="10%">เวลาที่จอง</th>
                    <th width="5%">ราคา</th>
                    <th width="7%">ราคารวม</th> 
                    <!-- <th width="7%">มัดจำ</th> 
                    <th width="7%">คงเหลือ</th>  -->
                    <!-- <th width="15%">สลิปการโอน</th> -->
                    <!-- <th width="15%">สถานะ</th>  -->
                </thead>

                <span class="span-table">
                    <tbody>
                        <?php
                    $cus_id =  $_SESSION["cus_id"];
                    $book_id =  $_SESSION["book_id"];
                    
                    include('../conn/conn.php');
                   
                    $nailsum = 0;
                    $nailset = 0;
                    $sumqty = 0;
                    $sumprice =0;
                    $total = 0;
                    $qty =0;
                    $query = "SELECT * FROM book_nail_detail JOIN service_item on book_nail_detail.st_id = service_item.st_id 
                    JOIN booking on book_nail_detail.book_id = booking.book_id WHERE booking.book_id ='$book_id'";
                    $resultsumprice = mysqli_query($conn, $query);
                    while ($row1 = mysqli_fetch_array($resultsumprice)) {
                      $cus_price = $row1['cus_price'];
                      $price = $row1['price'];
                      
                      $sumprice +=  (int)$row1['price'];
                  }
                  
                    $query= "SELECT * FROM booking INNER JOIN customer on booking.cus_id=customer.cus_id 
                    INNER JOIN book_nail_detail on book_nail_detail.book_id=booking.book_id 
                    JOIN service_item on book_nail_detail.st_id = service_item.st_id  
                    JOIN nailer on book_nail_detail.nailer_id = nailer.nailer_id 
                    JOIN nail_set on nail_set.ns_id = service_item.ns_id 
                    JOIN nail_type on nail_type.nt_id = service_item.nt_id where customer.cus_id='$cus_id' Order by book_date DESC";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) { 
                        $cus_id = $row['cus_id'];                  
                            ?>
                        <tr>
                            <td>
                                <img class="img-responsive img-thumbnail" src="<?php echo $row['file'] ?>" />
                            </td>
                            <td><?php echo $row['name']; ?></td>
                            <!-- <td><?php echo $row['detail']; ?></td> -->
                            <!-- <td>
                                ประเภท : <?php echo $row['ns_name']; ?><br>
                                รูปแบบ : <?php echo $row['nt_name']; ?>
                            </td> -->
                            <td><?php echo $row['nailer_name']; ?></td>
                            <td><?php echo $row['book_date']; ?></td>
                            <td><?php echo $row['timeslots']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td> <?php echo $sumprice; ?></td>
                            <!-- <td><?php echo ($sumprice*0.5); ?></td>
                            <td><?php echo ($sumprice*0.5); ?></td> -->
                            
                            <!-- <td>
                                <img class="img-responsive img-thumbnail" src="<?php echo $row['slip'] ?>" />
                            </td> -->
                            <!-- <td><?php echo $row['book_status']; ?></td> -->
                            

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


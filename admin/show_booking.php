
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../header_admin.php";?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bowling Nail & Spa. | ร้านทำเล็บและสปา</title>
    <link rel="icon" type="image/x-icon" href="../img/bowling-logo.svg" />
    <!-- Google font -->
    <link rel="stylesheet" href="../css.css">
    <link rel="stylesheet" href="../css_admin.css">
    <link rel="stylesheet" href="../table.css">
    <link rel="stylesheet" href="../table_card.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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

        <?php
        $Key_id = null;
        if(isset($_POST["txtKeyword"]))
        {
            $Key_id = $_POST["txtKeyword"];
        }
        ?>

</head>
<body>

    <div class="container-fluid">
        <div class="row" id="header-user">
            <div class="col-md-12">
                <h2>ข้อมูลการจองของลูกค้า</h2>
            </div>
        </div>
 
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" id="search">
                <form method="POST">
                    <input class="form-control" name="txtKeyword" type="text" id="txtKeyword" 
                        placeholder="กรุณากรอกรหัสการจอง.." value="<?php echo $Key_id;?>">
                    <button type="submit" value="ค้นหา"  id="btn-search" class="btn btn-info" >ค้นหา</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div><br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">

                <table class="table table-striped table-hover" width="100%">
                    <thead href="#payment_model.php">
                        <!-- อาจจะใส่รูป -->
                        <!-- <th></th>  -->
                        <!-- <th width="2%">ลำดับ</th> -->
                        <th scope="col" width="5%">รหัส</th>
                        <th scope="col" width="10%">ชื่อลูกค้า</th>
                        <th scope="col" width="12%">วันและเวลาที่จอง</th>
                        <th scope="col" width="13%">รายละเอียดการจอง</th>
                        <th scope="col" width="7%">ราคารวม</th>
                        <th scope="col" width="15%">วันและเวลาที่ชำระ</th>
                        <!-- <th scope="col" width="5%">มัดจำ</th>
                        <th scope="col" width="10%">ยอดคงเหลือ</th> -->
                        <th scope="col" width="10%">สลิปการโอน</th>
                        <th scope="col" width="7%">สถานะ</th>
                    </thead>

                    <span>
                        <tbody>
                            <?php
                        include('../conn/conn.php');
                        $query=mysqli_query($conn,"SELECT * from booking 
                        join customer on (customer.cus_id=booking.cus_id)
                        WHERE slip!=''Order by book_id DESC ") ;
                        while($row=mysqli_fetch_array($query)){
                            

                            ?>
                            <tr>
                                <td data-label="รหัส"><?php echo $row['book_id']; ?></td>
                                <td data-label="ชื่อลูกค้า"><?php echo $row['username']; ?></td>
                                <td data-label="วันและเวลาที่จอง">
                                    <i class="bi bi-calendar-check"></i> <?php echo $row['book_date']; ?><br>
                                    <i class="bi bi-alarm"></i> <?php echo $row['timeslots']; ?>
                                </td>
                                <td data-label="">
                                    
                                </td>
                                <td data-label="ราคารวม"><?php echo $row['total_price']; ?></td>
                                <td data-label="วันและเวลาที่ชำระ">
                                    <i class="bi bi-calendar-check"></i> <?php echo $row['paid_date']; ?><br>
                                    <i class="bi bi-alarm"></i> <?php echo $row['paid_time']; ?>
                                </td>
                                <!-- <td data-label="มัดจำ"><?php echo $row['amount_paid']; ?></td>
                                <td data-label="ยอดคงเหลือ"><?php echo $row['amount_left']; ?></td> -->
                                <td data-label="สลิปการโอน">
                                    <img class="img-responsive img-thumbnail" src="<?php echo $row['slip'] ?>" />
                                </td>
                                <td data-label="สถานะ">
                                    <?php if($row['status_id']=='0') {
                                ?>

                                    <a href="#payment<?php echo $row['book_id']; ?>" class="btn btn-primary"
                                        data-toggle="modal"></i> ยืนยันการจอง</a>
                                    <?php include('../model/payment_model.php'); ?>
                                    <?php
                                }else if($row['status_id']=='1') {
                                ?>
                                    <p class="success"><i class="bi bi-check-circle-fill" id="icon"></i>  ชำระเงินเรียบร้อย</p>
                                    <?php
                                }
                                ?>
                                </td>

                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                </table>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    
    
</body>
</html>
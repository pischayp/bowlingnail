
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
        <div class="row" id="show-record">
            <div class="col-md-12">
                <h2>ประวัติการจองของลูกค้า</h2>
            </div>
        </div>



        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" id="search">
                <form method="POST">
                    <input class="form-control" name="txtKeyword" type="text" id="txtKeyword" placeholder="กรุณากรอกรหัสสมาชิก" value="<?php echo $Key_id; ?>">
                    <button type="submit" value="ค้นหา" class="btn btn-info">ค้นหา</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div><br>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <table class="table table-striped table-hover w-100">
                    <thead class="header-table">
                        <!-- อาจจะใส่รูป -->
                        
                        <!-- <th scope="col" width="10%">รหัสการจอง</th> -->
                        <th scope="col" width="10%">ชื่อลูกค้า</th>
                        <th scope="col" width="10%"><i class="bi bi-calendar2-week"></i> วันที่จอง</th>
                        <th scope="col" width="10%"><i class="bi bi-alarm"></i> เวลาที่จอง</th>  
                        <th scope="col" width="15%">รายละเอียดการจอง</th>
                        <th scope="col" width="15%">ช่างทำเล็บ</th>
          
                    </thead>
                    <span>
                        <tbody class="header-table">
                        <?php 
                         include('../conn/conn.php');
                         $n = 1;
                         $sql = "SELECT * FROM book_nail_detail 
                         INNER JOIN booking ON book_nail_detail.book_id=booking.book_id 
                         INNER JOIN customer ON booking.cus_id=customer.cus_id
                         INNER JOIN nailer ON nailer.nailer_id=book_nail_detail.nailer_id
                         INNER JOIN service_item ON service_item.ST_ID=book_nail_detail.ST_ID
                         INNER JOIN service_type ON service_type.S_ID=book_nail_detail.S_ID 
                         
                       ";
                         
                         $result = mysqli_query($conn, $sql);
                         while ($row = mysqli_fetch_array($result)) { ?>
                        </tbody>
                        
                        <!-- <td data-label="รหัสการจอง"><?php echo $row['book_id']; ?></td> -->
                        <td data-label="ชื่อลูกค้า"><?php echo $row['username']; ?></td>
                        <td data-label="วันที่จอง"><?php echo $row['book_date']; ?></td>
                        <td data-label="เวลาที่จอง"><?php echo $row['timeslots']; ?></td>
                        <td data-label="รายละเอียดการจอง">
                            <img src="<?php echo $row['file']; ?>" width="50px"> <br>
                            <?php echo $row['detail']; ?><br>
                            ลายเล็บ : <?php echo $row['S_name']; ?>
                        </td>   
                        <td data-label="ช่างทำเล็บ"><?php echo $row['nailer_name']; ?></td>
                        
                         <?php 
                         }
                         $n++
                         ?>
                </table>
            </div>
            <div class="col-1"></div>
        </div><br>

        <?php include('../model/main_model.php'); ?>
    </div>

    
    
</body>
</html>
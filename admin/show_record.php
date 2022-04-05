
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
            <div class="col-md-1"></div>
            <div class="col-md-10">

                <table class="table table-striped table-hover" width="100%">
                    <thead href="#payment_model.php">
                        <th scope="col" width="15%"><i class="bi bi-circle-fill"></i> ข้อมูลการจองของลูกค้า</th>
                        <th scope="col" width="25%"><i class="bi bi-circle-fill"></i> รายละเอียดสินค้า</th>
                        <th scope="col" width="10%"><i class="bi bi-circle-fill"></i> ราคาทั้งหมด</th>
                        <th scope="col" width="15%"><i class="bi bi-circle-fill"></i> ช่างทำเล็บ</th>
                        <!-- ยังติดเออเร่อ -->
                    </thead>

                    <span>
                        <tbody>
                            <?php            
                            include('../conn/conn.php');
                            $query=mysqli_query($conn,"SELECT * from booking 
                           
                            INNER JOIN customer ON booking.cus_id=customer.cus_id
                            WHERE booking.book_id
                            group by booking.book_id
                            Order by book_id DESC ") ;
                            while($row=mysqli_fetch_array($query)){
                                $book_id = $row['book_id'];   
                            ?>
                            <tr>
                                <td data-label="รายละเอียดการจอง">
                                    <i class="bi bi-journal-check"></i><b> รหัสการจอง : </b><?php echo $row['book_id']; ?><br>
                                    <i class="bi bi-person"></i><b> ชื่อลูกค้า : </b><?php echo $row['username']; ?><br>
                                    <i class="bi bi-calendar-check"></i><b> วันที่จอง : </b><?php echo $row['book_date']; ?><br>
                                    <i class="bi bi-alarm"></i><b> เวลาที่จอง : </b><?php echo $row['timeslots']; ?>
                                </td>

                                <td data-label="รายละเอียดสินค้า">
                                <?php
                                    $sqldetail = "SELECT * FROM book_nail_detail
                                    INNER JOIN booking ON book_nail_detail.book_id=booking.book_id 
                                    INNER JOIN service_item on book_nail_detail.st_id = service_item.st_id  
                                    INNER JOIN nail_set on nail_set.ns_id = service_item.ns_id 
                                    INNER JOIN nail_type on nail_type.nt_id = service_item.nt_id  
                                    where book_nail_detail.book_id = $book_id";
                                    $resultdetail = mysqli_query($conn, $sqldetail);
                                    while ($rowdetail = mysqli_fetch_array($resultdetail)) { ?>
                                    
                                    <img class="img-responsive" src="<?php echo $rowdetail['file'] ?>" width="70px"/>
                                    <b> สินค้า : </b><?php echo $rowdetail['name']; ?> 
                                        (<?php echo $rowdetail['ns_name']; ?>,                                         
                                        <?php echo $rowdetail['price']; ?> บาท)<br>

                                    <?php } ?>
                                </td>

                                <td data-label="ราคารวม"><b><?php echo $row['total_price']; ?></b> บาท</td>                                
                                <td data-label="ช่างทำเล็บ">
                                    <b><i class="bi bi-person"></i> <?php echo $row['nailer_name']; ?></b>
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
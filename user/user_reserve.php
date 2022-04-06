
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bowling Nail & Spa. | ร้านทำเล็บและสปา</title>
    <link rel="stylesheet" href="../css.css">
    <link rel="stylesheet" href="../table.css">
    <link rel="stylesheet" href="../css_user.css">
    <link rel="stylesheet" href="../table_card.css">
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
        <?php include('../header_menuuser.php'); ?>   
    </div>
</header>

    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4" id="user-header">
                <p>ประวัติการจอง</p>
                <h6>ร้านทำเล็บ Bowling Nail and Spa.</h6>
            </div>
            <div class="col-4"></div>
        </div>
    

    <div class="row">
            <div div class="col-md-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <!-- <th width="10%"><i class="bi bi-circle-fill"></i> รูปสินค้า</th> -->
                        <th scope="col" width="25%"><i class="bi bi-circle-fill"></i> ข้อมูล และรายละเอียดบริการ</th>
                        <!-- <th width="20%">รายละเอียด</th> -->
                        <th scope="col" width="10%"><i class="bi bi-circle-fill"></i> ช่างทำเล็บ</th>
                        <th scope="col" width="15%"><i class="bi bi-circle-fill"></i> วันและเวลาที่จอง</th>
                        <th scope="col" width="10%"><i class="bi bi-circle-fill"></i> ราคารวมทั้งหมด</th>
                        <!-- <th scope="col" width="10%"><i class="bi bi-chat-dots"></i> รีวิวที่นี่</th> -->
        
                    </thead>

                    <tbody>
                        
                        <?php
                        $cus_id =  $_SESSION["cus_id"];
                        include('../conn/conn.php');
                        $query=  "SELECT * FROM booking 
                        inner join book_nail_detail on book_nail_detail.book_id=booking.book_id
                        inner join nailer on book_nail_detail.nailer_id=nailer.nailer_id
                        where booking.cus_id='$cus_id'
                        group by booking.book_id
                        Order by booking.book_id DESC";                         
                           
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) { 
                            $book_id = $row['book_id'];               
                        ?>
                        <tr>
                            
                            <td data-label="รายละเอียดสินค้า">
                            <?php
                                $sqldetail = "SELECT * FROM book_nail_detail
                                INNER JOIN booking ON book_nail_detail.book_id=booking.book_id 
                                INNER JOIN service_item on book_nail_detail.ST_ID = service_item.ST_ID 
                                INNER JOIN nail_set on nail_set.ns_id = service_item.ns_id 
                                INNER JOIN nail_type on nail_type.nt_id = service_item.nt_id  
                                where book_nail_detail.book_id = $book_id ORDER BY book_nail_detail.book_id DESC";
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
                                    (<?php echo $rowdetail['ns_name']; ?>, 
                                    <?php echo $rowdetail['nt_name']; ?>)<br>
                                <?php } ?>
                            </td>
                            <td data-label="ช่างทำเล็บ">
                                <b class="user_word"><i class="bi bi-clock"></i> <?php echo $row['nailer_name']; ?></b>
                            </td>
                            <td data-label="วันและเวลาที่จอง">
                                <b class="user_word"><i class="bi bi-calendar2-week"></i> <?php echo $row['book_date']; ?></b><br>
                                <b class="user_word"><i class="bi bi-clock"></i> <?php echo $row['timeslots']; ?></b>
                                
                            </td>
                            <td data-label="ราคารวมทั้งหมด">
                            <!-- <?php echo $row['book_id']; ?> -->
                                <b class="user_word"><?php echo $row['total_price']; ?></b> บาท</td>
                            <!-- <td data-label="รีวิว">
                            <span>
                                <a href="#review1<?php echo $row['bd_id'] ?>" data-toggle="modal" class="btn btn-outline-warning">                                   
                                    <i class="bi bi-star-fill"></i> ให้คะแนน                                   
                                </a>
                                <?php include('../model/modal_review.php'); ?>
                            </span>                                
                            </td> -->
                        </tr>
                        <?php
                        }                
                        ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div><br><br>

    
</body>
</html>


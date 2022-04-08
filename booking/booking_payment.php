<?php include '../function/getNumOfCart.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bowling Nail & Spa. | ร้านทำเล็บและสปา</title>
    <link rel="stylesheet" href="../css.css">
    <link rel="stylesheet" href="../css_user.css">
    <link rel="stylesheet" href="../table.css">
    <link rel="stylesheet" href="../table_card.css">
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
    <style>
        .myDiv {
            display: none;
            padding: 30px;
        }

        #showOne {
            border: 1px solid red;
        }

        #showTwo {
            border: 1px solid green;
        }

        #showThree {
            border: 1px solid blue;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('input[type="radio"]').click(function() {
                var value = $(this).val();
                $("div.myDiv").hide();
                $("#show" + value).show();
            });
        });
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
            <div class="col-md-12" id="payment-header">
                <h2>ขั้นตอนการจองคิวร้านทำเล็บ</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="wrapper">
                    <ul>
                        <li><a href="booking_nail.php">
                                <i class="fas fa-shopping-basket icon"></i>
                                <p>สินค้าในตะกร้า</p>
                            </a></li>

                        <li><a href="../booking/booking_nailer.php">
                                <i class="fas fa-calendar-alt icon"></i>
                                <p>เลือกวัน / เวลา และช่างทำเล็บ</p>
                            </a></li>

                        <li class="active"><a href="booking_payment.php">
                                <i class="fas fa-money-check icon"></i>
                                <p>ชำระเงิน / ยืนยันการจอง</p>
                            </a></li>

                    </ul>
                </div>
            </div>
            <div class="col-2"></div>
        </div><br><br>
    </div><br>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="row" id="cart_booking">
                <div class="col-lg-8" id="cartbook">
                    <i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;รายละเอียดการจอง
                    <hr>
                </div>
                <div class="col-lg-4" id="cartbook">
                    <i class="bi bi-bank"></i>&nbsp;รายละเอียดการชำระเงิน
                    <hr>
                </div>
            
            <div class="col-8">
                <div class="card-body" style="margin-top:-20px;">
                    <table class="table table-striped table-hover" style="text-align:center;  width:100%; background-color:white;">
                        <thead>
                            <th scope="col" width="10%">รูปภาพ</th>
                            <th scope="col" width="15%">ชื่อบริการ</th>
                            <!-- <th width="20%">รายละเอียด</th> -->
                            <th scope="col" width="15%">รูปแบบ</th>
                            <th scope="col" width="15%">วันที่จอง</th>
                            <th scope="col" width="15%">เวลาที่จอง</th>
                            <th scope="col" width="15%">ช่างทำเล็บ</th>
                            <th scope="col" width="10%">ราคา</th>
                        </thead>
                        <tbody>
                            <?php
                            include('../conn/conn.php');
                            $cus_id = $_SESSION['cus_id'];
                            $sqlselect = "SELECT * FROM booking WHERE cus_id = $cus_id and book_status = 0 ORDER BY book_id DESC LIMIT 1";
                            $resultselect = mysqli_query($conn, $sqlselect);
                            $rowselect = mysqli_fetch_array($resultselect);
                            $book_id = $rowselect['book_id'];
                            $sqldetail = "SELECT * FROM booking 
                                                INNER join book_nail_detail on booking.book_id = book_nail_detail.book_id
                                                INNER join service_item on service_item.ST_ID =  book_nail_detail.ST_ID
                                                INNER join nail_set on service_item.ns_id = nail_set.ns_id 
                                                INNER join nailer on book_nail_detail.nailer_id = nailer.nailer_id 
                                                WHERE book_nail_detail.book_id = $book_id";
                            $resultdetail = mysqli_query($conn, $sqldetail);

                            while ($rowdetail = mysqli_fetch_array($resultdetail)) { ?>
                                <tr>
                                <?php
                                if ($rowdetail['ST_ID'] == 82) {
                                ?>
                                    <td data-label="รูปภาพที่อัปโหลด">
                                        <img width=50 src="<?php echo $rowdetail['cus_file'] ?>">
                                    </td>
                                    <?php
                                } else {
                                ?>
                                    <td data-label="รูปภาพ">
                                        <img width=50 src="<?php echo $rowdetail['file'] ?>">
                                    </td>
                                    <?php
                                }
                                ?>
                                    <td data-label="ชื่อสินค้า"><?php echo $rowdetail['name'] ?></td>
                                    <!-- <td><?php echo $rowdetail['detail'] ?></td> -->
                                    <td data-label="ประเภทลายเล็บ"><?php echo $rowdetail['ns_name'] ?></td>
                                    <td data-label="รูปแบบลายเล็บ"><?php echo $rowdetail['date_add'] ?></td>
                                    <td data-label="เวลาที่จอง"><?php echo $rowdetail['timeslots'] ?></td>
                                    <td data-label="ช่างทำเล็บ"><?php echo $rowdetail['nailer_name'] ?></td>
                                    <td data-label="ราคาสินค้า"><?php echo $rowdetail['price'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                    $nailsum = 0;
                    $nailset = 0;
                    $sumqty = 0;
                    $sumprice = 0;
                    $total = 0;
                    $qty = 0;
                    $query = "SELECT * FROM book_nail_detail JOIN service_item on book_nail_detail.st_id = service_item.st_id 
                                JOIN booking on book_nail_detail.book_id = booking.book_id WHERE booking.book_id ='$book_id'";
                    $resultsumprice = mysqli_query($conn, $query);
                    while ($row1 = mysqli_fetch_array($resultsumprice)) {
                        $cus_price = $row1['cus_price'];
                        $price = $row1['price'];

                        $sumprice +=  (int)$row1['price'];
                    }
                    ?>

                    <!-- <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                        </div>
                        <div class="col-4" id="payment">
                            <p>ราคารวม <?php echo $sumprice; ?> บาท</p>
                        </div>
                    </div> -->
                </div>
            </div>
        
            <div class="col-4">
            <form class="imgForm" action="../conn/conn_payment.php?book_id=<?php echo $book_id ?>&price=<?php echo $sumprice?>" 
                method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="content">
                            <div class="dpx">
                                <div class="py">
                                <p>ราคารวม <b><?php echo $sumprice; ?></b> บาท</p>
                                <label>
                                    <input type="radio" class="option-input radio" value="0" name="pay_type" checked />
                                    ชำระเงินสด (ชำระผ่านทางร้าน)
                                </label><br>
                                <label>
                                    <input type="radio" class="option-input radio" value="1" name="pay_type" />
                                    ชำระผ่านการโอน (ชำระผ่านบัญชีธนาคาร)
                                </label>
                                </div>
                            </div>
                        </div>
                            <!-- <input type="radio" name="radionailer" value="<?php echo $row1['nailer_id'] ?>" required checked>&nbsp;&nbsp; ชำระเงินสด (ชำระผ่านทางร้าน) <br>
                            <input type="radio" name="radionailer" value="<?php echo $row1['nailer_id'] ?>" required>&nbsp;&nbsp; ชำระผ่านการโอน (ชำระผ่านบัญชีธนาคาร)
                         -->
                        <div class="row">
                            
                            <div class="col-5">
                                <label class="pay">แนบสลิปการโอน : </label>
                            </div>
                            <div class="col-7">
                                <input class="pay" type="file" name="upload" />

                            </div>
                            <div class="col-1"></div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col"></div>
                            <div class="col-12">
                                <div class="pz"><p>เลขบัญชี <b>ธนาคารกรุงเทพ</b></p></div>
                                <div class="px"><b>234-4-943671</b></div>
                            </div>
                            <div class="col"></div>
                        </div>
                        
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="pz"><p>ชื่อบัญชีธนาคาร</p></div>
                                <div class="py"><p>สุภัสสรา สุขภิสาร</p></div>
                            </div>
                            <div class="col-1"></div>
                        </div>
                        <br>

                        <div class="row" id="payment-nail">
                            <div class="col-6">
                                <img src="../img/payment.jpg" width="100%">
                            </div>
                            <div class="col-6">                              
                                <img src="../img/promtpay.jpg" width="100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div><br>
    

        <!-- <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="row" id="cart_booking">
                    <div class="col-lg-12" id="cartbook">
                        <i class="bi bi-bank"></i>&nbsp;รายละเอียดการชำระเงิน
                        <hr>
                    </div>
                
                
                <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row" id="payment-nail">
                            <div class="col-6">
                                <img src="../img/payment.jpg" width="100%">
                            </div>
                            <div class="col-6">                              
                                <img src="../img/promtpay.jpg" width="100%">
                            </div>
                        </div><br>
                        <div class="row" id="payment-nail">
                            <div class="col-5">
                                <label>เลขบัญชีธนาคาร : </label>
                            </div>
                            <div class="col-6">234-4-943671</div>
                            <div class="col-1"></div>
                        </div>
                        <div class="row" id="payment-nail">
                            <div class="col-5">
                                <label>ชื่อบัญชีธนาคาร : </label>
                            </div>
                            <div class="col-6">สุภัสสรา สุขภิสาร</div>
                            <div class="col-1"></div>
                        </div> -->
                        <!-- <div class="row" id="payment-nail">
                            <div class="col-2"></div>
                            <div class="col-2">
                                <label>รูปแบบการชำระเงิน : </label>
                            </div>
                            <div class="col-7">
                                <span>
                                    <input type="radio" checked="checked" name="radio" value=""> จ่ายมัดจำ
                                    <span class="checkmark"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="radio" value=""> จ่ายเต็มจำนวน
                                    <span class="checkmark"></span>
                                </span>
                            </div>
                            <div class="col-1"></div>
                        </div> -->
                        <!-- <div class="row" id="payment-nail">
                            <div class="col-5">
                                <label>แนบสลิปการโอน : </label>
                            </div>
                            <div class="col-7">
                                <input type="file" name="upload" />

                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                </div>
                </div>

                <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="row" id="payment-nail">
                            <div class="col-4">
                            </div>
                            
                            <div class="col-8">
                            <input type="radio" name="radionailer" value="<?php echo $row1['nailer_id'] ?>" required checked>&nbsp;&nbsp; ชำระเงินสด (ชำระผ่านทางร้าน) <br>
                            <input type="radio" name="radionailer" value="<?php echo $row1['nailer_id'] ?>" required>&nbsp;&nbsp; ชำระผ่านการโอน (ชำระผ่านบัญชีธนาคาร)
                                <label>
                                <p>ราคารวม <?php echo $sumprice; ?> บาท</p>
                                </label>
                            </div>
                        </div>
                        <br>
                        
                    </div>
                </div>
                </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div><br> -->

        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <a href="booking_nailer.php">
                        <button id="btnback" type="button" class="btn btn-danger btn-xs">ย้อนกลับ</button>
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="../booking/book_success.php">
                        <button id="btnnext" type="submit" class="btn btn-outline-success btn-xs" type="button">ยืนยันการจอง</button>
                    </a>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </form>
    </div>

    <!-- <div class="content">
        <div class="dpx">
            <div class="px">
            <label>
                <input type="checkbox" class="option-input checkbox" checked />
                Checkbox
            </label>
            <label>
                <input type="checkbox" class="option-input checkbox" />
                Checkbox
            </label>
            <label>
                <input type="checkbox" class="option-input checkbox" />
                Checkbox
            </label>
            </div>
            <div class="py">
            <label>
                <input type="radio" class="option-input radio" name="example" checked />
                
            </label>
            <label>
                <input type="radio" class="option-input radio" name="example" />
                Radio option
            </label>
            <label>
                <input type="radio" class="option-input radio" name="example" />
                Radio option
            </label>
            </div>
        </div>
    </div> -->

    <!-- <div class="content">
        <div class="dpx">
            <div class="py">
            <label>
                <input type="radio" class="option-input radio" name="example" checked />
                ชำระเงินสด (ชำระผ่านทางร้าน)
            </label><br>
            <label>
                <input type="radio" class="option-input radio" name="example" />
                ชำระผ่านการโอน (ชำระผ่านบัญชีธนาคาร)
            </label>
            </div>
        </div>
    </div> -->

    <?php include('../model/main_model.php'); ?>

    <br><br>
    <?php include('../footer.php'); ?>
    </div>


</body>

</html>
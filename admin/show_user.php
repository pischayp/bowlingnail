<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../header_admin.php"; ?>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <?php
    $Key_id = null;
    if (isset($_POST["txtKeyword"])) {
        $Key_id = $_POST["txtKeyword"];
    } else {
        $Key_id = null;
    }
    ?>

</head>
<body>
    
    <div class="container-fluid">
        <div class="row" id="show-user">
            <div class="col-md-12">
                <h2>จัดการข้อมูลสมาชิก</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" id="search">
                <form method="POST">
                    <input class="form-control" name="txtKeyword" type="text" id="txtKeyword" placeholder="กรุณากรอกรหัสสมาชิก" value="<?php echo $Key_id; ?>">
                    <!-- ปักไว้ กลับมาแก้ไขเป็นค้นหา username -->
                    <button type="submit" value="ค้นหา" class="btn btn-info">ค้นหา</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div><br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <div class="table-wrapper-scroll-y me-custom-scrollbar">
                <table class="table table-striped table-hover">
                    <thead>
                        <!-- <th scope="col" width="5%">รหัสสมาชิก</th> -->
                        <th scope="col" width="5%">โปรไฟล์</th>
                        <th scope="col" width="7%">ชื่อผู้ใช้งาน</th>
                        <th scope="col" width="7%">ชื่อ</th>
                        <th scope="col" width="7%">นามสกุล</th>
                        <th scope="col" width="12%">อีเมล</th>
                        <th scope="col" width="10%">เบอร์โทรศัพท์</th>
                        <th scope="col" width="5%"></th>
                    </thead>
                    <span>
                        <tbody>
                            <?php
                            include('../conn/conn.php');
                            $n = 1;
                            $query = mysqli_query($conn, "SELECT * from customer 
                        WHERE typeuser_id = 2 and cus_id LIKE '%" . $Key_id . "%'");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <!-- <td data-label="รหัสสมาชิก"><?php echo $row['cus_id']; ?></td> -->
                                    <td data-label="โปรไฟล์">
                                        <img src="<?php echo $row["file"] ?>" class="rounded-circle" />
                                    </td>
                                    <td data-label="ชื่อผู้ใช้งาน"><?php echo $row['username']; ?></td>
                                    <td data-label="ชื่อ"><?php echo $row['fname']; ?></td>
                                    <td data-label="นามสกุล"><?php echo $row['lname']; ?></td>
                                    <td data-label="อีเมล"><?php echo $row['email']; ?></td>
                                    <td data-label="เบอร์โทรศัพท์"><?php echo $row['tel']; ?></td>
                                    <td data-label="">
                                        <span>
                                            <a href="#del<?php echo $row['cus_id']; ?>" data-toggle="modal" class="btn btn-danger">
                                                <span class="glyphicon glyphicon-trash"></span>ลบ </a>
                                            <?php include('../model/main_del_user.php'); ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php
                            }
                            $n++
                            ?>
                        </tbody>
                </table>
            </div>
            </div>
            <div class="col-md-1"></div>
        </div>

</body>

</html>
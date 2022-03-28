
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
        <div class="row" id="show_nailer">
            <div class="col-md-12">
                <h2>จัดการข้อมูลช่างทำเล็บ</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" id="search">
                <form method="POST">
                    <input class="form-control" name="txtKeyword" type="text" id="txtKeyword" placeholder="กรุณากรอกรหัสช่างทำเล็บ" value="<?php echo $Key_id;?>">            
                    <button type="submit" value="ค้นหา"  id="btn-search" class="btn btn-info" >ค้นหา</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div><br>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <label class="header-data"><i class="bi bi-journal-text"></i>  จัดการข้อมูลช่างทำเล็บ</label>
                <hr>
                <table class="table table-striped table-hover w-100">
                    <thead class="header-table">
                        <th scope="col" width="15%">รหัสสมาชิก</th>
                        <th scope="col" width="15%">โปรไฟล์</th> 
                        <th scope="col" width="20%">ชื่อช่างทำเล็บ</th>
                        <th scope="col" width="20%">ชื่อ</th>
                        <th scope="col" width="20%">นามสกุล</th>
                        <th scope="col" width="20%">เบอร์โทรศัพท์</th>
                        <th scope="col" width="15%"></th>
                    </thead>
                    <span>
                        
                        <?php
                        include('../conn/conn.php');
                            $n=1;
                            $query=mysqli_query($conn,"SELECT * from nailer 
                            WHERE nailer_id LIKE '%".$Key_id."%'");
                            while($row=mysqli_fetch_array($query)){
                        ?>
                        <tbody class="header-table">
                            <tr>
                                <td data-label="รหัสสมาชิก" width="15%"><?php echo $row['nailer_id']; ?></td>
                                <td data-label="โปรไฟล์" width="15%">
                                    <img src="<?php echo $row["nailer_picture"] ?>" width="100%" />
                                </td>
                                <td data-label="ชื่อช่างทำเล็บ" width="20%"><?php echo $row['nailer_name']; ?></td>
                                <td data-label="ชื่อ" width="20%"><?php echo $row['fname']; ?></td>
                                <td data-label="นามสกุล" width="20%"><?php echo $row['lname']; ?></td>
                                <td data-label="เบอร์โทรศัพท์" width="20%"><?php echo $row['nailer_tel']; ?></td>
                                <td data-label="" width="15%">
                                    <span>
                                    <a href="#editprofilenailer<?php echo $row['nailer_id']; ?>" data-toggle="modal"
                                        class="btn btn-warning btn-md">
                        
                                            แก้ไข</button>   
                                    </a>  
                                    </span>
                                    <?php include('../model/main_edit_nailer.php'); ?>
                                </td>
                            </tr>
                            <?php
                        ;
                            } $n++
                            ?>
                        </tbody>
                </table>
            </div>
            <div class="col-1"></div>
        </div><br>
       
      
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <label class="header-data"><i class="bi bi-card-checklist"></i>  คำขออนุมัติการลา</label>
                <hr>
                <table class="table table-striped table-hover w-100">
                    <thead class="header-table">
                        <th scope="col" width="5%">ลำดับ</th>
                        <th scope="col" width="10%">ชื่อช่างทำเล็บ</th>
                        <th scope="col" width="15%">วันที่เริ่มการลา</th>
                        <th scope="col" width="15%">วันที่สิ้นสุดการลา</th>
                        <th scope="col" width="10%">การลางาน</th>
                        <th scope="col" width="30%">หมายเหตุการลา</th>
                        <th scope="col" width="15%">สถานะการลา</th>
                    </thead>
                    
                    <span>
                    
                        <?php
                        $n = 1;
                        include('../conn/conn.php');
                        $sqlleave = "SELECT * FROM nailer 
                            INNER join nailer_leave on nailer.nailer_id =  nailer_leave.nailer_id 
                            INNER join type_leave on nailer_leave.leavestatus_id = type_leave.leavestatus_id 
                            where type_leave.leavestatus_id = 3";
                       $leave = mysqli_query($conn, $sqlleave);
                       while($row=mysqli_fetch_array($leave)){
                            ?>
                            <tbody class="header-table">
                            <tr>
                                <td data-label="ลำดับ"><?php echo $n ?></td>
                                <td data-label="ชื่อช่างทำเล็บ"><?php echo $row['nailer_name']; ?></td>
                                <td data-label="วันที่เริ่มการลา">
                                    <i class="bi bi-calendar3"></i>
                                    <?php echo $row['leave_begin']; ?>
                                </td>
                                <td data-label="วันที่สิ้นสุดการลา">
                                    <i class="bi bi-calendar3"></i>
                                    <?php echo $row['leave_end']; ?>
                                </td>
                                <td data-label="การลางาน"><?php echo $row['leave_type']; ?></td>
                                <td data-label="หมายเหตุการลา"><?php echo $row['leave_description']; ?></td>
                                <td data-label="สถานะการลา">
                                <?php if($row['leavestatus_id']=='3') {
                                ?>
                                    <p>รออนุมัติการลางาน..</p> 
                                    
                                    <a href="#leave_nailer<?php echo $row['leave_id']?>" class="btn btn-primary" data-toggle="modal"></i>ยืนยันการลางาน</a>
                                <?php include('../model/leave_nailer_modal.php'); ?>
                                <?php
                                }else if($row['leavestatus_id']=='1') {
                                ?>
                                    <a href="" data-toggle="modal" class="btn btn-success">
                                    <span class="glyphicon glyphicon-payment"></span>อนุมัติการลาเรียบร้อย</a> 
                                <?php
                                }else if($row['leavestatus_id']=='2') {
                                ?>
                                    <a href="" data-toggle="modal" class="btn btn-success">
                                    <span class="glyphicon glyphicon-payment"></span>ไม่อนุมัติการลา</a> 
                                <?php
                                }$n++
                                ?>     
                                </td>
                            </tr>
                            <?php
                            } 
                            ?>
                        </tbody>
                        <div class="col-1"></div>
                    </div>
                <?php 
                ?>
                </table>
            </div>
            <div class="col-1"></div>
        </div><br><br>

        <?php include('../model/main_model.php'); ?>
    </div>
        
   
    
</body>
</html>
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

    <script>
        $(function() {
            $('#leave_type').change(function() {
                if ($('#leave_type').val() == 'เต็มวัน' ) {
                    $('.leave_description').prop('disabled', false);
                    $('#leave_description').prop('disabled', false);
                    $('.leave_begin').prop('disabled', false);
                    $('#leave_begin').prop('disabled', false);
                    $('.leave_end').prop('disabled', false);
                    $('#leave_end').prop('disabled', false);
                    $('.leave_date').prop('disabled', true);
                    $('#leave_date').prop('disabled', true);

                } else if ($('#leave_type').val()== 'ลาเช้า') {
                    $('.leave_description').prop('disabled', false);
                    $('#leave_description').prop('disabled', false);
                    $('.leave_begin').prop('disabled', true);
                    $('#leave_begin').prop('disabled', true);
                    $('.leave_end').prop('disabled', true);
                    $('#leave_end').prop('disabled', true);
                    $('.leave_date').prop('disabled', false);
                    $('#leave_date').prop('disabled', false);
                    
                }else if ($('#leave_type').val()== 'ลาบ่าย'){
                    $('.leave_description').prop('disabled', false);
                    $('#leave_description').prop('disabled', false);
                    $('.leave_begin').prop('disabled', true);
                    $('#leave_begin').prop('disabled', true);
                    $('.leave_end').prop('disabled', true);
                    $('#leave_end').prop('disabled', true);
                    $('.leave_date').prop('disabled', false);
                    $('#leave_date').prop('disabled', false);
                }
                
            });
        });
    </script>

</head>

<body>

    <div class="container" id="header_nailer">
        <div class="row">
            <div class="col-12">
                <?php
                $nailer_id =  $_SESSION["nailer_id"];
                include('../conn/conn.php');
                $query = "SELECT * FROM nailer WHERE nailer_id='$nailer_id' ";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $nailer_id = $row['nailer_id'];
                ?>

                <div class="col-md-12" id="hr-nailer">
                    <h2>รายการลางานของช่างทำเล็บ</h2>
                    <h6>ร้านทำเล็บ Bowling Nail and Spa.</h6>
                </div><br>

                <div class="row">
                    <div class="col-12">
                        <div class="card mb-3" id="nailer_data">                    
                            <div class="card-body"><br>
                                <form action="../conn/conn_nailer_leave.php?nailer_id=<?php echo $nailer_id; ?>" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="row">

                                        <div class="col-4">
                                            <label>ชื่อช่างทำเล็บ : </label><br>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control" id="nailer_nameleave" type="text"
                                                value="<?php echo $row['nailer_name']; ?>" size="5" name="nailer_name" Disabled>
                                        </div><br><br>

                                        <div class="col-4">
                                            <label>เลือกการลางาน : </label><br>
                                        </div>
                                        <div class="col-8">
                                            <select name="leave_type" id="leave_type" class="dropdown_leave" required>
                                                <option value="" selected disabled>เลือกการลางาน</option>
                                                <option value="เต็มวัน">ลางานเต็มวัน</option>
                                                <option value="ลาเช้า">ลางานช่วงเช้า</option>
                                                <option value="ลาบ่าย">ลางานช่วงบ่าย</option>
                                            </select>
                                        </div><br><br>

                                        <div class="col-4">
                                            <label class="leave_begin">วันที่เริ่มการลา : </label><br>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control" type="date" value="" id="leave_begin" name="leave_begin"
                                                min='1899-01-01' max='3000-12-12' required>
                                        </div><br><br>

                                        <div class="col-4">
                                            <label class="leave_end">วันที่สิ้นสุดการลา : </label><br>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control" type="date" value="" id="leave_end" name="leave_end"
                                                min='1899-01-01' max='3000-12-12' required>
                                        </div><br><br>
                                        <div class="col-4">
                                            <label class="leave_date">วันที่ลา (เช้า/บ่าย) : </label><br>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control" type="date" value="" id="leave_date" name="leave_date"
                                                min='1899-01-01' max='3000-12-12' required>
                                        </div><br><br>

                                        <div class="col-4">
                                            <label class="leave_description">หมายเหตุการลา : </label><br>
                                        </div>
                                        <div class="col-8">
                                            <textarea name="leave_description" id="leave_description" cols="50" rows="5" required></textarea>
                                        </div>

                                        <div class="confirm_leave"><br>
                                            <button type="submit" class="btn btn-outline-danger" width="100%">ยืนยัน</button>
                                            

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php ;
                                    }
                                        ?><br>
                    </div>
                </div>
            </div>
        </div><br>


        <div class="row">
            <div class="col"></div>
            <div class="col-12">
                <label class="header-data">ข้อมูลการลาของช่างทำเล็บ</label>
                <hr>
                <table class="table table-striped table-hover w-100">
                    <thead class="header-table">
                        <tr>
                            <th scope="col" width="5%">ลำดับ</th>
                            <th scope="col" width="10%">ชื่อช่างทำเล็บ</th>
                            <th scope="col" width="15%">วันที่เริ่มและสิ้นสุดการลา</th>
                            <th scope="col" width="10%">การลางาน</th>
                            <th scope="col" width="20%">หมายเหตุการลา</th>
                            <th scope="col" width="15%">สถานะการทำงาน</th>
                        </tr>
                    </thead>
                    <?php

                    $n = 1;
                    $sql = "SELECT * FROM type_leave 
                    INNER JOIN nailer_leave ON type_leave.leavestatus_id=nailer_leave.leavestatus_id
                    INNER JOIN nailer ON nailer_leave.nailer_id=nailer.nailer_id 
                    WHERE nailer_leave.nailer_id='$nailer_id' ORDER BY leave_id";
                    $result = mysqli_query($conn, $sql);
                    while ($row_leave = mysqli_fetch_array($result)) { ?>
                        <tbody>
                            <tr>
                            <td scope="row" data-label="ลำดับ"><?php echo $n ?></td>
                            <td data-label="ชื่อช่างทำเล็บ" class="des"><?php echo $row_leave['nailer_name'] ?></td>
                            <td data-label="วันที่เริ่มและสิ้นสุดการลา"><?php
                                                    if ($row_leave['leave_begin'] == $row_leave['leave_end']) {
                                                        echo $row_leave['leave_begin'];
                                                    } else if ($row_leave['leave_end'] == '0000-00-00') {
                                                        echo $row_leave['leave_begin'];
                                                    } else {
                                                        echo $row_leave['leave_begin'] . '<br> จนถึง ' . $row_leave['leave_end'];
                                                    } ?>
                            </td>
                            <td data-label="การลางาน"><?php echo $row_leave['leave_type'] ?></td>
                            <td data-label="หมายเหตุการลา" class="description"><?php echo $row_leave['leave_description'] ?></td>
                            <!-- text overflow กำหนดให้ตัวหนังสือไม่เกิน -->
                            <td data-label="สถานะ">
                                <?php
                                if ($row_leave['leavestatus_id'] == 1) {
                                    echo "<span class='success-con'><i class='bi bi-check-circle-fill'></i>&nbsp;". $row_leave['leave_status'] . "</span>";
                                } else if ($row_leave['leavestatus_id'] == 2) {
                                    echo "<span class='success-fail'><i class='bi bi-x-circle-fill'></i>&nbsp;" . $row_leave['leave_status'] . "</span>";
                                } else {
                                    echo "<span class='success-wait'><i class='bi bi-clock-fill'></i>&nbsp;รอการตรวจสอบ</span>";
                                }
                                $n++
                                ?>
                            </td>
                            </tr>
                        </tbody>
                    <?php }
                    ?>
                </table>
            </div>
            <div class="col"></div>
        </div><br>
    </div>



</body>

</html>
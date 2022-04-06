<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bowling Nail & Spa. | ร้านทำเล็บและสปา</title>
    <link rel="stylesheet" href="../css.css">
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

    <script>
        $(function() {
            $('#leave_type').change(function() {
                if ($('#leave_type').val() == 'เล็บมือ') {
                    $('.leave_description').prop('disabled', false);
                    $('#leave_description').prop('disabled', false);
                    $('.leave_begin').prop('disabled', false);
                    $('#leave_begin').prop('disabled', false);
                    $('.leave_end').prop('disabled', false);
                    $('#leave_end').prop('disabled', false);
                    $('.leave_date').prop('disabled', true);
                    $('#leave_date').prop('disabled', true);

                } else if ($('#leave_type').val() == 'เล็บเท้า') {
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
    <header>
        <div>
            <?php include('../header_menubarnail.php'); ?>
        </div>
    </header><br><br><br><br>


    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10">
                <img src="../img/header/uplode.png" class="d-block w-100">
            </div>
        </div>
    </div><br><br>


    <div class="row">
        <div class="col-2"></div>
        <div class="col-8" id="index_nailer">
            <div class="card mb-3" width="50%">
                <div class="row g-0" id="profile_nailer">

                    <div class="col-1"></div>
                    <div class="col-md-4"><br>
                        <img src="../img/nail_uplode.png" width="250" height="250" />
                        <br><br>
                    </div>

                    <div class="col-md-6">
                        <div class="card-body">
                            <br>
                            <form action="../conn/conn_cusfile.php" enctype="multipart/form-data" method="POST">

                                <div class="row">
                                    <div class="col-5">
                                        <label>อัพโหลดลายเล็บ : </label><br>
                                    </div>
                                    <div class="col-7">
                                        <input type="file" id="cus_file" name="cus_file" accept="image/*" onchange="loadFile1(event)" required>
                                    </div><br>

                                    <div class="col-5">
                                        <label>เลือกประเภทลายเล็บ : </label><br>
                                    </div>
                                    <div class="col-7">
                                        <select name="nt_id" id="nt_id" class="dropdown_leave" required>
                                            <option value="" selected disabled>เลือกประเภทลายเล็บ</option>
                                            <option value="1">ลายเล็บมือ</option>
                                            <option value="2">ลายเล็บเท้า</option>
                                        </select>
                                    </div><br>

                                    <div class="col-5">
                                        <label>รายละเอียดเพิ่มเติม : </label><br>
                                    </div>
                                    <div class="col-7">
                                        <textarea name="file_detail" id="" cols="25" rows="4"></textarea>
                                    </div><br>

                                    <div class="col-5">
                                        <label>ราคาที่ต้องมัดจำ : 129฿</label><br>
                                    </div>
                                    <div class="col-7">

                                    </div><br>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-warning btn-md" style="float: right;">
                                    ยืนยันการเลือกลายเล็บ / ประเมินราคาลายเล็บ</button>

                            </form>
                        </div>
                    </div>
                    <div class="col-1"></div>


                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div><br>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10" id="btn-choose-nailer">
            <p><i class="bi bi-chat-text"></i>&nbsp;ลายเล็บที่ทางร้านแนะนำ / ยอดฮิต</p>
            <hr>

        </div>
        <div class="col-1 "></div>
    </div><br>

    <div>
        <?php include('../footer.php'); ?>
    </div>

</body>

</html>
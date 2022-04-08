<?php include "../session.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bowling Nail & Spa. | ร้านทำเล็บและสปา</title>
    <link rel="stylesheet" href="../css.css">
    <link rel="stylesheet" href="../table.css">
    <link rel="stylesheet" href="../css_nailer.css">
    <link rel="stylesheet" href="../modal.css">
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

    <!-- <script>
        const ratingStars = [...document.getElementsByClassName("rating__star")];

        function executeRating(stars) {
            const starClassActive = "rating__star fas fa-star";
            const starClassInactive = "rating__star far fa-star";
            const starsLength = stars.length;
            let i;
            stars.map((star) => {
                star.onclick = () => {
                    i = stars.indexOf(star);

                    if (star.className === starClassInactive) {
                        for (i; i >= 0; --i) stars[i].className = starClassActive;
                    } else {
                        for (i; i < starsLength; ++i) stars[i].className = starClassInactive;
                    }
                };
            });
        }
        executeRating(ratingStars);
    </script> -->
    
    </script>
    <style>
        .progress-label-left {
            float: left;
            margin-right: 0.5em;
            line-height: 1em;
        }

        .progress-label-right {
            float: right;
            margin-left: 0.3em;
            line-height: 1em;
        }

        .star-light {
            color: #e9ecef;
        }

        #add_review {
            float: right;
            background-color: white;
            color: #EE7600;
        }

        #add_review:hover {
            background-color: #EE7600;
            color: white;
        }
    </style>

</head>

<body>
    <header>
        <div>
            <?php include('../index_menubarnail.php'); ?>
        </div>
    </header><br><br>

    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10">
                <img src="../img/bg/bg-profile.png" class="d-block w-100">
            </div>
        </div>
    </div><br>

    <div class="contianer">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-2" id="btn-choose-nailer">
                <p><i class="fas fa-id-card"></i> &nbsp;ช่างทำเล็บ : </p>
            </div>
            <div class="col-6" id="btn_nailer">
                <?php
                include('../conn/conn.php');
                $query = mysqli_query($conn, "SELECT * from nailer
                    where nailer_id = 2");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <ul>
                        <!-- <li><a class="active" href="header_nailer.php">
                                &nbsp;ช่างโบว์
                            </a>
                        </li> -->
                        <!-- &nbsp;&nbsp;
                        <li><a href="header_nailer2.php">
                                &nbsp;ช่างตุ๊ก
                            </a>
                        </li> -->
                    </ul>
                <?php } ?>
            </div>
            <div class="col-2"></div>
        </div>

        <div class="row">
            <div class="col-1"></div>

            <div class="col-5" id="index_nailer">
                <div class="card mb-3">
                    <div class="row g-0" id="profile_nailer">
                        <?php
                        include('../conn/conn.php');
                        $query = mysqli_query($conn, "SELECT * from nailer
                            where nailer_id = 1");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <div class="col-md-6"><br>
                                <img src="<?php echo $row["nailer_picture"] ?>" width="240px" height="240px" />
                                <br><br>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body"><br><br>
                                    <h5 class="card-title"><i class="fas fa-id-card"></i>
                                        &nbsp;&nbsp;<?php echo $row['nailer_name']; ?></h5>
                                    <p class="card-text">ความถนัดของช่าง : <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="bi bi-brush"></i>&nbsp;ถนัดด้านการออกแบบลายเล็บ <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="bi bi-brush"></i>&nbsp;ถนัดด้านการทำสปา
                                    </p>
                                </div><br>
                                <div class="btn-profile">
                                    <a href="#nailerport1<?php echo $row['nailer_id'] ?>" data-toggle="modal">
                                        <i class="bi bi-journal-medical"></i>&nbsp;คลิ๊กเพื่อดูผลงานทั้งหมด</a>
                                    <?php include('../model/modal_nailer_port.php'); ?>
                                </div><br>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-5" id="index_nailer">
                <div class="card mb-3">
                    <div class="row g-0" id="profile_nailer">
                        <?php
                        include('../conn/conn.php');
                        $query = mysqli_query($conn, "SELECT * from nailer
                            where nailer_id = 2");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <div class="col-md-6"><br>
                                <img src="<?php echo $row["nailer_picture"] ?>" width="240px" height="240px" />
                                <br><br>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body"><br><br>
                                    <h5 class="card-title"><i class="fas fa-id-card"></i>
                                        &nbsp;&nbsp;<?php echo $row['nailer_name']; ?></h5>
                                    <p class="card-text">ความถนัดของช่าง : <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="bi bi-brush"></i>&nbsp;ถนัดด้านการเพ้นท์ลายเล็บ <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="bi bi-brush"></i>&nbsp;ถนัดด้านการตัดหนัง
                                    </p>
                                </div><br>
                                <div class="btn-profile">
                                    <a href="#nailerport2<?php echo $row['nailer_id'] ?>" data-toggle="modal">
                                        <i class="bi bi-journal-medical"></i>&nbsp;คลิ๊กเพื่อดูผลงานทั้งหมด</a>
                                    <?php include('../model/modal_nailer_port.php'); ?>
                                </div><br>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>

    <div>
        <?php include('../footer.php'); ?>
    </div>

</body>

</html>
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
    <!-- <script>
        $(document).ready(function() {
            var rating_data = 0;
            $('#add_review').click(function() {
                $('#review_modal').modal('show');
            });
            $(document).on('mouseenter', '.submit_star', function() {
                var rating = $(this).data('rating');
                reset_background();
                for (var count = 1; count <= rating; count++) {
                    $('#submit_star_' + count).addClass('text-warning');
                }
            });

            function reset_background() {
                for (var count = 1; count <= 5; count++) {
                    $('#submit_star_' + count).addClass('star-light');
                    $('#submit_star_' + count).removeClass('text-warning');
                }
            }
            $(document).on('mouseleave', '.submit_star', function() {
                reset_background();
                for (var count = 1; count <= rating_data; count++) {
                    $('#submit_star_' + count).removeClass('star-light');
                    $('#submit_star_' + count).addClass('text-warning');
                }
            });
            $(document).on('click', '.submit_star', function() {
                rating_data = $(this).data('rating');
            });
            $('#save_review').click(function() {
                var user_name = $('#user_name').val();
                var user_review = $('#user_review').val();
                if (user_name == '' || user_review == '') {
                    alert("Please Fill Both Field");
                    return false;
                } else {
                    $.ajax({
                        url: "submit_rating.php",
                        method: "POST",
                        data: {
                            rating_data: rating_data,
                            user_name: user_name,
                            user_review: user_review
                        },
                        success: function(data) {
                            $('#review_modal').modal('hide');
                            load_rating_data();
                            alert(data);
                        }
                    })
                }
            });

            load_rating_data();

            function load_rating_data() {
                $.ajax({
                    url: "submit_rating.php",
                    method: "POST",
                    data: {
                        action: 'load_data'
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $('#average_rating').text(data.average_rating);
                        $('#total_review').text(data.total_review);
                        var count_star = 0;
                        $('.main_star').each(function() {
                            count_star++;
                            if (Math.ceil(data.average_rating) >= count_star) {
                                $(this).addClass('text-warning');
                                $(this).addClass('star-light');
                            }
                        });
                        $('#total_five_star_review').text(data.five_star_review);
                        $('#total_four_star_review').text(data.four_star_review);
                        $('#total_three_star_review').text(data.three_star_review);
                        $('#total_two_star_review').text(data.two_star_review);
                        $('#total_one_star_review').text(data.one_star_review);
                        $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');
                        $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');
                        $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');
                        $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');
                        $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');
                        if (data.review_data.length > 0) {
                            var html = '';
                            for (var count = 0; count < data.review_data.length; count++) {
                                html += '<div class="row mb-3">';
                                html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">' + data.review_data[count].user_name.charAt(0) + '</h3></div></div>';
                                html += '<div class="col-sm-11">';
                                html += '<div class="card">';
                                html += '<div class="card-header"><b>' + data.review_data[count].user_name + '</b></div>';
                                html += '<div class="card-body">';
                                for (var star = 1; star <= 5; star++) {
                                    var class_name = '';
                                    if (data.review_data[count].rating >= star) {
                                        class_name = 'text-warning';
                                    } else {
                                        class_name = 'star-light';
                                    }
                                    html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                                }
                                html += '<br />';
                                html += data.review_data[count].user_review;
                                html += '</div>';
                                html += '<div class="card-footer text-right">On ' + data.review_data[count].datetime + '</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                            }
                            $('#review_content').html(html);
                        }
                    }
                })
            }
        });
    </script> -->
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
            <?php include('../header_menubarnail.php'); ?>
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
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="bi bi-brush"></i>&nbsp;ถนัดด้านการเพ้นท์ลายเล็บ <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="bi bi-brush"></i>&nbsp;ถนัดด้านการ <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="bi bi-brush"></i>&nbsp;ถนัดด้านการตัดหนัง
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
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="bi bi-brush"></i>&nbsp;ถนัดด้านการ <br>
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
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
        <?php include('../header_menubarnail.php'); ?>   
    </div>
</header><br><br><br><br>

    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10">
                <img src="../img/header/header_hp.png" class="d-block w-100">
            </div>
        </div>
    </div>

    <div class="row">
            <div class="col-md-3" id="menu_nail">
                <ul>
                    <h4>ประเภทลายเล็บ</h4>
                    <li><a href="headerf_p.php">
                            <img src="../img/icon/nail_p.png"  width="30" height="30">  ลายสีพื้น
                        </a>
                    </li>
                    <li><a href="headerf_paint.php">
                            <img src="../img/icon/nail_paint.png"  width="30" height="30">  ลายเพ้นท์
                        </a>
                    </li>
                    <li><a href="headerf_gt.php">
                            <img src="../img/icon/nail_gt.png"  width="30" height="30">  ลายกลิตเตอร์
                        </a>
                    </li>
                    <li><a class="active" href="headerf_stg.php">
                            <img src="../img/icon/nail_stg.png"  width="30" height="30">  ลายสติ๊กเกอร์
                        </a>
                    </li>
                    <li><a href="headerf_lk.php">
                            <img src="../img/icon/nail_lk.png"  width="30" height="30">  ลายลูกแก้ว
                        </a>
                    </li>
                </ul>
            </div>
            <!-- <div class="col-md-1"></div> -->
            <div class="col-lg-8 col-xl-8 col-md-12 col-sm-12 col-12">
                <div class="row" style="margin-top: 40px;">
                    <?php
                        include('../conn/conn.php');
                        $query=mysqli_query($conn,"SELECT * FROM service_item 
                        INNER join service_type on service_type.S_ID=service_item.S_ID
                        INNER join nail_type on nail_type.nt_id=service_item.nt_id
                        INNER join nail_set on nail_set.ns_id=service_item.ns_id
                        WHERE service_item.S_ID = 4 and service_item.nt_id = 2 and service_item.ns_id = 1");
                        while($row=mysqli_fetch_array($query)){
                    ?>
                        
                    <div class="col-lg-3 col-xl-3 col-md-12 col-sm-12 col-12">
                        <div class="card text-center">
                            <img class="img-responsive img-thumbnail" style="width:100%;" src="<?php echo $row['file'] ?>" />
                            <div class="card-body">
                            <span style="margin-top: -0.5em; font-size :20px;"> <?php echo $row['name']; ?></span><br>
                            <span style="margin-top: -0.5em;"> <?php echo $row['detail']; ?></span><br><br>
                                <div class="row">
                                    <div class="col">
                                    <a href="#booking<?php echo $row['ST_ID']; ?>" data-toggle="modal" class="btn btn-warning" >          
                                        <span class="glyphicon glyphicon-edit"></span>เลือกลายเล็บ</a>  
                                    </div>
                                </div>
                              
                            
                        </div>    
                    </div><br><br>
                    <?php include('../model/booking_model.php'); ?>   
                    <?php     
                    } 
                    ?>
                </div> <!-- row  -->
            </div>
            <div class="col-md-1"></div>
        </div>
    <div>
        <?php include('../footer.php'); ?>
    </div>
    
</body>
</html>

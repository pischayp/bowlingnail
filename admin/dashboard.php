<?php
include("../conn/conn.php");





?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../header_admin.php"; ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="../css_dashboard.css">
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

</head>

<body>
<?php
      if (isset($_POST["year"]) &&  isset($_POST["month"])) {
        $year = $_POST["year"];
        $month = $_POST["month"];      
        if ($year == 'all' && $month == 'all') {
          $where = '';
          $wheredetail = '';
          $wherecard = '';
          
        } else if ($year != 'all' && $month == 'all') {
          $where = 'WHERE YEAR(book_date)= "' . $year . '"';
          $wherecard = 'AND YEAR(book_date)= "' . $year . '"';
          $wheredetail = 'WHERE YEAR(date_add)= "' . $year . '"';
          
        }else if ($year != 'all' && $month != 'all') {
          $where = 'WHERE YEAR(book_date)= "' . $year . '" AND MONTH(book_date)= "' . $month . '"';
          $wherecard = 'AND YEAR(book_date)= "' . $year . '" AND MONTH(book_date)= "' . $month . '"';
          $wheredetail = 'WHERE YEAR(date_add)= "' . $year . '" AND MONTH(date_add)= "' . $month . '"';
        }
        else if ($year == 'all' && $month != 'all') {
          $where = 'WHERE MONTH(book_date)= "' . $month . '"';
          $wherecard = 'AND MONTH(book_date)= "' . $month . '"';
          $wheredetail = 'WHERE MONTH(date_add)= "' . $month . '"';
        }else {
          $where = '';
          $wheredetail = '';
          $wherecard = '';
        }
      }else {
        $where = '';
        $wheredetail = '';
        $wherecard = '';
      }

      ?>

  <form id="sortform" action="" method="post">
     <p class="label-filter" style="font-size:1.5em">รายงานสรุปผล</p>
     <div class="card-filter">
     
      <div class="drop-filter">
        <select class="form-select"  style="font-size:1em" name="year" id="year" aria-label="Default select example" onchange="this.form.submit();">
          <option value="all" >ทุกปี</option>
          <?php
          $year = "SELECT  YEAR(book_date)
                                FROM booking GROUP BY YEAR(book_date)";
          $result_year = mysqli_query($conn, $year);
          while ($row_yr =  mysqli_fetch_array($result_year)) { ?>
            <option value="<?php echo $row_yr['YEAR(book_date)'] ?>" <?php
                                                                      if (isset($_POST["year"]) && ($_POST["year"]) == $row_yr['YEAR(book_date)']) {
                                                                        echo 'selected';
                                                                      }
                                                                      ?>><?php echo $row_yr['YEAR(book_date)'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="row">
        <select class="form-select" style="font-size:1em" name="month" id="month" aria-label="Default select example" onchange="this.form.submit();">
          <option value="all">ทุกเดือน</option>
          <?php
          $MONTH = "SELECT  MONTH(book_date)
                                FROM booking GROUP BY MONTH(book_date)";
          $result_MONTH = mysqli_query($conn, $MONTH);
          while ($row_MONTH =  mysqli_fetch_array($result_MONTH)) { ?>
            <option value="<?php echo $row_MONTH['MONTH(book_date)'] ?>" <?php if (isset($_POST["month"]) && ($_POST["month"]) == $row_MONTH['MONTH(book_date)']) {
                                                                            echo 'selected';
                                                                          }
                                                                          ?>>
              <?php
              if ($row_MONTH['MONTH(book_date)'] == 1) {
                echo "มกราคม";
              } else if ($row_MONTH['MONTH(book_date)'] == 2) {
                echo "กุมภาพันธ์";
              } else if ($row_MONTH['MONTH(book_date)'] == 3) {
                echo "มีนาคม";
              } else if ($row_MONTH['MONTH(book_date)'] == 4) {
                echo "เมษายน";
              } else if ($row_MONTH['MONTH(book_date)'] == 5) {
                echo "พฤษภาคม";
              } else if ($row_MONTH['MONTH(book_date)'] == 6) {
                echo "มิถุนายน";
              } else if ($row_MONTH['MONTH(book_date)'] == 7) {
                echo "กรกฎาคม";
              } else if ($row_MONTH['MONTH(book_date)'] == 8) {
                echo "สิงหาคม";
              } else if ($row_MONTH['MONTH(book_date)'] == 9) {
                echo "กันยายน";
              } else if ($row_MONTH['MONTH(book_date)'] == 10) {
                echo "ตุลาคม";
              } else if ($row_MONTH['MONTH(book_date)'] == 11) {
                echo "พฤศจิกายน";
              } else if ($row_MONTH['MONTH(book_date)'] == 12) {
                echo "ธันวาคม";
              }
              ?>
            </option>
          <?php
          }
          ?>
        </select>
      </div>
    </div>


  </form>



  <?php
  $sql_workingemp = "SELECT *, COUNT(*) FROM booking 
    INNER JOIN book_nail_detail on booking.book_id=book_nail_detail.book_id 
    INNER JOIN service_item on book_nail_detail.st_id = service_item.st_id $where 
    GROUP BY book_nail_detail.st_id ORDER BY count(*) DESC LIMIT 5";
  $resultworkingemp = mysqli_query($conn, $sql_workingemp);
  if (mysqli_num_rows($resultworkingemp) > 0) {

    while ($row_workingemp = mysqli_fetch_assoc($resultworkingemp)) {

      $labels_workingemp[] = $row_workingemp['name'];

      $data_workingemp[] = $row_workingemp['COUNT(*)'];
    }
  } else {
    $labels_workingemp[] = '';
    $data_workingemp[] = 0;
  }

  $sql_workingemp2 = "SELECT *, COUNT(*) FROM book_nail_detail
  INNER JOIN nailer on book_nail_detail.nailer_id=nailer.nailer_id $wheredetail
  GROUP BY book_nail_detail.nailer_id ORDER BY count(*) DESC LIMIT 2";
  $resultworkingemp2 = mysqli_query($conn, $sql_workingemp2);
  if (mysqli_num_rows($resultworkingemp2) > 0) {

    while ($row_workingemp2 = mysqli_fetch_assoc($resultworkingemp2)) {

      $labels_workingemp2[] = $row_workingemp2['nailer_name'];

      $data_workingemp2[] = $row_workingemp2['COUNT(*)'];
    }
  } else {
    $labels_workingemp2[] = '';
    $data_workingemp2[] = 0;
  }
  // รายได้ทั้งหมด
  $sql_workingemp3 = "SELECT *, SUM(total_price) AS sumprice FROM booking where book_status = 1 $wherecard ";
  $resultworkingemp3 = mysqli_query($conn, $sql_workingemp3);
  $rowworkingemp3 = mysqli_fetch_array($resultworkingemp3);

  //ลูกค้าคนไหนมาทำเยอะสุด
  $sql_workingemp4 = "SELECT *, COUNT(*) FROM booking
  INNER JOIN customer on booking.cus_id=customer.cus_id  $where 
  GROUP BY booking.cus_id ORDER BY count(*) DESC LIMIT 5";
  $resultworkingemp4 = mysqli_query($conn, $sql_workingemp4);
  if (mysqli_num_rows($resultworkingemp4) > 0) {

    while ($row_workingemp4 = mysqli_fetch_assoc($resultworkingemp4)) {

      $labels_workingemp4[] = $row_workingemp4['username'];

      $data_workingemp4[] = $row_workingemp4['COUNT(*)'];
    }
  } else {
    $labels_workingemp4[] = '';
    $data_workingemp4[] = 0;
  }



  ?>

  <div class="subdashrow1">
    <div class="dashcol3">
      <div class="card">
        <p><?php echo number_format($rowworkingemp3["sumprice"]) ?> ฿ </p>รายได้ทั้งหมด
      </div>
      <div class="pie">
        <canvas id="myChartbaremp2"></canvas>
      </div>
    </div>

    <div class="bar">
      <canvas id="myChartbaremp"></canvas>
      <canvas id="myChartbaremp4"></canvas>
    </div>


  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>

  <script>
    var myChartbaremp = document.getElementById("myChartbaremp");
    var Chartbaremp = new Chart(myChartbaremp, {
      type: 'bar',
      data: {
        labels: <?= json_encode($labels_workingemp) ?>,
        datasets: [{
          labels: {
            display: true,
            render: 'label',
            fontFamily: 'Kanit'
          },
          data: <?= json_encode($data_workingemp, JSON_NUMERIC_CHECK); ?>,
          backgroundColor: ['#FFF89A',
            '#FFF89A',
            '#FFF89A',
            '#FFF89A',
            '#FFF89A'
          ],
          borderWidth: 0.5
        }]
      },

      options: {
        responsive: true,
        maintainAspectRatio: false,
        cutoutPercentage: 70,
        title: {
          display: true,
          text: '5 อันดับลายเล็บที่นิยมมากสุด',
          position: 'top',
          fontSize: 16,
          padding: 30,
          fontColor: '#111',
          fontFamily: 'Kanit'
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
              fontFamily: 'Kanit'

            }
          }],
          xAxes: [{
            ticks: {
              fontFamily: 'Kanit'

            }
          }]
        },
        legend: {
          display: false,

        }
      }
    });

    var myChartbaremp2 = document.getElementById("myChartbaremp2");
    var Chartbaremp2 = new Chart(myChartbaremp2, {
      type: 'pie',
      data: {
        labels: <?= json_encode($labels_workingemp2) ?>,
        datasets: [{
          labels: {
            display: true,
            render: 'label',
            fontFamily: 'Kanit'
          },
          data: <?= json_encode($data_workingemp2, JSON_NUMERIC_CHECK); ?>,
          backgroundColor: ['#F9813A',
            '#FF7BA9',
            'rgba(100, 201, 207)',
            'rgba(100, 201, 207)',
            'rgba(100, 201, 207)'
          ],
          borderWidth: 0.5
        }]
      },

      options: {
        title: {
          display: true,
          text: 'ช่างทำเล็บที่ทำงานมากที่สุด',
          position: 'top',
          fontSize: 16,
          padding: 30,
          fontColor: '#111',
          fontFamily: 'Kanit'
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
              fontFamily: 'Kanit'

            }
          }],
          xAxes: [{
            ticks: {
              fontFamily: 'Kanit'

            }
          }]
        },
        legend: {
          display: false,

        }
      }
    });

    var myChartbaremp4 = document.getElementById("myChartbaremp4");
    var Chartbaremp4 = new Chart(myChartbaremp4, {
      type: 'bar',
      data: {
        labels: <?= json_encode($labels_workingemp4) ?>,
        datasets: [{
          labels: {
            display: true,
            render: 'label',
            fontFamily: 'Kanit'
          },
          data: <?= json_encode($data_workingemp4, JSON_NUMERIC_CHECK); ?>,
          backgroundColor: ['#97DBAE',
            '#97DBAE',
            '#97DBAE',
            '#97DBAE',
            '#97DBAE'
          ],
          borderWidth: 0.5
        }]
      },

      options: {
        responsive: true,
        maintainAspectRatio: false,
        cutoutPercentage: 70,
        title: {
          display: true,
          text: '5 อันดับลูกค้าที่มาใช้บริการมากที่สุด',
          position: 'top',
          fontSize: 16,
          padding: 30,
          fontColor: '#111',
          fontFamily: 'Kanit'
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
              fontFamily: 'Kanit'

            }
          }],
          xAxes: [{
            ticks: {
              fontFamily: 'Kanit'

            }
          }]
        },
        legend: {
          display: false,

        }
      }
    });
  </script>

</body>

</html>
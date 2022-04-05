<?php
session_start();
include("../conn/conn.php.php");
?>
<!DOCTYPE html>
<html lang="th">

<head>
  <link rel="stylesheet" href="css/backed_dash.css">
  <link rel="stylesheet" href="css/index.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
  <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="shortcut icon" href="assets/ico/favicon.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

</head>
</head>

<body>

  <div class="sidenav">
    <?php
    $username = $_SESSION['username'];
    include('../conn/conn.php');
    $query = "SELECT * FROM customer WHERE username='$username'  ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
    ?>
      <div class="row" id="row_profile">
        <div class="col-md-3"><img style="width: 70px;height:70px;border-radius:50%;border:3px solid #80ED99" class="img_profile" src="<?php echo $row['file'] ?>" width="70" alt=""></div>
        <div class="col-md-9">
          <h4 class="username" style="margin-top: 15px;"><?php echo $row['username'] ?></h4>
          <p class="mailji" style="margin-top: -10px;margin-left: 10px;"><?php echo $row['email'] ?></p>
        </div>
      </div><?php } ?>
    <a class="menu-active" href="backed_dash.php"><i class="bi bi-graph-up"></i><span class="dpn"> Dashboard</span></a>
    <a class="menu" href="backed_product.php"><i class="bi bi-ui-checks-grid"></i> <span class="dpn">จัดการข้อมูล</span></a>
    <a class="menu" href="backed_pos.php"><i class="bi bi-basket-fill"></i><span class="dpn"> ขายสินค้า (POS)</span></a>
    <a class="menu" href="backed_purchaseorder.php"><i class="bi bi-clipboard-data"></i> <span class="dpn">ข้อมูลการสั่งซื้อสินค้า</span></a>
    <a class="menu" href="backed_notpaid.php"><i class="bi bi-cash-coin"></i><span class="dpn"> ยังไม่ชำระเงิน</span></a>
    <a class="menu" href="backed_reviews.php"><i class="bi bi-star"></i><span class="dpn"> รีวิวร้าน</span></a>
    <a class="menu" href="backed_customer.php"><i class="bi bi-people-fill"></i><span class="dpn"> ลูกค้า</span></a>
    <a class="menu" href="backed_purchaseSendback.php?pn=0"><i class="bi bi-chat-text-fill"></i><span class="dpn"> การตอบกลับ</span></a>
    <a class="menu" href="backed_store.php"><i class="bi bi-shop-window"></i><span class="dpn"> ตกแต่งร้านค้า</span></a>
    <a class="btn_logout" onclick="window.location='./logout.php'" href="#"> <span>ออกจากระบบ</span></a>
  </div>
  <?php
      if (isset($_POST["year"]) &&  isset($_POST["month"])) {
        $year = $_POST["year"];
        $month = $_POST["month"];
        if ($year == 'all' && $month == 'all') {
          $where = '';
        } else if ($year != 'all' && $month == 'all') {
          $where = ' AND YEAR(created_at)= "' . $year . '"';
        }else if ($year != 'all' && $month != 'all') {
          $where = ' AND YEAR(created_at)= "' . $year . '" AND MONTH(created_at)= "' . $month . '"';
        }
        else if ($year == 'all' && $month != 'all') {
          $where = 'AND MONTH(created_at)= "' . $month . '"';
        }
      }else {
        $where = '';
      }

      ?>
  <?php
  $month_arrayth = array('มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
  $sql_price = "SELECT * , SUM(purchase_price) FROM purchaseorder
WHERE purchaseorder.purchase_status='รับสินค้าแล้ว' OR purchaseorder.purchase_status='แก้บิล'
GROUP BY purchaseorder.purchase_id  ORDER BY SUM(purchase_price)";
  $resultprice = mysqli_query($conn, $sql_price);
  $sum_total = 0;
  $sum_today = 0;
  $sum_yesterday = 0;
  $datetoday = date("Y-m-d");
  $yesterday = date('Y-m-d', strtotime("-1 day", strtotime($datetoday)));
  while ($rowPrice = mysqli_fetch_array($resultprice)) {
    $sum_total += $rowPrice['purchase_price'];
    $dateChecktoday = $rowPrice['created_at'];
    $dateChecktoday = strtotime($dateChecktoday);
    $daynow = date("Y-m-d", $dateChecktoday);
    if ($daynow == $datetoday) {
      $sum_today += $rowPrice['purchase_price'];
    } else if ($daynow == $yesterday) {
      $sum_yesterday += $rowPrice['purchase_price'];
    }
  }
  ?>

  <div class="center">
    <div class="menu-dash-big">
      <div class="menu-dash">
        <a href="./backed_dash.php" class="item-dash active-dash"><i class="bi bi-pie-chart-fill"></i> กราฟแสดงข้อมูลภาพรวม</a>
        <a href="./backed_dash_product.php" class="item-dash"><i class="bi bi-box2-heart-fill"></i> กราฟแสดงข้อมูลสินค้า</a>
        <a href="./backed_dash_customer.php" class="item-dash"><i class="bi bi-person-heart"></i> กราฟแสดงข้อมูลลูกค้า</a>
      </div>
    </div>
    <div class="content2">

      <form id="sortform" action="" method="post">
        <div class="card-filter">
          <div class="filter-all">
            <p class="label-filter">ตัวกรอง</p>
            <div class="drop-filter">
              <select class="form-select" name="year" id="year" aria-label="Default select example" onchange="this.form.submit();">
                <option value="all">ทุกปี</option>
                <?php
                $year = "SELECT  YEAR(created_at)
                                FROM purchaseorder GROUP BY YEAR(created_at)";
                $result_year = mysqli_query($conn, $year);
                while ($row_yr =  mysqli_fetch_array($result_year)) { ?>
                  <option value="<?php echo $row_yr['YEAR(created_at)'] ?>" <?php
                                                                            if (isset($_POST["year"]) && ($_POST["year"]) == $row_yr['YEAR(created_at)']) {
                                                                              echo ' selected';
                                                                            }
                                                                            ?>><?php echo $row_yr['YEAR(created_at)'] ?></option>
                <?php
                }
                ?>
              </select>

              <select class="form-select" name="month" id="month" aria-label="Default select example" onchange="this.form.submit();">
                <option value="all">ทุกเดือน</option>
                <?php
                $MONTH = "SELECT  MONTH(created_at)
                                FROM purchaseorder GROUP BY MONTH(created_at)";
                $result_MONTH = mysqli_query($conn, $MONTH);
                while ($row_MONTH =  mysqli_fetch_array($result_MONTH)) { ?>
                  <option value="<?php echo $row_MONTH['MONTH(created_at)'] ?>" <?php if (isset($_POST["month"]) && ($_POST["month"]) == $row_MONTH['MONTH(created_at)']) {
                                                                                  echo ' selected';
                                                                                }
                                                                                ?>>
                    <?php
                    if ($row_MONTH['MONTH(created_at)'] == 1) {
                      echo "มกราคม";
                    } else if ($row_MONTH['MONTH(created_at)'] == 2) {
                      echo "กุมภาพันธ์";
                    } else if ($row_MONTH['MONTH(created_at)'] == 3) {
                      echo "มีนาคม";
                    } else if ($row_MONTH['MONTH(created_at)'] == 4) {
                      echo "เมษายน";
                    } else if ($row_MONTH['MONTH(created_at)'] == 5) {
                      echo "พฤษภาคม";
                    } else if ($row_MONTH['MONTH(created_at)'] == 6) {
                      echo "มิถุนายน";
                    } else if ($row_MONTH['MONTH(created_at)'] == 7) {
                      echo "กรกฎาคม";
                    } else if ($row_MONTH['MONTH(created_at)'] == 8) {
                      echo "สิงหาคม";
                    } else if ($row_MONTH['MONTH(created_at)'] == 9) {
                      echo "กันยายน";
                    } else if ($row_MONTH['MONTH(created_at)'] == 10) {
                      echo "ตุลาคม";
                    } else if ($row_MONTH['MONTH(created_at)'] == 11) {
                      echo "พฤศจิกายน";
                    } else if ($row_MONTH['MONTH(created_at)'] == 12) {
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
          <section class="card-all">
            <div class="card-item card-item1">
              <h1 class="sum-price"><?php echo number_format($sum_total) ?> ฿</h1>
              <p class="label-card">ยอดขายทั้งหมด</p>
            </div>
            <section class="card-items">
              <div class="card-item card-item2">
                <h1 class="sum-price"><?php echo number_format($sum_today) ?> ฿</h1>
                <p class="label-card">ยอดขายวันนี้</p>
              </div>
              <div class="card-item card-item3">
                <h1 class="sum-price"><?php echo number_format($sum_yesterday) ?> ฿</h1>
                <p class="label-card">ยอดขายเมื่อวาน</p>
              </div>
            </section>
          </section>
        </div>
      </form>


      <section class="chart-piroid">
        <canvas id="chartDay"></canvas>
      </section>
    </div>
    <div class="content1">
      <section class="chart-piroid">
        <canvas id="chartPiroid"></canvas>
      </section>
      <section class="chart-piroid">
        <canvas id="chartTop"></canvas>
      </section>
    </div>

    <?php

    $period = array(
      '08:00-10:00' => 0,
      '10:00-12:00' => 0,
      '12:00-14:00' => 0,
      '14:00-16:00' => 0,
      '16:00-18:00' => 0,
      '18:00-20:00' => 0,
      '20:00-08:00' => 0
    );
    $dayTH = array(
      'จันทร์' => 0,
      'อังคาร' => 0,
      'พุธ' => 0,
      'พฤหัสบดี' => 0,
      'ศุกร์' => 0,
      'เสาร์' => 0,
      'อาทิตย์' => 0
    );
    $dayLastweek = array(
      'จันทร์' => 0,
      'อังคาร' => 0,
      'พุธ' => 0,
      'พฤหัสบดี' => 0,
      'ศุกร์' => 0,
      'เสาร์' => 0,
      'อาทิตย์' => 0
    );

    // ตามช่วงเวลา
    $sql_sumPurchase = "SELECT * , SUM(purchase_price) FROM purchaseorder
    WHERE (purchaseorder.purchase_status='รับสินค้าแล้ว' OR purchaseorder.purchase_status='แก้บิล') $where
    GROUP BY purchaseorder.purchase_id  ORDER BY SUM(purchase_price)";
    $resultsumPurchase = mysqli_query($conn, $sql_sumPurchase);
    // อาทิตย์ที่แล้ว
    $resultlastWeek = mysqli_query($conn, $sql_sumPurchase);
    $previous_week = strtotime("-1 week +1 day");
    $start_week = strtotime("last sunday midnight", $previous_week);
    // $end_week = strtotime("next saturday", $start_week);
    $Sun_week = date("Y-m-d", $start_week);
    $Mon_week = date('Y-m-d', strtotime("+1 day", strtotime($Sun_week)));
    $Tue_week = date('Y-m-d', strtotime("+2 day", strtotime($Sun_week)));
    $Wed_week = date('Y-m-d', strtotime("+3 day", strtotime($Sun_week)));
    $Thu_week = date('Y-m-d', strtotime("+4 day", strtotime($Sun_week)));
    $Fri_week = date('Y-m-d', strtotime("+5 day", strtotime($Sun_week)));
    $Sat_week = date('Y-m-d', strtotime("+6 day", strtotime($Sun_week)));
    while ($row_lastWeek = mysqli_fetch_assoc($resultlastWeek)) {
      $datelastWeek = $row_lastWeek['created_at'];
      $datelastWeek = strtotime($datelastWeek);
      $daylast = date("Y-m-d", $datelastWeek);

      if ($daylast == $Mon_week) {
        $dayLastweek['จันทร์'] += $row_lastWeek['purchase_price'];
      } else if ($daylast == $Tue_week) {
        $dayLastweek['อังคาร'] += $row_lastWeek['purchase_price'];
      } else if ($daylast == $Wed_week) {
        $dayLastweek['พุธ'] += $row_lastWeek['purchase_price'];
      } else if ($daylast == $Thu_week) {
        $dayLastweek['พฤหัสบดี'] += $row_lastWeek['purchase_price'];
      } else if ($daylast == $Fri_week) {
        $dayLastweek['ศุกร์'] += $row_lastWeek['purchase_price'];
      } else if ($daylast == $Sat_week) {
        $dayLastweek['เสาร์'] += $row_lastWeek['purchase_price'];
      } else if ($daylast == $Sun_week) {
        $dayLastweek['อาทิตย์'] += $row_lastWeek['purchase_price'];
      }
    }

    // Top 10
    $sqlTopUser = "SELECT * , SUM(purchase_price) FROM purchaseorder 
    WHERE purchase_status='รับสินค้าแล้ว' OR purchase_status='แก้บิล' $where 
    GROUP BY user_username ORDER BY SUM(purchase_price) DESC LIMIT 10";
    $resultTopUser = mysqli_query($conn, $sqlTopUser);
    while ($rowTopUser = mysqli_fetch_assoc($resultTopUser)) {
      $labels_username[] = $rowTopUser['user_username'];
      $data_user[] = $rowTopUser['SUM(purchase_price)'];
    }

    while ($row_sumPurchase = mysqli_fetch_assoc($resultsumPurchase)) {
      $date = $row_sumPurchase['created_at'];
      $date = strtotime($date);
      $time = date('H', $date);
      $day = date('D', $date);
      if ($time >= 8 && $time < 10) {
        $period['08:00-10:00'] += $row_sumPurchase['purchase_price'];
      } else if ($time >= 10 && $time < 12) {
        $period['10:00-12:00'] += $row_sumPurchase['purchase_price'];
      } else if ($time >= 12 && $time < 14) {
        $period['12:00-14:00'] += $row_sumPurchase['purchase_price'];
      } else if ($time >= 14 && $time < 16) {
        $period['14:00-16:00'] += $row_sumPurchase['purchase_price'];
      } else if ($time >= 16 && $time < 18) {
        $period['16:00-18:00'] += $row_sumPurchase['purchase_price'];
      } else if ($time >= 18 && $time < 20) {
        $period['18:00-20:00'] += $row_sumPurchase['purchase_price'];
      } else {
        $period['20:00-08:00'] += $row_sumPurchase['purchase_price'];
      }


      if ($day == 'Mon') {
        $dayTH['จันทร์'] += $row_sumPurchase['purchase_price'];
      } else if ($day == 'Tue') {
        $dayTH['อังคาร'] += $row_sumPurchase['purchase_price'];
      } else if ($day == 'Wed') {
        $dayTH['พุธ'] += $row_sumPurchase['purchase_price'];
      } else if ($day == 'Thu') {
        $dayTH['พฤหัสบดี'] += $row_sumPurchase['purchase_price'];
      } else if ($day == 'Fri') {
        $dayTH['ศุกร์'] += $row_sumPurchase['purchase_price'];
      } else if ($day == 'Sat') {
        $dayTH['เสาร์'] += $row_sumPurchase['purchase_price'];
      } else {
        $dayTH['อาทิตย์'] += $row_sumPurchase['purchase_price'];
      }

      $data_sumPurchase[] = $row_sumPurchase['SUM(purchase_price)'];
    }


    ?>
    <script>
      Chart.defaults.font.family = 'Prompt';
      var ctxbar = document.getElementById("chartPiroid").getContext('2d');
      var chartPiroid = new Chart(ctxbar, {
        type: 'line',
        data: {
          labels: <?= json_encode(array_keys($period)) ?>,
          datasets: [{
            borderColor: 'rgb(0, 142, 137)',
            tension: 0.2,
            fill: true,
            labels: {
              display: true,
              render: 'label',
              fontFamily: 'Prompt'
            },
            data: <?= json_encode(array_values($period), JSON_NUMERIC_CHECK); ?>,
            backgroundColor: ['rgb(0, 142, 137,0.5)'],
            borderWidth: 0.5
          }]
        },

        options: {
          cutoutPercentage: 70,
          tooltips: {
            enabled: true,
            font: {
              fontFamily: 'Prompt'
            }
          },
          plugins: {
            title: {
              fontColor: "red",
              display: true,
              text: 'ยอดขายตามช่วงเวลา',
              font: {
                size: 20,
              }
            },
            legend: {
              display: false,
            },
            datalabels: {
              textAlign: 'center',
              formatter: function(value, context) {
                return context.chart.data.labels[context.dataIndex];
              }
            }
          }
        }
      });


      var ctxbar = document.getElementById("chartTop").getContext('2d');
      var chartTop = new Chart(ctxbar, {
        type: 'bar',
        data: {
          labels: <?= json_encode(array_keys($dayLastweek)) ?>,
          datasets: [{
            labels: {
              display: true,
              render: 'label',
              fontFamily: 'Prompt'
            },
            data: <?= json_encode(array_values($dayLastweek), JSON_NUMERIC_CHECK); ?>,
            backgroundColor: ['#22559C'],
            borderWidth: 0.5
          }]
        },

        options: {
          cutoutPercentage: 70,
          tooltips: {
            enabled: true,
            font: {
              fontFamily: 'Prompt'
            }
          },
          plugins: {
            title: {
              display: true,
              text: 'ยอดขายสัปดาห์ที่ผ่านมา',
              font: {
                size: 20
              }
            },
            legend: {
              display: false,
            },
            datalabels: {
              color: 'red',
              textAlign: 'center',
              font: {
                lineHeight: 1.6,
                fontFamily: 'Prompt'
              },
              formatter: function(value, context) {
                return context.chart.data.labels[context.dataIndex];
              }
            }
          }
        }
      });

      var ctxbar = document.getElementById("chartDay").getContext('2d');
      var chartDay = new Chart(ctxbar, {
        type: 'bar',
        data: {
          labels: <?= json_encode(array_keys($dayTH)) ?>,
          datasets: [{
            labels: {
              display: true,
              render: 'label',
              fontFamily: 'Prompt'
            },
            data: <?= json_encode(array_values($dayTH), JSON_NUMERIC_CHECK); ?>,
            backgroundColor: ['#F0C929', '#FF677D', '#046582', '#D97642', '#185ADB', '#9145B6', '#91091E'],
            borderWidth: 0
          }]
        },

        options: {
          responsive: true,
          maintainAspectRatio: false,
          cutoutPercentage: 70,

          tooltips: {
            enabled: true,
            font: {
              fontFamily: 'Prompt'
            }
          },
          plugins: {
            title: {
              display: true,
              text: 'ยอดขายตามวัน',
              font: {
                size: 20
              }
            },
            legend: {
              display: false,
              position: 'right'
            },
            datalabels: {
              color: 'red',
              textAlign: 'center',
              font: {
                lineHeight: 1.6,
                fontFamily: 'Prompt'
              },
              formatter: function(value, context) {
                return context.chart.data.labels[context.dataIndex];
              }
            }
          }
        }
      });
    </script>




  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
</body>

</html>
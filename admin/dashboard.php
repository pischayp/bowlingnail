<!DOCTYPE html>
<html lang="en">
<script scr=https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/helpers.esm.min.js></script>


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div>
    <canvas id="myChart" style="width:250px;max-width:600px"></canvas>
  </div>


  <script>
    var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
    var yValues = [55, 49, 44, 24, 15];
    var barColors = ["red", "green", "blue", "orange", "brown"];

    var ctxbar = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctxbar, {
      type: "bar",
      data: {
        labels: ["Italy", "France", "Spain", "USA", "Argentina"],
        datasets: [{
          backgroundColor: [55, 49, 44, 24, 15],
          data: ["red", "green", "blue", "orange", "brown"],
        }]
      },
      options: {
        legend: {
          display: false
        },
        title: {
          display: true,
          text: "World Wine Production 2018"
        }
      }
    });
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
</body>

</html>
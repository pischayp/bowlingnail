<?php
include('conn.php');
$bookingdate = $_POST['date3'];
// $bookingdate = $_POST['bookingdate'];
$cus_id = $_GET['cus_id'];
$book_id = $_GET['book_id'];
$radionailer = $_POST['radionailer'];

$timeslot = $_POST['timeslot'];
$size = sizeof($timeslot);
// echo $book_id;
$n = 1;
$timeslots = [];
for ($i = 0; $i < sizeof($timeslot); $i++) {
    $x = floatval($timeslot[$i]);
    $x++;
    array_push($timeslots, $timeslot[$i] . "-" . $x . ":00");
}

// echo $timeslots.join(',');
// echo join(',',$timeslots);

$buff = join(',', $timeslots);
mysqli_query($conn, "UPDATE booking set timeslots='$buff',book_date='$bookingdate' WHERE book_id=$book_id");
mysqli_query($conn, "UPDATE book_nail_detail set date_add='$bookingdate', nailer_id = '$radionailer' WHERE book_id=$book_id");

header('location:../booking/booking_payment.php');

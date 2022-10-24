<?php
include ("connection.php");


    $room=$_POST['room'];
    $msg=$_POST['text'];
    $uname=$_POST['uname'];
    $ip=$_SERVER['REMOTE_ADDR'];
    $query="INSERT INTO `msg` (`msg`, `room`, `ip`,`uname`) VALUES ( '$msg', '$room', '$ip','$uname');";
    $run_q=mysqli_query($conn,$query);
mysqli_close($conn);
?>
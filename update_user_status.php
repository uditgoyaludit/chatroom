<?php
session_start();
include("connection.php");
$uname=$_SESSION['uname'];
$code=$_SESSION['code'];
$time=time()+5;
$res=mysqli_query($conn,"update users set last_login='$time' where username='$uname' && room_id='$code'")
?>
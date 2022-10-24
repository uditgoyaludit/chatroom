<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="chatroom";

    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if($conn){

    }
    else{
    echo"no".mysqli_connect_error();}
?>

<?php
session_start();
include("connection.php");
$uname=$_SESSION['uname'];
$code=$_SESSION['code'];
$time=time();
$sql="select * from users where room_id='$code'";
        $run=mysqli_query($conn,$sql);
$res="";
while($row=mysqli_fetch_assoc($run)){ 
    if($row['last_login']>$time){
      $res =$res . '<div>';
      $res =$res .'<p style="color: yellowgreen; font-size:20px; font-family: Courier New, monospace;">'.$row['username'];
      $res=$res.'</p> </div>';

    }}
    echo $res;
    
?>
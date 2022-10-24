<?php
$room=$_POST['room'];
include ('connection.php');
$sql="select msg,stime,uname from msg where room='$room';";
$res ="";
$result =mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_assoc($result)){
    $res =$res . '<div class ="container ">';
    $res =$res .'<h1 style="font-size:20px; color:red; font-family: Courier New, monospace;"><b>'.$row['uname'].'<b></h1>';
    $res =$res .'<p style="font-size:25px; font-family: Brush Script MT, cursive;">'.$row['msg'].'</p>';
    $res =$res .'<span style="font-size:12px; font-family: Courier New, monospace;">'.$row['stime'].'</span></div>';

}
echo $res;
}
?>
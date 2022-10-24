<?php
session_start();
if(isset($_POST['submit'])){
    $oname=$_POST['oname'];
    $name=$_POST['name'];
    $password=$_POST['password'];
    $cp=$_POST['cpassword'];
    $quary = "select room_name from reg where room_name='$name'";
    $data=mysqli_query($conn,$quary);
    $result=mysqli_num_rows($data);
    if($password==$cp){
    if($result!=0){
        
        ?>
        <script>
            alert("Room Exist\nTry Different Name")
        </script>
        <?php
    }
 else{
    $p=password_hash($password,PASSWORD_DEFAULT);
    $query2="INSERT INTO `reg` (`owner_name`, `room_name`, `password`) VALUES ('$oname','$name','$p') ;";
    $r2=mysqli_query($conn,$query2);
    $_SESSION['code']=$name;
    $_SESSION['pwd'] = $password;
    $_SESSION['uname']=$oname;
   ?>
    <script>
    alert("Your Chat Room Is Ready")
</script>
<?php
header("Location:chat.php");
 }


}
else{
    ?>
    <script>
        alert("Password Not Matching")
    </script>
    <?php
}
}
?>
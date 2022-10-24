<?php
include("connection.php");

if (isset($_POST['submit'])) {
    $cname = $_POST['cname'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $query = "select * from reg where room_name='$name'";
    $q2 = mysqli_query($conn, "SELECT username FROM `users` WHERE `username` = '$cname' AND `room_id` = '$name';");
    $data = mysqli_query($conn, $query);
    $email_pass = mysqli_fetch_assoc($data);
    $r2 = mysqli_num_rows($q2);
    $db_pass = $email_pass['password'];
    if (password_verify($password, $db_pass)) {
        if ($r2 == 0) {
        ?>
            <script>
                alert("done")
            </script>
        <?php
            $_SESSION['code'] = $name;
            $_SESSION['pwd'] = $password;
            $_SESSION['uname'] = $cname;
            header("Location:chat.php");

         
        }
        else{
            ?>
                <script> alert("User Name Already Taken For This Room \n\nTry Different User Name") </script>
            <?php
            
    } }
    else {
        ?>
        <script>
            alert("Wrong ID or Password")
        </script>
        <?php }}?>
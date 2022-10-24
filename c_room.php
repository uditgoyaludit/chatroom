<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>ChatRoom</title>
    <link rel="stylesheet" href="css/index1.css">

</head>

<body>

<div class="wrapper">
        <div class="logo">
            <img src="img/icon.png" alt="icon logo">
        </div>
        <div class="text-center mt-4 name">
            Create Room
        </div>
        <form class="p-3 mt-3" method="POST">
        <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="oname" id="name" placeholder="Your Name" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="name" id="name" placeholder="Create Room Code" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="text" name="password" id="code" placeholder="Password" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="text" name="cpassword" id="code" placeholder="Confirm Password" required>
            </div>
            <button class="btn mt-3" name="submit" type="submit">Create</button>
            <div class="text-center fs-6" method="POST" style="text-align: center;">
            <a href="index.php">Join Room</a>
        </div>
        
        </form>

    </div>
</body>
</html>
<?php
include ("connection.php");
include ("c_data.php");
?>
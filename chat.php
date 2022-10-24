<?php
session_start();
include("connection.php");
if (!isset($_SESSION['code']) && !isset($_SESSION['pwd']) && !isset($_SESSION['uname'])) {
  header("Location:index.php");
  die();
} else {
  $code = $_SESSION['code'];
  $uname = $_SESSION['uname'];
  $sql = "select * from reg where room_name='$code'";
  $run = mysqli_query($conn, $sql);
  $res = mysqli_num_rows($run);
  if ($res == 1) {
    $sql1 = "select * from users where  room_id='$code' and username='$uname'";
    $run1 = mysqli_query($conn, $sql1);
    $res1 = mysqli_num_rows($run1);
    if ($res1 == 0) {
      $query = "INSERT INTO `users` (`username`, `room_id`) VALUES ('$uname', '$code');";
      $run = mysqli_query($conn, $query);
      $sql = "select * from users where room_id='$code'";
      $run = mysqli_query($conn, $sql);
      $time = time();
    }
  } else {
    echo "Room ID Not Found";
    header("Location:index.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />

  <title>Chat</title>
  <meta name="description" content="Tuts+ Chat Application" />
  <link rel="stylesheet" href="style.css" />
  <link href='https://fonts.googleapis.com/css?family=Aldrich' rel='stylesheet'>
  <style>
    * {
      margin: 0;
      padding: 0;
    }

    body {
      margin: 20px auto;
      font-family: "Lato";
      font-weight: 300;
    }

    form {
      padding: 15px 25px;
      display: flex;
      gap: 10px;
      justify-content: center;
    }

    form label {
      font-size: 1.5rem;
      font-weight: bold;

    }

    input {
      font-family: "Lato";
    }

    a {
      color: #0000ff;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    #wrapper,
    #loginform {
      margin: 0 auto;
      padding-bottom: 25px;
      background: #eee;
      width: 600px;
      max-width: 100%;
      border: 2px solid #212121;
      border-radius: 4px;
    }

    #loginform {
      padding-top: 18px;
      text-align: center;
    }

    #loginform p {
      padding: 15px 25px;
      font-size: 1.4rem;
      font-weight: bold;
    }

    #chatbox {
      text-align: left;
      margin: 0 auto;
      margin-bottom: 25px;
      padding: 10px;
      background: #fff;
      height: 300px;
      width: 530px;
      border: 1px solid #a7a7a7;
      overflow: auto;
      border-radius: 4px;
      border-bottom: 4px solid #a7a7a7;
    }

    #usermsg {
      flex: 1;
      border-radius: 4px;
      border: 1px solid #ff9800;
    }

    #name {
      border-radius: 4px;
      border: 1px solid #ff9800;
      padding: 2px 8px;
    }

    #submitmsg,
    #enter {
      background: #ff9800;
      border: 2px solid #e65100;
      color: white;
      padding: 4px 10px;
      font-weight: bold;
      border-radius: 4px;
    }

    .error {
      color: #ff0000;
    }

    #menu {
      padding: 15px 25px;
      display: flex;
    }

    #menu p.welcome {
      flex: 1;
    }

    a#exit {
      color: white;
      background: #c62828;
      padding: 4px 8px;
      border-radius: 4px;
      font-weight: bold;
    }

    .msgln {
      margin: 0 0 5px 0;
    }

    .msgln span.left-info {
      color: orangered;
    }

    .msgln span.chat-time {
      color: #666;
      font-size: 60%;
      vertical-align: super;
    }

    .msgln b.user-name,
    .msgln b.user-name-left {
      font-weight: bold;
      background: #546e7a;
      color: white;
      padding: 2px 4px;
      font-size: 90%;
      border-radius: 4px;
      margin: 0 5px 0 0;
    }

    .msgln b.user-name-left {
      background: orangered;
    }

    .anyclass {
      height: 350px;
      overflow-y: scroll;

    }

    #members {
      margin: 0 auto;
      padding-bottom: 25px;
      background: #eee;
      width: 600px;
      max-width: 100%;
      border: 2px solid #212121;
      border-radius: 4px;
      height: 35px;
      overflow-y: scroll;
    }

    .container {
      border: 2px solid #212121;
      border-radius: 4px;
      margin-bottom: 2px;
      padding: 2px;
    }

    .gray {
      color: #666;
    }
  </style>
</head>

<body>
  <div id="wrapper" method="POST">
    <div id="menu">
      <p class="welcome" style=" font-family: 'Aldrich';"> Room Name :- <?php echo $_SESSION['code']; ?> <b></b></p>
      <p class="logout"><a id="exit" href="logout.php">Exit Chat</a></p>
    </div>

    <div id="chatbox" class="anyclass">

    </div>

    <form name="message" method="POST">
      <input name="usermsg" type="text" id="usermsg" required />
      <button name="submitmsg" id="submitmsg" value="Send" ></button>
    </form>
  </div>
  <div id="members" style="background-color:black;">
    <b style="color:white; font-family: 'Aldrich';">Members List</b> <br>
    <div class="userstatus">

    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script>
    function updateUserStatus() {
      jQuery.ajax({
        url: 'update_user_status.php',
        success: function() {

        },
      });
    }

    setInterval(function() {
        updateUserStatus();
      }, 1000

    )

    setInterval(runFunction, 1000);

    function runFunction() {
      $.post("htcont.php", {
          room: '<?php echo $code ?>'
        },
        function(data, status) {
          document.getElementsByClassName('anyclass')[0].innerHTML = data;
        }

      )
    }
    setInterval(getFunction, 1000);

    function getFunction() {
      $.post("get_user_status.php", {
          room: '<?php echo $code ?>',
          uname: '<?php echo $uname ?>'
        },
        function(data, status) {
          document.getElementsByClassName('userstatus')[0].innerHTML = data;
        }

      )
    }
    

    $("#submitmsg").click(function() {
      var clientmsg =$("#usermsg").val();
      $.post("chat_data.php", {
          text: clientmsg,
          room: '<?php echo $code ?>',
          uname: '<?php echo $uname ?>'
        },
        function(data, status) {
          document.getElementsByClassName('anyclass')[0].innerHTML = data;
        });
        return false;
    });
  </script>
</body>

</html>

<?php
session_start();
unset($_SESSION['code'],$_SESSION['pwd']);
?><script>
    location.replace("index.php")
</script>
<?php
die();
?>
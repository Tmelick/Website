<!doctype html>
<html>
<body style="background-color:#000000">
<?php
Session_start();
session_unset();
session_destroy();
echo "<script type='text/javascript'> document.location = 'login.html'; </script>";
?>
</body>
<html>
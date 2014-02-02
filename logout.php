<?php
session_start();
setcookie("PHPSESSID", "", 1);
session_destroy();
session_start();
header('Location: http://shoppersultimate.com/index.php');
?>
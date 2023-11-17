<?php
session_start();
session_destroy();
header("Location:/QuanAo/user/index.php");
exit();
?>
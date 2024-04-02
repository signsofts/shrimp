<?php

session_start();

unset($_SESSION["login"]);
unset($_SESSION["type"]);
session_destroy();

echo "<script>alert('ออกระบบสำเร็จ')</script>";
echo "<script>setTimeout(() => {location.assign('./login.php');}, 500);</script>";
?>
<?php

session_start();

unset($_SESSION["login"]);

session_destroy();

echo "<script>alert('ออกระบบสำเร็จ')</script>";
echo "<script>setTimeout(() => {location.assign('./login.php');}, 500);</script>";
?>
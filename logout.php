<?php
session_start();

session_unset();

$_SESSION['logout'] = 'Log out successful!';
echo "<script>window.location.href = 'login.php'</script>";
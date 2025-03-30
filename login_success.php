<?php
session_start();

$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>로그인 성공</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="login-container">
      <div class="success-box">
        <h1>Log in successful!</h1>
        <h2>Hello, <?= $name ?>!</h2>
        <a href="logout.php">Log out</a>
      </div>
    </div>
  </div>
</body>
</html>

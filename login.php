<?php
include "db.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="login-frame">
                <h1>Log in</h1>                            
                <form method="post" action="login_check.php">
                    <div class="login-box">
                        <div class="input-group">
                            <input type="text" class="login-input" placeholder="id" name="id" required>
                            <input type="password" class="login-input" placeholder="password" name="password" required>
                        </div>
                        <div class="button-group">
                            <button class="button" type="submit">log in</button>
                        </div>
                    </div>
                </form>
                <a href="join.php">Join</a>
            </div>
        </div>
    </div>
</body>
</html>

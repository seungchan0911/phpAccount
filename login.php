<?php
include "db.php";

session_start();
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
        <?php
        if (isset($_SESSION['join_success'])) {
            echo "<a href='login.php' class='messege'>" . $_SESSION['join_success'] . "</a>";
            unset($_SESSION['join_success']);
        } elseif (isset($_SESSION['logout'])) {
            echo "<a href='login.php' class='messege'>" . $_SESSION['logout'] . "</a>";
            unset($_SESSION['logout']);
        } elseif (isset($_SESSION['error'])) {
            echo "<a href='login.php' class='messege'>" . $_SESSION['error'] . "</a>";
            unset($_SESSION['error']);
        }
        ?>
        <div class="login-container">
            <div class="login-frame">
                <h1>Log in</h1>                            
                <form method="post" action="login_check.php">
                    <div class="login-box">
                        <div class="input-group">
                            <input type="text" class="login-input oEInput" placeholder="ID" name="id" autocomplete="off" maxlength="15" required>
                            <div class="input"><input type="password" class="login-input oEInput" placeholder="password" name="password" autocomplete="off" maxlength="15" required><div class="eye"><img src="./img/eye.png" alt=""></div></div>
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

    <script>
		const eye = document.querySelector('.eye')
		const eyeImg = document.querySelector('.eye img')
		const input = document.querySelector('.input input')
		let i = true
        eye.addEventListener('mouseenter', () => {
            eye.parentNode.classList.add('input-active')
        })
        eye.addEventListener('mouseout', () => {
            eye.parentNode.classList.remove('input-active')
        })
		eye.addEventListener('click', () => {
			if (i) {
				input.type = 'text'
				eyeImg.src = './img/ClosedEye.png'
				i = false
			} else {
				input.type = 'password'
				eyeImg.src = './img/Eye.png'
				i = true
			}
		})
        function restrictInput(inputElement) {
            const regex = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/g

            if (regex.test(inputElement.value)) {
                inputElement.value = inputElement.value.replace(regex, '')
            }
        }

        const inputs = document.querySelectorAll('.oEInput')
        inputs.forEach(input => {
            input.addEventListener('input', () => {
                restrictInput(input)
            })
        })
	</script>
</body>
</html>

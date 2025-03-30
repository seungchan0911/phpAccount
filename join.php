<?php
include "db.php";

session_start();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>회원가입</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<?php
        if (isset($_SESSION['adminid'])) {
            echo "<a href='join.php' class='messege'>" . $_SESSION['adminid'] . "</a>";
            unset($_SESSION['adminid']);
        } elseif (isset($_SESSION['reduplication'])) {
            echo "<a href='join.php' class='messege'>" . $_SESSION['reduplication'] . "</a>";
            unset($_SESSION['reduplication']);
        }
        ?>
		<div class="login-container">
			<div class="login-frame">
				<h1>Join</h1>							
				<form method="post" action="rigister.php">
					<div class="login-box">
						<div class="input-group">
							<input type="text" class="login-input oEInput" placeholder="ID" name="id" autocomplete="off" maxlength="15" required oninput="checkInput()">
							<div class="input"><input type="password" class="login-input oEInput" placeholder="password" name="password" autocomplete="off" maxlength="15" required><div class="eye"><img src="./img/eye.png" alt=""></div></div>
							<input type="text" class="login-input" placeholder="name" name="name" autocomplete="off" maxlength="15" required>
							<input type="text" class="login-input oEInput" placeholder="email" name="email" autocomplete="off" maxlength="45" required>
						</div>
						<div class="button-group">
							<button class="button" type="submit">join</button>
						</div>
					</div>
				</form>
				<a href="login.php">Log in</a>
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
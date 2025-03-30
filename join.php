<?php
include "db.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<div class="login-container">
			<div class="login-frame">
				<h1>Join</h1>							
				<form method="post" action="rigister.php">
					<div class="login-box">
						<div class="input-group">
							<input type="text" class="login-input" placeholder="ID" name="id" required>
							<input type="password" class="login-input" placeholder="password" name="password" required>
							<input type="text" class="login-input" placeholder="name" name="name" required>
							<input type="text" class="login-input" placeholder="email" name="email" required>
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
</body>
</html>
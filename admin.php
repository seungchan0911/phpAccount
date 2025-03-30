<?php
include 'db.php';
session_start();

$sql = "SELECT * FROM user WHERE id != 'admin' ORDER BY created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <h2>Hello, Admin!</h2>
        <?php if ($users): ?>
          <div class="users-info">
            <div class="thead">
                <div class="thcontents">ID</div>
                <div class="thcontents">name</div>
                <div class="thcontents">email</div>
                <div class="thcontents">date/time</div>
            </div>
            <?php foreach ($users as $user): ?>
              <div class="thead">
                  <div class="tcontents"><?php echo ($user['id']); ?></div>
                  <div class="tcontents"><?php echo ($user['name']); ?></div>
                  <div class="tcontents"><?php echo ($user['email']); ?></div>
                  <div class="tcontents"><?php echo ($user['created_at']); ?></div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          Nothing found.
        <?php endif; ?>
        <a href="logout.php">Log out</a>
      </div>
    </div>
  </div>
</body>
</html>

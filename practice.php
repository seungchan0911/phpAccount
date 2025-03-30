<?php
include 'db.php';
session_start();

$id = $_POST['id'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM user WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
  $salt = $user['salt'];
  $hashed_password = hash('sha256', $salt . $passowrd);
  
  if ($hashed_password === $user['password']) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];

    if ($username === 'admin') echo '<script>alert("관리자님 환영합니다!")</script>';
    
    echo '<script>location.href = "login_success.php"</script>';
  } else {
    echo '<script>alert()</script>';
  }
}
?>
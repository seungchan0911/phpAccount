<?php
include 'db.php';

session_start();

$id = $_POST['id'];
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];
$salt = uniqid(mt_rand(), true);
$hashed_password = hash('sha256', $salt . $password);
date_default_timezone_set('Asia/Seoul');
$created_at = date('Y-m-d H:i:s');

$sql = 'SELECT COUNT(*) FROM user WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$count = $stmt->fetchColumn();

if ($id === 'admin') {
  echo '<script>alert("사용할 수 없는 아이디입니다!")</script>';
  echo '<script>location.href = "join.php"</script>';
  exit();
} elseif ($count > 0) {
  echo '<script>alert("이미 가입된 아이디입니다!")</script>';
  echo '<script>location.href = "join.php"</script>';
  exit();
}

$sql = 'INSERT INTO user (id, password, salt, name, email, created_at) VALUES (?, ?, ?, ?, ?, ?)';
$stmt = $pdo->prepare($sql);
$stmt->execute([$id, $hashed_password, $salt, $name, $email, $created_at]);

$_SESSION['join_success'] = 'Join successful!';

echo '<script>location.href = "login.php"</script>';
?>
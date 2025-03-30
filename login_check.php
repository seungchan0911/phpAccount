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
  $hashed_password = hash('sha256', $salt . $password);

  if ($hashed_password === $user['password']) {
    $_SESSION['name'] = $user['name'];

    if ($id === 'admin') {
      echo "<script>location.href = 'admin.php'</script>";
    }

    echo "<script>location.href = 'login_success.php'</script>";
  } else {
    $_SESSION['error'] = "ID or password is incorrect!";
    echo "<script>location.href = 'login.php'</script>";
  }
} else {
  $_SESSION['error'] = "ID or password is incorrect!";
  echo "<script>location.href = 'login.php'</script>";
}
?>

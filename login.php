<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Fetch user
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password_hash'])) {
        // Password is correct, set session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        header("Location: protected.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Login</title>
<style>
  body {
    background: #f0f2f5;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: flex;
    height: 100vh;
    justify-content: center;
    align-items: center;
    margin: 0;
  }
  .login-container {
    background: white;
    padding: 40px 50px;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    width: 320px;
    text-align: center;
  }
  .login-container h2 {
    margin-bottom: 24px;
    color: #333;
  }
  .login-container input[type="text"],
  .login-container input[type="password"] {
    width: 100%;
    padding: 12px 14px;
    margin: 10px 0 20px 0;
    border: 1.8px solid #ccc;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
  }
  .login-container input[type="text"]:focus,
  .login-container input[type="password"]:focus {
    border-color: #007BFF;
    outline: none;
    box-shadow: 0 0 6px rgba(0,123,255,0.4);
  }
  .login-container button {
    width: 100%;
    padding: 12px;
    border: none;
    background-color: #007BFF;
    font-size: 1.1rem;
    color: white;
    font-weight: 600;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  .login-container button:hover {
    background-color: #0056b3;
  }
  .error-msg {
    color: #d93025;
    margin-bottom: 15px;
    font-weight: 600;
  }
</style>
</head>
<body>

<div class="login-container">
  <h2>Login</h2>
  <?php if (!empty($error)) : ?>
    <div class="error-msg"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>
  <form method="POST" action="">
    <input name="username" type="text" placeholder="Username" required autofocus />
    <input name="password" type="password" placeholder="Password" required />
    <button type="submit">Login</button>
    <a href="register.php">Register</a>
  </form>
</div>

</body>
</html>


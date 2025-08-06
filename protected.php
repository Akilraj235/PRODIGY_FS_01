<?php
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Protected Page</title>
<style>
  body {
    background: #f0f2f5;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }
  .protected-container {
    background: white;
    padding: 40px 50px;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    width: 360px;
    text-align: center;
    color: #333;
  }
  h1 {
    color: #30ad36ff;
    margin-bottom: 20px;
  }
  p {
    font-size: 1.1rem;
    margin: 10px 0;
  }
  .role-admin {
    color: #2e7d32; /* Green for admin */
    font-weight: 700;
  }
  .role-user {
    color: #555;
    font-style: italic;
  }
  a.logout-btn {
    display: inline-block;
    margin-top: 25px;
    padding: 12px 30px;
    background-color: #d93025;
    color: white;
    text-decoration: none;
    font-weight: 600;
    border-radius: 8px;
    transition: background-color 0.3s ease;
  }
  a.logout-btn:hover {
    background-color: #a52714;
  }
</style>
</head>
<body>

<div class="protected-container">
  <h1>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
  <p>Your role is: <strong><?= htmlspecialchars($_SESSION['role']) ?></strong></p>

  <?php if ($_SESSION['role'] === 'admin'): ?>
    <p class="role-admin">You have admin access.</p>
  <?php else: ?>
    <p class="role-user">You are a regular user. You don't have access</p>
  <?php endif; ?>

  <a href="logout.php" class="logout-btn">Logout</a>
</div>

</body>
</html>

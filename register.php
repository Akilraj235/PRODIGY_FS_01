<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
        exit;
    }

    // Check if user exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        echo "Username already taken.";
        exit;
    }

    // Hash the password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $stmt = $pdo->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)");
    if ($stmt->execute([$username, $passwordHash])) {
        echo "Registration successful! You can now log in.";
    } else {
        echo "Registration failed.";
    }
} else {
?>

<form method="POST">
  Username: <input name="username" type="text" required><br>
  Password: <input name="password" type="password" required><br>
  <button type="submit">Register</button>
</form>

<?php } ?>

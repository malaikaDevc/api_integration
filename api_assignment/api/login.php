<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $token = bin2hex(random_bytes(16));
        echo json_encode(["message" => "Login successful", "token" => $token]);
    } else {
        echo json_encode(["error" => "Invalid email or password"]);
    }
}
?>

<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        echo json_encode(["message" => "Password reset link sent to $email"]);
    } else {
        echo json_encode(["error" => "Email not found"]);
    }
}
?>

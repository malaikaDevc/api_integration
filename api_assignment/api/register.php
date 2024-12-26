<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    try {
        $stmt->execute([$name, $email, $password]);
        echo json_encode(["message" => "Registration successful"]);
    } catch (PDOException $e) {
        echo json_encode(["error" => "Email already exists"]);
    }
}
?>

<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $auth_token = $_GET['token'];

    // This is just a mock authentication check
    if ($auth_token) {
        $stmt = $pdo->query("SELECT id, name, email, created_at FROM users");
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($users);
    } else {
        echo json_encode(["error" => "Unauthorized access"]);
    }
}
?>

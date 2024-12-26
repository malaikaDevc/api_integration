<?php
header("Content-Type: application/json");
require_once "../config.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Query to fetch all users
    $query = "SELECT id, name, email FROM users";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
        echo json_encode(["status" => "success", "data" => $users]);
    } else {
        echo json_encode(["status" => "error", "message" => "Unable to fetch users"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid Request Method"]);
}
?>

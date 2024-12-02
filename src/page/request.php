<?php
include "../helpers/users/users.php";

$conn = mysqli_connect("localhost:3326", "root", "", "base");
if (!$conn) { die("Ошибка подключения: " . mysqli_connect_error()); }

header('Content-Type: application/json');
echo json_encode(['rightAnswer' => getUserRightAnswer($conn)]);
?>
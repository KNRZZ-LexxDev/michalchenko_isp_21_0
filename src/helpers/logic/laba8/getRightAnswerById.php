<?php
$data = json_decode(file_get_contents('php://input', true));

$conn = mysqli_connect("localhost:3326", "root", "", "base");
if (!$conn) { die("Ошибка подключения: " . mysqli_connect_error()); }

$result = mysqli_query($conn, "SELECT right_answer FROM questions WHERE id=$data->questionId");
if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
$row = mysqli_fetch_assoc($result);
$answer = $row['right_answer'];

mysqli_close($conn);

header('Content-type: application/json');
echo json_encode([ 'right_answer' => $answer ]);
?>
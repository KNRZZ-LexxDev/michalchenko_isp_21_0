<?php
$data = json_decode(file_get_contents('php://input', true));

$conn = mysqli_connect("localhost:3326", "root", "", "base");
if (!$conn) { die("Ошибка подключения: " . mysqli_connect_error()); }

$usersTable = array();
$scoreTable = array();

$result = mysqli_query($conn, 'SELECT id FROM users ORDER BY id DESC;');
if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
$row = mysqli_fetch_assoc($result);
$length = $row['id'];

$result = mysqli_query($conn, "SELECT user_name, user_score FROM users ORDER BY user_score DESC;");
if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }

for ($i=1; $i<=$length; $i++) {
    $row = mysqli_fetch_array($result);
    if ($row) {
        $usersTable[] = $row['user_name'];
        $scoreTable[] = $row['user_score'];
    }
}

mysqli_close($conn);

header('Content-type: application/json');
echo json_encode([ 'usersTable' => $usersTable, 'scoreTable' => $scoreTable ]);
?>
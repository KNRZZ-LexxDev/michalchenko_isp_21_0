<?php
function getQuestion($conn, $number) {
    $result = mysqli_query($conn, "SELECT title FROM questions WHERE id = $number");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
    $row = mysqli_fetch_assoc($result);
    return $row['title'];
}

function getAnswer($conn, $number, $n) {
    $var = "answer_$n";
    $result = mysqli_query($conn, "SELECT $var FROM questions WHERE id = $number");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
    $row = mysqli_fetch_assoc($result);
    return $row["$var"];
}

function getRightAnswer($conn, $number) {
    $result = mysqli_query($conn, "SELECT right_answer FROM questions WHERE id = $number");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
    $row = mysqli_fetch_assoc($result);
    return $row['right_answer'];
}


function getImage($conn, $number){
    $result = mysqli_query($conn, "SELECT image FROM questions WHERE id = $number");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
    $row = mysqli_fetch_assoc($result);
    return $row['image'];
}
?>
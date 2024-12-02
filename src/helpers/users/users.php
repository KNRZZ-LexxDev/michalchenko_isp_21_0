<?php
function setUserAnswer($conn, $value) {
    $result = mysqli_query($conn, " UPDATE users SET user_answer=$value WHERE user_name='user' ");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
}

function setRightAnswer($conn, $value) {
    $result = mysqli_query($conn, " UPDATE users SET right_answer=$value WHERE user_name='user' ");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
}

function getUserAnswer($conn) {
    $result = mysqli_query($conn, " SELECT user_answer FROM users WHERE user_name='user' ");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
    $row = mysqli_fetch_assoc($result);
    return $row['user_name'];
}

function getUserRightAnswer($conn) {
    $result = mysqli_query($conn, " SELECT right_answer FROM users WHERE user_name='user' ");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
    $row = mysqli_fetch_assoc($result);
    return $row['right_answer'];
}

function getRightScore($conn) {
    $result = mysqli_query($conn, " SELECT SQL_NO_CACHE user_score FROM users WHERE user_name='user' ");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
    $row = mysqli_fetch_assoc($result);
    return $row['user_score'];
}

function setRightScore($conn, $value) {
    $result = mysqli_query($conn, " UPDATE users SET user_score=$value WHERE user_name='user' ");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
}
?>
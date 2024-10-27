<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Михальченко Алексей">
        <meta name="description" content="Веб-сайт для лабораторных работ">
        <meta name="keywords" content="Лабораторная, Михальченко">
        <title>Лабораторная работа 5</title>
        <link rel="stylesheet" type="text/css" href="../style/lab5.css"> <!-- Подключаем CSS файл, если нужно -->
    </head>

    <body>

        <?php 
            include_once ('../components/header.php');
            all_header('lab5');
        ?>

        <div class="LabPage__Content">
            <h1 class="LabPage__Content-Head-One">Лабораторная работа 5</h1>

            <p class="LabPage__Content-Desc">Описание задач:</p>

            <ul class="LabPage__Content-TaskWrap">
                <li class="LabPage__Content-Task"> Задача 1: Дано целое число K и набор ненулевых целых чисел; признак его завершения — число 0. Вывести номер последнего числа в наборе, 
                    большего K. Если таких чисел нет, то вывести 0. </li>
                <li class="LabPage__Content-Task"> Задача 2: Дано вещественное число A и целое число N (> 0). Найти A в степени N : AN = A·A· . . . ·A (числа A перемножаются N раз). </li>
            </ul>

            <div class="LabPage__Content-Decision-Wrap">
                <h2 class="LabPage__Content-Head-Two"> Решения задач </h2>

                <!-- Форма для задачи 1 -->
                <form class="LabPage__Content-Task-Form" method="post" action="">
                    <h3 class="LabPage__Content-Head-Three">Задача 1</h3>
                    <label class="LabPage__Content-label" for="value">Введите число:</label>
                    <input class="LabPage__Content-Input" type="number" id="value" name="value" required>
                    <br><br>
                    <label class="LabPage__Content-label" for="numbers">Введите набор чисел (разделяйте пробелами, завершите 0):</label>
                    <input class="LabPage__Content-Input" type="text" id="numbers" name="numbers" required>
                    <br><br>
                    <button class="LabPage__Content-Button" type="submit" name="submit_task1" >Решить задачу 1</button>
                </form>

                <?php
                if (isset($_POST['submit_task1'])) {
                    $K = intval($_POST['value']);
                    $numbers = explode(' ', trim($_POST['numbers']));
                    array_pop($numbers); // Удаляем последний элемент (0)

                    function findLastGreaterThanK($K, $numbers) {
                        $lastIndex = 0;
                        foreach ($numbers as $index => $number) {
                            if ($number > $K) {
                                $lastIndex = $index + 1; // +1 для перехода к 1-индексации
                            }
                        }
                        return $lastIndex;
                    }

                    $result = findLastGreaterThanK($K, $numbers);
                    echo "<p>Результат задачи 1: Номер последнего числа больше $K: $result</p>";
                }
                ?>

                <!-- Форма для задачи 2 -->
                <form  class="LabPage__Content-Task-Form" method="post" action="">
                    <h3 class="LabPage__Content-Head-Three">Задача 2</h3>
                    <label class="LabPage__Content-label" for="a">Введите число:</label>
                    <input class="LabPage__Content-Input" type="number" step="any" id="a" name="a" required>
                    <br><br>
                    <label class="LabPage__Content-label" for="n">Введите число (> 0):</label>
                    <input class="LabPage__Content-Input" type="number" id="n" name="n" min="1" required>
                    <br><br>
                    <button class="LabPage__Content-Button" type="submit" name="submit_task2">Решить задачу 2</button>
                </form>

                <?php
                if (isset($_POST['submit_task2'])) {
                    $A = floatval($_POST['a']);
                    $N = intval($_POST['n']);

                    function power($A, $N) {
                        $result = 1;
                        for ($i = 0; $i < $N; $i++) {
                            $result *= $A; // Перемножаем A N раз
                        }
                        return $result;
                    }

                    $result = power($A, $N);
                    echo "<p>Результат задачи 2: $A в степени $N: $result</p>";
                }
                ?>

                <br><br>
                <a href="../index.php" class="LabPage__Link">Назад на главную страницу</a>
            </div>
        </div>

        <?php 
            include_once ('../components/footer.php');
            all_footer('lab5');
        ?>
    </body>
</html>

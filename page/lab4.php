<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Михальченко Алексей">
        <meta name="description" content="Веб-сайт для лабораторных работ">
        <meta name="keywords" content="Лабораторная, Михальченко">
        <title>Лабораторная работа 4</title>
        <link rel="stylesheet" type="text/css" href="../style/lab4.css"> <!-- Подключаем CSS файл, если нужно -->
    </head>

    <body>

        <div class="LabPage__Header">
            <p class="LabPage__Header-text">AlexDevJourney</p>
        </div>

        <div class="LabPage__Content">
            <h1 class="LabPage__Content-Head-One">Лабораторная работа 4</h1>

            <p class="LabPage__Content-Desc">Описание задач:</p>

            <ul class="LabPage__Content-TaskWrap">
                <li class="LabPage__Content-Task"> Задача 1: Даны три целых числа: A, B, C. Проверить истинность высказывания: «Ровно два из чисел A, B, C являются положительными». </li>
                <li class="LabPage__Content-Task"> Задача 2: Дано трехзначное число. Даны три числа. Найти сумму двух наибольших из них. </li>
                <li class="LabPage__Content-Task"> Задача 3: Дана система уравнений. Решить ее. Вариант 15</li>
                <li class="LabPage__Content-Task"> Задача 4: Дана система уравнений. Решить ее. Вариант 15</li>
            </ul>

            <div class="LabPage__Content-Decision-Wrap">
                <h2 class="LabPage__Content-Head-Two"> Решения задач </h2>

                <!-- Форма для первой задачи -->
            <form class="LabPage__Content-Task-Form" method="post" action="">
                <h3 class="LabPage__Content-Head-Three">Задача 1</h3>
                <input class="LabPage__Content-Input" type="text" name="num_1-1" placeholder="  Введите первое число" required />
                <input class="LabPage__Content-Input" type="text" name="num_1-2" placeholder="  Введите второе число" required />
                <input class="LabPage__Content-Input" type="text" name="num_1-3" placeholder="  Введите третье число" required />
                <button class="LabPage__Content-Button" type="submit" name="checkPositive">Решить задачу 1</button>
            </form>

            <?php
            if (isset($_POST['checkPositive'])) {
                $A = $_POST['num_1-1'];
                $B = $_POST['num_1-2'];
                $C = $_POST['num_1-3'];

                function areExactlyTwoPositive($A, $B, $C) {
                    $positiveCount = 0;

                    if ($A > 0) $positiveCount++;
                    if ($B > 0) $positiveCount++;
                    if ($C > 0) $positiveCount++;

                    return $positiveCount === 2;
                }

                if (areExactlyTwoPositive($A, $B, $C)) {
                    echo "<p class='answer__text'>TRUE</p>";
                } else {
                    echo "<p class='answer__text'>FALSE</p>";
                }
            }
            ?>

            <!-- Форма для второй задачи -->
            <form class="LabPage__Content-Task-Form" method="post" action="">
                <h3 class="LabPage__Content-Head-Three">Задача 2</h3>
                <input class="LabPage__Content-Input" type="text" name="num_2-1" placeholder="  Введите первое число" required />
                <input class="LabPage__Content-Input" type="text" name="num_2-2" placeholder="  Введите второе число" required />
                <input class="LabPage__Content-Input" type="text" name="num_2-3" placeholder="  Введите третье число" required />
                <button class="LabPage__Content-Button" type="submit" name="sumLargest">Решить задачу 2</button>
            </form>

            <?php
            if (isset($_POST['sumLargest'])) {
                $A2 = $_POST['num_2-1'];
                $B2 = $_POST['num_2-2'];
                $C2 = $_POST['num_2-3'];

                function sumOfTwoLargest($A, $B, $C) {
                    $numbers = [$A, $B, $C];
                    rsort($numbers);
                    return $numbers[0] + $numbers[1];
                }

                $sum = sumOfTwoLargest($A2, $B2, $C2);
                echo "<p class='answer__text'>Сумма двух наибольших чисел: $sum</p>";
            }
            ?>



                <!-- Форма для третьей задачи -->
                <form class="LabPage__Content-Task-Form" method="post" action="">
                    <h3 class="LabPage__Content-Head-Three">Задача 3</h3>
                    <input class="LabPage__Content-Input" type="text" name="num_3-1" placeholder="  Введите значение x" required />
                    <button class="LabPage__Content-Button" type="submit" name="drawUr3">Решить задачу 3</button>
                </form>

                <?php
                if (isset($_POST['drawUr3'])) {
                    $x = $_POST['num_3-1'];

                    function calculateY_3($x) {
                        $a = 5.5;
                        $b = 3.1;
                        $y = 0;

                        switch (true) {
                            case $x >= 1:
                                $y = exp($x) + 1;
                                echo "<p class='answer__text'>ветка 1 и корень равен {$y} при аргументе {$x}</p>";
                                break;
                            case $x > 0 && $x < 1:
                                $y = cos(sqrt($a * $x)) ** 2; // Исправлено
                                echo "<p class='answer__text'>ветка 2 и корень равен {$y} при аргументе {$x}</p>";
                                break;
                            case $x <= 0:
                                $y = log($b + sqrt(abs($x)));
                                echo "<p class='answer__text'>ветка 3 и корень равен {$y} при аргументе {$x}</p>";
                                break;
                        }
                    }

                    calculateY_3($x); // Вызов функции
                }
                ?>

                <!-- Форма для четвертой задачи -->
                <form class="LabPage__Content-Task-Form" method="post" action="">
                    <h3 class="LabPage__Content-Head-Three">Задача 4</h3>
                    <input class="LabPage__Content-Input" type="text" name="num_4-1" placeholder="  Введите значение x" required />
                    <button class="LabPage__Content-Button" type="submit" name="drawUr4">Решить задачу 4</button>
                </form>

                <?php
                if (isset($_POST['drawUr4'])) {
                    $x = $_POST['num_4-1'];

                    function calculateY_4($x) {
                        $a = 5.5;
                        $b = 3.1;
                        $y = 0;

                        switch (true) {
                            case $x >= 1:
                                $y = exp($x) + 1;
                                echo "<p class='answer__text'>ветка 1 и корень равен {$y} при аргументе {$x}</p>";
                                break;
                            case $x > 0 && $x < 1:
                                $y = cos(sqrt($a * $x)) ** 2; // Исправлено
                                echo "<p class='answer__text'>ветка 2 и корень равен {$y} при аргументе {$x}</p>";
                                break;
                            case $x <= 0:
                                $y = log($b + sqrt(abs($x)));
                                echo "<p class='answer__text'>ветка 3 и корень равен {$y} при аргументе {$x}</p>";
                                break;
                        }
                    }

                    calculateY_4($x); // Вызов функции
                }
                ?>

                <br><br>
                <a href="../index.php" class="LabPage__Link">Назад на главную страницу</a>
            </div>
        </div>

        <div class="LabPage__Footer">
            <p class="LabPage__Footer-text">Все права защищены 2024 &#169</p>
        </div>

    </body>
</html>

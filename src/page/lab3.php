<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Михальченко Алексей">
        <meta name="description" content="Веб-сайт для лабораторных работ">
        <meta name="keywords" content="Лабораторная, Михальченко">
        <title>Лабораторная работа 3</title>
        <link rel="stylesheet" type="text/css" href='../style/lab3.css'> <!-- Подключаем CSS файл, если нужно -->
    </head>

    <body>
        <?php 
            include('../components/header.php');
            all_header("lab3");
        ?>

        <div class="LabPage__Content">
            <h1 class="LabPage__Content-Head-One">Лабораторная работа 3</h1>

            <p class="LabPage__Content-Desc">Описание задач:</p>

            <ul class="LabPage__Content-TaskWrap">
                <li class="LabPage__Content-Task"> Задача 1: Дана площадь S круга. Найти его диаметр D и длину L окружности, ограничивающей этот круг, учитывая, что L = 2·π·R, S = π·R². В качестве значения π использовать 3.14.</li>
                <li class="LabPage__Content-Task"> Задача 2: Дано трехзначное число. Вывести число, полученное при перестановке цифр сотен и десятков исходного числа (например, 123 перейдет в 213).</li>
            </ul>

            <div class="LabPage__Content-Decision-Wrap">
                <h2 class="LabPage__Content-Head-Two"> Решения задач </h2>

                <!-- Форма для первой задачи -->
                <form class="LabPage__Content-Task-Form" method="post" action="">
                    <h3 class="LabPage__Content-Head-Three">Задача 1</h3>
                    <input class="LabPage__Content-Input" type="text" name="circleArea" placeholder="  Введите площадь S" required />
                    <button class="LabPage__Content-Button" type="submit" name="calculateCircle">Решить задачу 1</button>

                    <?php
                        if (isset($_POST['calculateCircle'])) {
                            $S = $_POST['circleArea'];
                            $result = calculateCircleProperties($S);
                            echo "<p class='LabPage__Content-Result-Text'> Диаметр D: " . round($result['Diameter'], 2) . "</p>";
                            echo "<p class='LabPage__Content-Result-Text'> Длина окружности L: " . round($result['Length'], 2) . "</p>";
                        }
                    ?>
                </form>


                <!-- Форма для второй задачи -->
                <form class="LabPage__Content-Task-Form" method="post" action="">
                    <h3 class="LabPage__Content-Head-Three">Задача 2</h3>
                    <input class="LabPage__Content-Input" type="number" name="threeDigitNumber" placeholder="  Введите трехзначное число" required />
                    <button class="LabPage__Content-Button" type="submit" name="swapDigits">Решить задачу 2</button>
                    <?php
                        if (isset($_POST['swapDigits'])) {
                            $number = $_POST['threeDigitNumber'];
                            $result = swapDigits($number);
                            echo "<p class='LabPage__Content-Result-Text'>Результат: " . $result . "</p>";
                        }
                    ?>
                </form>
                <br><br>
                <div class='LabPage__Content-Back'>
                    <a href="../../index.php" class="LabPage__Link">Go Home</a>
                </div>
            </div>
        </div>

        <?php
            // Задача 1: Площадь круга
            function calculateCircleProperties($S) {
                $pi = 3.14; // Значение π
                $R = sqrt($S / $pi); // Радиус
                $D = 2 * $R; // Диаметр
                $L = 2 * $pi * $R; // Длина окружности

                return [
                    'Diameter' => $D,
                    'Length' => $L
                ];
            }

            // Задача 2: Перестановка цифр
            function swapDigits($number) {
                if ($number < 100 || $number > 999) {
                    return "Ошибка: число должно быть трехзначным.";
                }

                $numStr = (string)$number;
                $swapped = $numStr[1] . $numStr[0] . $numStr[2];

                return (int)$swapped;
            }
        ?>

        <?php 
            include('../components/footer.php');
            all_footer("lab3");
        ?>
    </body>
</html>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Михальченко Алексей">
        <meta name="description" content="Веб-сайт для лабораторных работ">
        <meta name="keywords" content="Лабораторная, Михальченко">
        <title>Лабораторная работа 6</title>
        <link rel="stylesheet" type="text/css" href="../style/lab5.css">
    </head>

    <body>
        <?php
        include_once ('../components/header.php');
        all_header('lab6');

        function task1($array, $k, $l) {
            return array_sum(array_slice($array, $k - 1, $l - $k + 1));
        }

        function task2($array, $k, $l) {
            // Переставляем в обратном порядке элементы между AK и AL, включая AL
            $subArray = array_slice($array, $k, $l - $k); // Изменено: теперь включает AL
            $subArray = array_reverse($subArray);
            return array_merge(array_slice($array, 0, $k), $subArray, array_slice($array, $l));
        }

        $resultTask1 = '';
        $resultTask2 = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['submit_task1'])) {
                $array = array_map('intval', explode(',', $_POST['array']));
                $k = intval($_POST['k']);
                $l = intval($_POST['l']);
                
                if ($k >= 1 && $l <= count($array) && $k <= $l) {
                    $resultTask1 = 'Сумма элементов: ' . task1($array, $k, $l);
                } else {
                    $resultTask1 = 'Ошибка: некорректные значения K и L.';
                }
            }

            if (isset($_POST['submit_task2'])) {
                $array = array_map('intval', explode(',', $_POST['array']));
                $k = intval($_POST['k']);
                $l = intval($_POST['l']);
                
                if ($k >= 1 && $l <= count($array) && $k < $l) {
                    $resultTask2 = 'Новый массив: ' . implode(', ', task2($array, $k, $l));
                } else {
                    $resultTask2 = 'Ошибка: некорректные значения K и L.';
                }
            }
        }
        ?>

        <div class="LabPage__Content">
            <h1 class="LabPage__Content-Head-One">Лабораторная работа 6</h1>

            <p class="LabPage__Content-Desc">Описание задач:</p>

            <ul class="LabPage__Content-TaskWrap">
                <li class="LabPage__Content-Task"> Задача 1: Дан массив размера N и целые числа K и L (1 ≤ K ≤ L ≤ N ). Найти сумму элементов массива с номерами от K до L включительно. </li>
                <li class="LabPage__Content-Task"> Задача 2: Дан массив A размера N и целые числа K и L (1 ≤ K < L ≤ N ). Переставить в обратном порядке элементы массива, расположенные между элементами AK и AL, включая AL. </li>
            </ul>

            <div class="LabPage__Content-Decision-Wrap">
                <h2 class="LabPage__Content-Head-Two"> Решения задач </h2>

                <!— Форма для задачи 1 —>
                <form class="LabPage__Content-Task-Form" method="post" action="">
                    <h3 class="LabPage__Content-Head-Three">Задача 1</h3>
                    <label for="array">Введите массив (через запятую):</label>
                    <input type="text" name="array" required>
                    <label for="k">Введите K:</label>
                    <input type="number" name="k" required>
                    <label for="l">Введите L:</label>
                    <input type="number" name="l" required>
                    <button class="LabPage__Content-Button" type="submit" name="submit_task1">Решить задачу 1</button>
                </form>

                <?php if ($resultTask1): ?>
                    <p><?php echo $resultTask1; ?></p>
                <?php endif; ?>

                <!— Форма для задачи 2 —>
                <form class="LabPage__Content-Task-Form" method="post" action="">
                    <h3 class="LabPage__Content-Head-Three">Задача 2</h3>
                    <label for="array">Введите массив (через запятую):</label>
                    <input type="text" name="array" required>
                    <label for="k">Введите K:</label>
                    <input type="number" name="k" required>
                    <label for="l">Введите L:</label>
                    <input type="number" name="l" required>
                    <button class="LabPage__Content-Button" type="submit" name="submit_task2">Решить задачу 2</button>
                </form>

                <?php if ($resultTask2): ?>
                    <p><?php echo $resultTask2; ?></p>
                <?php endif; ?>

                <br><br>
                <a href="../index.php" class="LabPage__Link">Назад на главную страницу</a>
            </div>
        </div>

        <?php
        include_once ('../components/footer.php');
        all_footer('lab6');
        ?>
    </body>
</html>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Михальченко Алексей">
        <meta name="description" content="Веб-сайт для лабораторных работ">
        <meta name="keywords" content="Лабораторная, Михальченко">
        <title>Лабораторная работа 7</title>
        <link rel="stylesheet" type="text/css" href="../style/lab7.css">
    </head>

    <body>
        <?php
            include_once ('../components/header.php');
            all_header('lab7');

            
            $result_task3 = '';
            $result_task4 = '';

            
            if (isset($_POST['submit_task3'])) {
                $matrix_input = $_POST['matrix'];
                $matrix = array_map(function($row) {
                    return array_map('intval', explode(',', trim($row)));
                }, explode(';', trim($matrix_input)));

                
                $row_sums = [];
                foreach ($matrix as $row) {
                    $row_sums[] = array_sum($row);
                }
                $result_task3 = implode(", ", $row_sums);
            }

            
            if (isset($_POST['submit_task4'])) {
                $matrix_input = $_POST['matrix'];
                $matrix = array_map(function($row) {
                    return array_map('intval', explode(',', trim($row)));
                }, explode(';', trim($matrix_input)));

                
                $column_to_remove = -1;
                for ($col = 0; $col < count($matrix[0]); $col++) {
                    $all_positive = true;
                    foreach ($matrix as $row) {
                        if ($row[$col] <= 0) {
                            $all_positive = false;
                            break;
                        }
                    }
                    if ($all_positive) {
                        $column_to_remove = $col;
                        break;
                    }
                }

                if ($column_to_remove !== -1) {
                    foreach ($matrix as &$row) {
                        unset($row[$column_to_remove]);
                    }
                    
                    foreach ($matrix as &$row) {
                        $row = array_values($row);
                    }
                }

                
                $result_task4_rows = [];
                foreach ($matrix as $row) {
                    $result_task4_rows[] = implode(", ", $row);
                }
                $result_task4 = implode("<br>", $result_task4_rows);
            }
        ?>

        <div class="LabPage__Content">
            <h1 class="LabPage__Content-Head-One">Лабораторная работа 7</h1>

            <p class="LabPage__Content-Desc">Описание задач:</p>

            <ul class="LabPage__Content-TaskWrap">
                <li class="LabPage__Content-Task"> Задача 1:  Дана  матрица  размера  M ×  N.  Для  каждой  строки  матрицы  найти сумму ее элементов. </li>
                <li class="LabPage__Content-Task"> Задача 2:  Дана матрица размера M × N. Удалить ее первый столбец, содержа-щий только положительные элементы. Если требуемых столбцов нет, то вывести матрицу без изменений. </li>
            </ul>

            <!-- Форма для задачи 1 -->
            <form class="LabPage__Content-Task-Form" method="post" action="">
                <h3 class="LabPage__Content-Head-Three">Задача 1: Сумма элементов строк матрицы</h3>
                <input class="LabPage__Content-Input" name="matrix" required placeholder="строки через точку с запятой, элементы через запятую:"></input>
                <button class="LabPage__Content-Button" type="submit" name="submit_task3">Решить задачу 1</button>
            </form>

            <!-- Форма для задачи 2 -->
            <form class="LabPage__Content-Task-Form" method="post" action="">
                <h3 class="LabPage__Content-Head-Three">Задача 2: Удаление первого столбца с положительными элементами</h3>
                <input class="LabPage__Content-Input" name="matrix" required placeholder="Введите матрицу (строки через точку с запятой, элементы через запятую):"></input>
                <button class="LabPage__Content-Button" type="submit" name="submit_task4">Решить задачу 2</button>
            </form>

            <br><br>

            <?php
                if (!empty($result_task3)) {
                    echo "<h3 class='LabPage__Content-Result-Text'>Результат задачи 3:</h3>";
                    echo "<p class='LabPage__Content-Result-Text'>Суммы элементов строк: " . $result_task3 . "</p>";
                }

                if (!empty($result_task4)) {
                    echo "<h3 class='LabPage__Content-Result-Text'>Результат задачи 4:</h3>";
                    echo "<p class='LabPage__Content-Result-Text'>Обновленная матрица:</p>";
                    echo "<pre class='LabPage__Content-Result-Text'>" . $result_task4 . "</pre>";
                }
            ?>

            <div class='LabPage__Content-Back'>
                <a href="../../index.php" class="LabPage__Link">Go Home</a>
            </div>
        </div>

        <?php
        include_once ('../components/footer.php');
        all_footer('lab7');
        ?>
    </body>
</html>

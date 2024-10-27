<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Михальченко Алексей">
        <meta name="description" content ="Веб-сайт для лабораторных работ">
        <meta name="keywords" contect="Лабораторная, Михальченко">
        <title>Главная страница</title>
        <link rel="stylesheet" type="text/css" href="./style/index.css"> <!-- Подключаем CSS файл, если нужно -->
    </head>
    <body>
        <?php 
            include_once ('components/header.php');
            all_header('main');
        ?>

        <?php 
            include_once ('components/navigation.php');
            show_navigation();
        ?>


        <?php 
            include_once ('components/footer.php');
            all_footer('main');
        ?>
    </body>
</html>

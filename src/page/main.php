<?php 
include('src/components/footer.php');
include('src/components/navigation.php');
include('src/components/header.php');

function show_main(){
    echo "
        <!DOCTYPE html>
        <html lang='ru'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <meta name='author' content='Михальченко Алексей'>
                <meta name='description' content ='Веб-сайт для лабораторных работ'>
                <meta name='keywords' contect='Лабораторная, Михальченко'>
                <title>HomePage</title>
                <link rel='stylesheet' type='text/css' href='src/style/main.css'> <!-- Подключаем CSS файл, если нужно -->
            </head>

            <body>
                ". all_header('main') ."
                ". show_navigation() ."
                ". all_footer('main') ."
            </body>
            
        </html>
    ";
};
?>
<?php 
function show_navigation() {
    echo <<<HTML
    
    <div class="MainPage__Content">
        <h1 class="MainPage__Content-Head">Сайт для лабораторных работ</h1>
        <p class="MainPage__Content-Author">Михальченко Алексея</p>
        <p class="MainPage__Content-Group">Группа ИСП-21</p>
        <div class="MainPage__Content-LinkWrap">
            <a href="./page/lab3.php" class="MainPage__Content-Link">Перейти к лабораторной работе №3</a>
            <a href="./page/lab4.php" class="MainPage__Content-Link">Перейти к лабораторной работе №4</a>
            <a href="./page/lab5.php" class="MainPage__Content-Link">Перейти к лабораторной работе №5</a>
            <a href="./page/lab6.php" class="MainPage__Content-Link">Перейти к лабораторной работе №6</a>
        </div>
    </div>
HTML;
}
?>

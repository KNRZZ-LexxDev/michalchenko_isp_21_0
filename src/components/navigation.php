<?php 
function show_navigation() {
    echo <<<HTML
    
    <div class="MainPage__Content">

        <div class="MainPage__Content-About-Work-Wrap">
            <li class="MainPage__Content-About-Work-Pos"> Senior Developer </li>
            <li class="MainPage__Content-About-Work-Access"> AVAILABLE FOR WORK </li>
        </div>


        <div class="MainPage__Content-About-Me-Wrap">

            <div class="MainPage__Content-About-Me-Text-Wrap">
                <h1 class="MainPage__Content-Head">Hi, I KnRZz Dev</h1>
                <p class="MainPage__Content-Description">Devkot's lead developer. <br/> I sometimes do freelance work.</p> 
                <div class="MainPage__Content-About-Buttons-Wrap">
                    <button class="MainPage__Content-Hire-Button">Hire Me</button>
                    <button class="MainPage__Content-Copy-Button">Copy Mail</button>
                </div>
            </div>

            <div class="MainPage-About-Me-Image-Wrap">
                <div class="MainPage-About-Me-Image-Background">
                    <div class="MainPage-About-Me-Image"></div>
                </div>
            </div>


        </div>

        <div class="MainPage__Content-Link-Wrap">

            <div class="MainPage__Content-Link-Head-Wrap">
                <li class="MainPage__Content-Link-Mark"> Lab Work's </li>
            </div>

            <div class="MainPage__Content-Lab-Wrap">
                <a href="src/page/lab3.php" class="MainPage__Content-Link-Head">Lab 3</a>
                <p class="MainPage__Content-Link-Desc">Lab Description</p>
            </div>

            <div class="MainPage__Content-Lab-Wrap">
                <a href="src/page/lab4.php" class="MainPage__Content-Link-Head">Lab 4</a>
                <p class="MainPage__Content-Link-Desc">Lab Description</p>
            </div>

            <div class="MainPage__Content-Lab-Wrap">
                <a href="src/page/lab5.php" class="MainPage__Content-Link-Head">Lab 5</a>
                <p class="MainPage__Content-Link-Desc">Lab Description</p>
            </div>

            <div class="MainPage__Content-Lab-Wrap">
                <a href="src/page/lab6.php" class="MainPage__Content-Link-Head">Lab 6</a>
                <p class="MainPage__Content-Link-Desc">Lab Description</p>
            </div>

            <div class="MainPage__Content-Lab-Wrap">
                <a href="src/page/lab6.php" class="MainPage__Content-Link-Head">Lab 6</a>
                <p class="MainPage__Content-Link-Desc">Lab Description</p>
            </div>

            <div class="MainPage__Content-Lab-Wrap">
                <a href="src/page/lab7.php" class="MainPage__Content-Link-Head">Lab 7</a>
                <p class="MainPage__Content-Link-Desc">Lab Description</p>
            </div>

            <div class='MainPage__Content-Lab-Wrap'>
                    <a href='src/classes/main.php' class='MainPage__Content-Link-Head'>Daily Task</a>
                    <p class='MainPage__Content-Link-Desc'>Lab 7 Task Proof</p>
                </div>

            <div class="MainPage__Content-Lab-Wrap">
                <a href="src/page/laba8.php" class="MainPage__Content-Link-Head">Lab 8</a>
                <p class="MainPage__Content-Link-Desc">Quiz</p>
            </div>
        </div>

        <div class="MainPage__CallAction-Wrap">
            <p class="MainPage__CallAction-Head"> Do work together. </p>
            <p class="MainPage__CallAction-Desc"> Creating user experience and visual appealing design </p>
            <div class="MainPage__Content-About-Buttons-Wrap">
                <button class="MainPage__Content-Hire-Button"> Hire Me </button>
                <button class="MainPage__Content-Copy-Button"> Copy Mail </button>
            </div>
        </div>
    </div>
HTML;
}
?>

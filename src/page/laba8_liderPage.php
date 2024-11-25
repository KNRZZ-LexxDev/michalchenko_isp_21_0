<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex">
        <meta name="description" content="main page">
        <meta name="keywords" content="php, html">
        <meta name="author" content="Lider Denis">
        <link rel="stylesheet" href="../style/quiz.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Atomic+Age&family=Roboto:ital,wght@0,100;0,4R 00;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">
        <title>Лидеры</title>
    </head>

    <body>
        <div class="lider__page__wrap">
            <header>
                <button onClick="clearSessionStorage()" class='lider__page__home-wrap'>
                        <a class="lider__page__home-text" href="../../index.php">
                            Home
                        </a>
                </button>
    
                <p class="lider__page__head__text">Таблица лидеров</p>
            </header>
             
            
            <div id="scoreTable" class="score__wrap">
    
            </div>
        </div>

        <script>
            fetch('http://medusa6m.beget.tech/liders')
                .then(response => response.json()).then(data => {
                    for(let i = 0; i < data.usersTable.length; i++){
                        let new_tr = document.createElement(`p`);
                        // if(data.usersTable[i] == '0')
                        new_tr.textContent = `Ник: ${data.usersTable[i]} | Счет: ${data.scoreTable[i]}`
                        new_tr.classList.add("user__item");
                        let scoreTable = document.getElementById('scoreTable');
                        scoreTable.appendChild(new_tr);
                    }
                })
        </script>

    <script src='../helpers/logic/laba8/logic.js'></script>
    </body>

</html>
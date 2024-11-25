<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <meta name="description" content="main page">
    <meta name="keywords" content="php, html">
    <meta name="author" content="Michalchenko Alex">
    <link rel="stylesheet" href="../style/quiz.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Atomic+Age&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>Викторина</title>
</head>

<body>
    <div class="main">
        <div class="main__card">
            <div class="main__card__header">
                
                <button onClick="clearSessionStorage()" class='main__card__header__buttonExit__closeButton'>
                    <a class="main__card__header__buttonExit" href="../../index.php">
                        <img class="main__card__header__buttonExit__img" src="../img/closeIcon.png" alt="X">
                    </a>
                </button>


                <div id="countdown" class="hiddenElemnt">
                    <div id="countdown-number"></div>
                    <svg>
                        <circle r="18" cx="20" cy="20"></circle>
                    </svg>
                </div>


                <div class="main__card__header__wrapper__rightCounter hiddenElemnt">
                    <img class="main__card__header__wrapper__rightCounter__img" src="../img/heart.png" alt="?">
                    <p class="main__card__header__wrapper__rightCounter__text" id='rightCounter'>rightCounter</p>
                </div>

            </div>
            <div class="main__card__body hiddenElemnt">
                <img alt="questionImage" id="questionImage" class="question__img">
                <p class="main__card__body__counter" id="questionsCounter">question ? of 10</p>
                <p class="main__card__body__question" id='questionWording'>questionWording</p>
            </div>
            <div class="main__card__buttons">

                <button class="main__card__buttons__form__button hiddenElemnt" onClick="getAnswer(1)">answer_1</button>
                <button class="main__card__buttons__form__button hiddenElemnt" onClick="getAnswer(2)">answer_2</button>
                <button class="main__card__buttons__form__button hiddenElemnt" onClick="getAnswer(3)">answer_3</button>
                <button class="main__card__buttons__form__button hiddenElemnt" onClick="getAnswer(4)">answer_4</button>

                <div class="main__card__buttons__hiddenDiv" id="toLiderPage">
                    <input type="text" placeholder="Имя пользователя" class="main__card__buttons__hidden__Divinput"
                        id="hiddenDiv__input">
                    <p class="main__card__buttons__hidden__Divtext" id="hiddenWarningText">Введите имя пользователя</p>
                    <button class="main__card__buttons__hidden__Divbutton" onClick="createUser()">К таблице лидеров</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        if (!(sessionStorage.getItem('counters'))) {
            sessionStorage.setItem('counters', JSON.stringify({
                "rightCounter": 0,
                "questionCounter": 1,
            }));
            var rightCounter = 0;
            var questionCounter = 1;
        } else {
            var rightCounter = JSON.parse(sessionStorage.getItem('counters')).rightCounter;
            var questionCounter = JSON.parse(sessionStorage.getItem('counters')).questionCounter;
        }
        document.getElementById('rightCounter').innerText = rightCounter;
        document.getElementById('questionsCounter').innerText = `question ${questionCounter} of 10`;

        if (questionCounter >= 11) {
            document.getElementById('toLiderPage').style.display = "flex";
            let hiddneElementsArray = document.getElementsByClassName("hiddenElemnt");
            for (let i = 0; i < hiddneElementsArray.length; i++) { hiddneElementsArray[i].style.display = "none"; }
        } else {
            var countdownNumberEl = document.getElementById('countdown-number');
            var countdown = 30;

            countdownNumberEl.textContent = countdown;

            setInterval(function () {
                countdown = --countdown <= 0 ? 30 : countdown;

                countdownNumberEl.textContent = countdown;
                if (countdown <= 1) {
                    getAnswer(1);
                }
            }, 1000);

            fetch('../helpers/logic/laba8/getQuestionById.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ 'questionCounter': questionCounter })
            }).then(response => response.json()).then(data => {
                document.getElementById('questionWording').innerText = (JSON.stringify(data.question)).slice(1, -1);
            }).catch(error => { console.error('Error at getQuestionById:', error) })

            fetch('../helpers/logic/laba8/getAnswersById.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ 'questionCounter': questionCounter })
            }).then(response => response.json()).then(data => {
                let buttonsArray = document.getElementsByClassName("main__card__buttons__form__button");
                for (var i = 0; i < buttonsArray.length; i++) {
                    buttonsArray[i].innerText = (data.answer[i]);
                }
            }).catch(error => { console.error('Error at getAnswersById:', error) })
        }

        fetch('../helpers/logic/laba8/getImageById.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ 'questionCounter': questionCounter })
        }).then(response => response.json()).then(data => {
            let image = document.getElementById("questionImage");
            image.setAttribute('src', data.image);
        }).catch(error => { console.error('Error at getImageById.php:', error) })
    </script>

    <script src='../helpers/logic/laba8/logic.js'></script>
</body>

</html>

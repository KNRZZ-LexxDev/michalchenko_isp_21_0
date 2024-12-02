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
    <link rel="stylesheet" href="../style/lab10.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Atomic+Age&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>Викторина</title>
</head>

<body>
    <div class="main">

        <div class="main_input-wrap">
            <div class="main_footer">
                <input type="text" id="user_name" name="message" placeholder="Введите имя" class="input_text-user">
                <!-- <button class="button_telegram"><img class="img_back" src="../img/plane.png" alt=""></button> -->
            </div>

            <div class="main_footer">
                <input type="text" id="message" name="message" placeholder="Введите сообщение"
                    class="input_text-message">
                <button class="button_telegram"><img class="img_back" src="../img/plane.png" alt=""
                        onclick="addUser()"></button>
            </div>
        </div>


        <div class="main_wrapper">
            <div class="main_header">
                <a class="button_back" href="../../index.php"><img class="img_back" src="../img/back.png" alt="">
                    <p class="link_text">Назад</p>
                </a>
                <p class="title_text">LexxGram</p>
            </div>
            <div class="main_content" id="main_content">
                <div class="message_container">
                    <!-- <h2 class="message__user-name">UserName</h2>
                    <p class="message__send-date">SomeDate</p>
                    <p class="message__user-text">Some text</p> -->
                </div>

            </div>
        </div>

        <script>
            let ip_address = '';

            fetch('../helpers/ip_checker/ip_checker.php').then(response => response.json()).then(data => ip_address = data.ip_address);
            console.log()

            // fetch('http://medusa6m.beget.tech/messages/all_messages')
            //     .then(response => response.json()).then(data => {
            //         console.log(data);
            //         for (let i = 0; i < data.users.length; i++) { console.log(data.users[i], data.message[i], data.dateData[i]); }
            //     }).catch(err => { console.log(err); })

            function addUser() {
                fetch('http://medusa6m.beget.tech/messages/add_message', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        'userName': document.getElementById("user_name").value,
                        'message': document.getElementById('message').value,
                        'ip_address': ip_address,
                    })
                })
                    .catch(error => { console.error('Произошла:', error) })
                // .ther(response => response.json())
            }
        </script>

        <script>
            const messageContainer = document.getElementById('main_content'); // Убедитесь, что у вас есть элемент с этим ID

            function renderMessage(user, date, message) {
                const messageBox = document.createElement('div');
                messageBox.className = 'message_container'; // Убедитесь, что это класс для контейнера сообщения

                const nameElement = document.createElement('p');
                nameElement.className = 'message__user-name';
                nameElement.textContent = user;

                const dateElement = document.createElement('p');
                dateElement.className = 'message__send-date';
                dateElement.textContent = date;

                const textElement = document.createElement('p');
                textElement.className = 'message__user-text';
                textElement.textContent = message;

                messageBox.appendChild(nameElement);
                messageBox.appendChild(dateElement);
                messageBox.appendChild(textElement);
                messageContainer.appendChild(messageBox);
            }

            // Устанавливаем интервал для перезагрузки данных каждые 5 секунд
            setInterval(function () {
                fetch('http://medusa6m.beget.tech/messages/all_messages')
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        if (data.users.length !== 0) {
                            const messageContainers = document.getElementsByClassName('message_container');
                            console.log(messageContainers);

                            // Очистим контейнер перед добавлением новых сообщений
                            messageContainer.innerHTML = '';

                            for (let i = 0; i < data.users.length; i++) { // Исправлено с lenght на length
                                renderMessage(data.users[i], data.dateData[i], data.message[i]);
                            }
                        }
                    })
                    .catch(error => console.log('Произошла ошибка: ', error));
            }, 5000); // 5000 миллисекунд = 5 секунд

        </script>

    </div>
</body>

</html>
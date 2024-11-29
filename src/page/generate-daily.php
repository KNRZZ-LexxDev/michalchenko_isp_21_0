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
    <link rel="stylesheet" href="../style/generate.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Atomic+Age&family=Roboto:ital,wght@0,100;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Картинки генерация</title>
</head>

<body>
    <div class="generate__daily">
        <input id="nameInput" placeholder="Введите name" class="generate__daily__input"/>
        <input id="widthInput" type="number" placeholder="Введите width" class="generate__daily__input"/>
        <input id="heightInput" type="number" placeholder="Введите height" class="generate__daily__input"/>
        <input id="colorInput" placeholder="Введите color (r,g,b)" class="generate__daily__input"/>
        <button id="generateButton" class="generate__daily__button">Сгенерировать изображение</button>
    </div>

    <script>
        document.getElementById('generateButton').addEventListener('click', function () {
            const title = document.getElementById('nameInput').value;
            const width = document.getElementById('widthInput').value;
            const height = document.getElementById('heightInput').value;
            const color = document.getElementById('colorInput').value;

            fetch('http://medusa6m.beget.tech/generate', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    "title": title,
                    "width": parseInt(width), 
                    "height": parseInt(height), 
                    "color": color
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // Здесь вы можете обработать ответ от сервера
            })
            .catch(error => {
                console.error('Error at addIGenImage:', error);
            });
        });
    </script>
</body>

</html>

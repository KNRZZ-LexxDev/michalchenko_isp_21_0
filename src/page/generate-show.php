<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Генерация изображений</title>
    <link rel="stylesheet" href="../style/generate.css">
</head>

<body>
    <div id="imagesContainer" class="imagesContainer"></div>

    <script>
            fetch('http://medusa6m.beget.tech/show')
                .then(response => response.json())
                .then(images => {
                    const imagesContainer = document.getElementById('imagesContainer');
                    imagesContainer.innerHTML = ''; // Очищаем контейнер перед добавлением новых изображений

                    images.forEach(image => {
                        const imageBox = document.createElement('div');
                        imageBox.className = 'image-box';
                        imageBox.style.width = `${image.width}px`;
                        imageBox.style.height = `${image.height}px`;
                        imageBox.style.backgroundColor = `rgb(${image.color})`; // Используем rgb формат для цвета

                        const titleElement = document.createElement('div');
                        titleElement.className = 'image-title';
                        titleElement.textContent = image.title;

                        imagesContainer.appendChild(titleElement);
                        imagesContainer.appendChild(imageBox);
                    });
                })
                .catch(error => {
                    console.error('Error loading images:', error);
                });

        // Загружаем изображения при загрузке страницы
        // window.onload = loadImages;
    </script>
</body>
</html>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: *");
        header("Access-Control-Allow-Headers: *");
        http_response_code(200);
        exit(0);
    }
    
    header('Content-type: application/json');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: *");
    
    $method = $_SERVER['REQUEST_METHOD'];
    $request = explode("/", trim($_SERVER['REQUEST_URI'], "/" ) );
    
    $conn = mysqli_connect("localhost", "medusa6m_db", "ICsE0DJ0!4zO", "medusa6m_db");
    if (!$conn) { die("Ошибка подключения: " . mysqli_connect_error()); }
    
    if( $request[0] !== "") {
        switch($request[0]) {
            case 'questions':
                $data = json_decode(file_get_contents('php://input', true));
                
                $result = mysqli_query($conn, "SELECT title FROM questions WHERE id = $data->questionCounter");
                if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
                $row = mysqli_fetch_assoc($result);
                $question = $row['title'];
                
                header('Content-type: application/json');
                echo json_encode([ 'question' => $question ]);
                break;
            case 'answers':
                switch($request[1]) {
                    case 'all':
                          function __getAnswer($conn, $number, $n) {
                            $temp = "answer_$n";
                            $result = mysqli_query($conn, "SELECT $temp FROM questions WHERE id = $number");
                            if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
                            $row = mysqli_fetch_assoc($result);
                            return $row["$temp"];
                        }
                        
                        $data = json_decode(file_get_contents('php://input', true));
                        $answers = array(
                            __getAnswer($conn, $data->questionCounter, 1),
                            __getAnswer($conn, $data->questionCounter, 2),
                            __getAnswer($conn, $data->questionCounter, 3),
                            __getAnswer($conn, $data->questionCounter, 4)
                        );
    
                        echo json_encode([ 'answers' => $answers ]);
                        break;
                        
                    case 'right':
                        $data = json_decode(file_get_contents('php://input', true));
    
                        
                        if (!$conn) { die("Ошибка подключения: " . mysqli_connect_error()); }
                        
                        $result = mysqli_query($conn, "SELECT right_answer FROM questions WHERE id=$data->questionId");
                        if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
                        $row = mysqli_fetch_assoc($result);
                        $answer = $row['right_answer'];
                        
                     
                        
                        header('Content-type: application/json');
                        echo json_encode([ 'right_answer' => $answer ]);
                        break;
                }
                break;
            case 'image':
                $data = json_decode(file_get_contents('php://input', true));
                if (!$conn) { die("Ошибка подключения: " . mysqli_connect_error()); }
                
                $result = mysqli_query($conn, "SELECT question_image FROM questions WHERE id = $data->questionCounter");
                if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
                $row = mysqli_fetch_assoc($result);
                $image = $row['question_image'];
                
                
                header('Content-type: application/json');
                echo json_encode([ 'image' => $image ]);
                break;
                
            case 'users':
                switch($request[1]) {
                    case 'add':
                        $data = json_decode(file_get_contents('php://input', true));
    
                        $result = mysqli_query($conn, "INSERT INTO users(user_name, user_score) VALUES('$data->userName', $data->score)");
                        if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
                        
                        header('Content-type: application/json');
                        echo json_encode([ 'status' => 200 ]);
                        break;
                }
                break;
            case 'liders':
              $data = json_decode(file_get_contents('php://input', true));
    
               
                if (!$conn) { die("Ошибка подключения: " . mysqli_connect_error()); }
                
                $usersTable = array();
                $scoreTable = array();
                
                $result = mysqli_query($conn, 'SELECT id FROM users ORDER BY id DESC;');
                if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
                $row = mysqli_fetch_assoc($result);
                $length = $row['id'];
                
                $result = mysqli_query($conn, "SELECT user_name, user_score FROM users ORDER BY user_score DESC;");
                if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
                
                for ($i=1; $i<=$length; $i++) {
                    $row = mysqli_fetch_array($result);
                    if ($row) {
                        $usersTable[] = $row['user_name'];
                        $scoreTable[] = $row['user_score'];
                    }
                }
                
                
                header('Content-type: application/json');
                echo json_encode([ 'usersTable' => $usersTable, 'scoreTable' => $scoreTable ]);
                break;
                
    
            case 'generate':
                // Новый endpoint для генерации изображений
                $data = json_decode(file_get_contents('php://input', true));
                
                if (isset($data->width) && isset($data->height) && isset($data->color) && isset($data->title)) {
                    // Создаем изображение
                    $width = (int)$data->width;
                    $height = (int)$data->height;
                    $color = $data->color; // Ожидаем, что color будет в формате "r,g,b"
                    
                    // Преобразуем цвет из строки в массив
                    $rgb = explode(',', $color);
                    if (count($rgb) === 3) {
                        $r = (int)$rgb[0];
                        $g = (int)$rgb[1];
                        $b = (int)$rgb[2];
                        
                        // Проверяем, что значения RGB находятся в допустимом диапазоне
                        if ($r < 0 || $r > 255 || $g < 0 || $g > 255 || $b < 0 || $b > 255) {
                            echo json_encode(['error' => 'Значения RGB должны быть в диапазоне от 0 до 255']);
                            exit();
                        }
                    } else {
                        echo json_encode(['error' => 'Некорректный формат цвета. Ожидается "r,g,b"']);
                        exit();
                    }
                    
                    // Создаем пустое изображение
                    $image = imagecreate($width, $height);
                    
                    // Устанавливаем цвет фона
                    $backgroundColor = imagecolorallocate($image, $r, $g, $b);
                    
                    // Заполняем изображение цветом
                    imagefilledrectangle($image, 0, 0, $width, $height, $backgroundColor);
                    
                    // Устанавливаем заголовок для изображения
                    header('Content-Type: image/png');
                    
                    // Выводим изображение в формате PNG
                    imagepng($image);
                    
                    
                    $result = mysqli_query($conn, "INSERT INTO images( title, width, height, color) VALUES('$data->title',  $data->width, $data->height, '$data->color')");
                    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
                    
                    exit();
                } else {
                    echo json_encode(['error' => 'Недостаточно данных для создания изображения']);
                }
                break;
                
                case 'show':
                    // Новый endpoint для получения изображений
                    $result = mysqli_query($conn, "SELECT title, width, height, color FROM images");
                    
                    if ($result) {
                        $images = [];
                        while ($row = mysqli_fetch_assoc($result)) {
                            $images[] = $row;
                        }
                        echo json_encode($images);
                    } else {
                        echo json_encode(['error' => 'Ошибка выполнения запроса: ' . mysqli_error($conn)]);
                    }
                    exit();
                
                    }
    
    } else {
        echo "Index api page";
    }
?>
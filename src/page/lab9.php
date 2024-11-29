<?php 

    header('Content-Type' : 'application/json');
    //REST API
    //User request to api
    $method = $_SERVER['REQUEST_ METHOD']; //Хранит метод обращения

    //Catch user request
    $request = explode('/', trim($_SERVER['REQUEST_URI'], '/') );
    var_dump($request);
    var_dump($method);
    var_dump($_SERVER['REQUEST_URI']);


    //posts/all   | return all posts
    //posts/1 | return specific post
    //posts/add | add post to db


    if($request[0] !== ''){
        var_dump($request);

        switch($request[0]){
            case 'posts':
                switch($request[1]{
                    case 'all':
                        echo json_encode({
                            'list' => [1,2,3]
                        });
                        break

                    case 'id': 
                        echo json_encode({
                            'id' => $request[1],
                            'text' => 'some text'
                        });
                        break;

                    case 'add':
                        echo json_encode({
                            'id' => $request[1],
                            'text' => 'some text'
                        });
                        break;
                })
            
        }
    } else {
        echo 'index api page'
    }
?>


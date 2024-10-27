<?php 
    function all_footer($page) {

        $main = '<div class="MainPage__Footer">' . 
                    '<p class="MainPage__Footer-text">Все права защищены 2024 &#169</p>' .
                '</div>';

        $lab = '<div class="LabPage__Footer">' .
                    '<p class="LabPage__Footer-text">Все права защищены 2024 &#169</p>' .
                '</div>';

        switch($page){
            case 'main': 
                echo $main;
                break;
            
            case 'lab3':
                echo $lab;
                break;

            case 'lab4':
                echo $lab;
                break;

            case 'lab5':
                echo $lab;
                break;

            case 'lab6':
                echo $lab;
                break;

            // case 'lab3':
            //     echo $lab;
            //     break;

            default:
                return;
                break;

        };
    };
?>
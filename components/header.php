<?php 
function all_header($page) {

    $main = '<div class="MainPage__Header">' . 
                    '<p class="MainPage__Header-text">AlexDevJourney</p>' .
            '</div>';

    $lab = '<div class="LabPage__Header">' . 
                '<p class="LabPage__Header-text">AlexDevJourney</p>' .
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

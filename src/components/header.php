<?php 
function all_header($page) {

    // $main = '<div class="MainPage__Header">' . 
    //                 '<p class="MainPage__Header-text">AlexDevJourney</p>' .
    //         '</div>';

    $main = "
                <div class='MainPage__Header'>  
                    <div class='MainPage__Home'></div>
                    <div class='MainPage__User'></div>
                    <div class='MainPage__Project'></div>
                    <button class='MainPage__Button'>Hire Me</button>
                </div>
            ";

    $lab = "
                <div class='LabPage__Header'>  
                    <div class='LabPage__Home'></div>
                    <div class='LabPage__User'></div>
                    <div class='LabPage__Project'></div>
                    <button class='LabPage__Button'>Hire Me</button>
                </div>
            ";;

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

        case 'lab7':
            echo $lab;
            break;

        default:
            return;
            break;

    };
};
?>

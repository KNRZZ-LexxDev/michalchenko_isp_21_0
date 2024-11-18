<?php 
    function all_footer($page) {

        $main = '<div class="MainPage__Footer">' . 
                    '<p class="MainPage__Footer-text">© 2024 Subtle Folio Framer Template</p>' .
                    '<p class="MainPage__Footer-text"> by Nur Praditya // MorvaLabs // Framer</p>' .
                '</div>';

        $lab = '<div class="LabPage__Footer">' .
                    '<p class="LabPage__Footer-text">© 2024 Subtle Folio Framer Template</p>' .
                    '<p class="LabPage__Footer-text"> by Nur Praditya // MorvaLabs // Framer</p>' .
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

            case 'lab7':
                echo $lab;
                break;

            default:
                return;
                break;

        };
    };
?>
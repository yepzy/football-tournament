<?php

    $dao =  new DAO();

    if(isset($_GET['type']))
    {
        switch ($_GET['type']) {
            case 'team':
                # code...
                break;

            case 'state':
                # code...
                break;

            case 'group':
                # code...
                break;

            case 'tournament':
                # code...
                break;
            default:
                # code...
                break;
        }

    }
    else
    {
        header('Location: home.php');
        echo '<script>alert(\'No any type\');</script>';
    }
 ?>

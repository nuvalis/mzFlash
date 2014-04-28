<?php
    
    require(__DIR__ . '/Message.php');


    function redirect($url)
    {
        header('Location: ' . $url);
        exit();
    }

    $app = new Message();

    var_dump($_SESSION);

    $app->success("Shit");

    echo $app->show();
<?php
    
    require(__DIR__ . '/Message.php');


    function redirect($url)
    {
        header('Location: ' . $url);
        exit();
    }

    $app = new Message();

    var_dump($app);

    $app->error("Something Yeah");

    redirect("http://awesome.dev/kmom4/app/src/Flash/index2.php");
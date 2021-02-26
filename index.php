<?php

    $myRoutes=[
        'login' => 'view/login.php',
        'home'  => 'view/home.php',
        'test'  => 'view/one/tow.php'
    ];
    // get : http://localhost:3030/one/tow?key=val
    $linkReq=$_SERVER['REQUEST_URI'];   // get : /one/tow?key=val
    $linkReq = ltrim($linkReq, '/');    // get : one/tow?key=val (delete first /)
    $path=explode("?",$linkReq);        // separt the get parame
    // print_r($path);
    if (isset($myRoutes[$path[0]])) {
        if (isset($path[1])) {
            echo $myRoutes[$path[0]]."?".$path[1]; //routing
        }else{
            echo $myRoutes[$path[0]]; //routing
        }
    }else{
        return header("HTTP/1.0 404 Not Found");;
    }
?>
<?php

    $myRoutes=[
        'login' => 'view\login.php',
        'home'  => 'view\home.php',
        'test/{id}'  => 'view\one\tow.php',
        // 'test/user/{id}'  => 'view\one\tow.php',
        'test/user/{id}/delete/{staus}/{par}'  => 'view\one\tow.php',

    ];
    // get : http://localhost:3030/one/tow?key=val
    $linkReq=$_SERVER['REQUEST_URI'];   // get : /one/tow?key=val
    $linkReq = ltrim($linkReq, '/');    // get : one/tow?key=val (delete first /)
    $path=explode("?",$linkReq);        // separt the get parame
    // print_r($path);
    if (isset($myRoutes[$path[0]])) {
        include $myRoutes[$path[0]]; //routing
    }else{
        $pathParam=explode("/",$path[0]);
        $countPathParam=count($pathParam);
        // print_r($pathParam);
        
        foreach ($myRoutes as $key => $value) {
            $good=0;
            $routeParam=explode("/",$key);
            if (count($routeParam) == $countPathParam) {
                // echo '</br> ok';
                for ($i=0; $i < $countPathParam; $i++) { 
                    if ($pathParam[$i] == $routeParam[$i]) {
                            // echo '</br> good : '.$pathParam[$i].' == '.$routeParam[$i];
                            $good++;
                        }
                }
                $p=0;
                foreach ($routeParam as  $arg) {
                    if ($arg[0] == '{') {
                        $arg=ltrim($arg, '{');
                        $arg=chop($arg, '}');
                        // echo $arg;
                        $_GET[$arg]=$pathParam[$p];
                    }
                $p++;
                }

                include $myRoutes[$key];
                    // break;
            }
        }
        // print_r($_GET);
        return header("HTTP/1.0 404 Not Found");
    }
?>
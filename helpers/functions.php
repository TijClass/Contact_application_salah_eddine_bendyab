<?php
    function appConfig($var)
    {
        $includ=require(__DIR__.'\..\config\app.php');
        $index=explode(".",$var);
        $last=$includ;
        foreach ($index as $item){
            $last=$last[$item];
        }

        return $last;
    }

    //test
    // print_r(appConfig('test.hi'));
    
?>
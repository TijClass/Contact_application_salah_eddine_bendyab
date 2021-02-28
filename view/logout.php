<?php
    include('./components/header.php');
    if (getSession('login') === false) {
        header("location:login");
        die;
    }
    CreateSession('login',false);
    CreateSession('user','');
    header("location:login");
?>
<?php
    include('./components/header.php');
    CreateSession('login',false);
    CreateSession('user','');
    header("location:login");
?>
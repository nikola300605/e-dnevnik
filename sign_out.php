<?php

    require_once (__DIR__."/config/config.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        session_unset();
        header('Location: index.php');
    }
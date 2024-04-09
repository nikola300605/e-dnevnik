<?php

    require_once (__DIR__."/config/config.php");
        session_unset();
        header('Location: index.php');
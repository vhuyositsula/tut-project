<?php

include("session.php");
include("connection.php");



    session_unset();

    session_destroy();
    
    header("location:index.php");





?>
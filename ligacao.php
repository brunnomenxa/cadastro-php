<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "banco";

    $ligacao = new PDO("mysql:host=$host;dbname=".$dbname, $user, $pass);
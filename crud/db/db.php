<?php
    $dbhost = "localhost";
    $db = "steam";
    $username = "root";
    $password = "root";
    // ? создаем соединение
    $con = mysqli_connect($dbhost, $username, $password, $db);

    // ? проверяем соединение
    if(!$con) {
        die("Connection failed". mysqli_connect_error());
    }
    // echo "Connected!";
?>
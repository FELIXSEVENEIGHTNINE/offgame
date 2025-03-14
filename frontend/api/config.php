<?php
    $servername = "localhost";
    $db_username = "root";
    $db_pw = "";
    $db_name = "offgame";

    $conn = new mysqli($servername, $db_username, $db_pw, $db_name);

    if($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

?>
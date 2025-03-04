<?php
    if(session_status() >= 1) {
        header("Location: login.php");
    } else header("Location: register.php");
?>
<?php
    // this is where the functions are called

    function getBlog() {
        include('../api/config.php');
        try {
            $result = mysqli_query($conn, "SELECT * FROM blog ORDER BY blog_id DESC");
            return $result;
        } catch (Exception $e) {
            return "Error";
        }
    }

    function addBlog() {
        include('../api/config.php');

        try {
            $result = mysqli_query($conn, "INSERT FROM blog VALUES ");
            return $result;
        } catch (Exception $e) {
            return "Error";
        }
    }


?>
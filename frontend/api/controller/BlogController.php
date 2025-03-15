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

    function addBlog($blogarray) {
        include('../api/config.php');

        $title = $blogarray[0];
        $date = $blogarray[1];
        $content = $blogarray[2];

        try {
            $result = mysqli_query($conn, "INSERT INTO blog (blog_date, blog_title, blog_text) VALUES ('$date', '$title', '$content')");
            return $result;
        } catch (Exception $e) {
            return "Error";
        }
    }


?>
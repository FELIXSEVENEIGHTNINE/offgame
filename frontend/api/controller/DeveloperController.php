<?php
    // this is where the functions are called

    function getDeveloperGames($devid) {
        include('../api/config.php');
            $result = mysqli_query($conn, "SELECT * FROM games WHERE developer_id=$devid");
            $row = $result->fetch_assoc();

            return $row;
    }

    function getDeveloperId($userid) {
        include('../api/config.php');
        $result = mysqli_query($conn, "SELECT * FROM developers WHERE user_id=$userid");
        $row = $result->fetch_assoc();

        return $row['developer_id'];
        
    }

    // function getDeveloperNamesAndId() {
    //     include('../api/config.php');
    //     $result = mysqli_query($conn, "SELECT games.developer_id, developers.developer_name FROM developers INNER JOIN games ON games.developer_id");
    //     $row = $result->fetch_assoc();

    //     return $row; 
    // }

    function getDeveloperNameFromId($id) {
        include('../api/config.php');
        $result = mysqli_query($conn, "SELECT games.developer_id, developers.developer_name FROM developers LEFT JOIN games ON games.developer_id = developers.developer_id WHERE developers.developer_id=$id");
        $row = $result->fetch_assoc();

        return $row;
    
    }
?>
<?php
    // this is where the functions are called

    function getGames() {
        include('../api/config.php');
        try {
            //mysqli_query($conn, "SELECT * FROM games INNER JOIN developers ON games.developer_id = developers.developer_id");
            $sql = "SELECT games.game_id, games.game_name, games.game_description, games.game_logo, developers.developer_name, games.price FROM (games INNER JOIN developers ON games.developer_id = developers.developer_id)";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return "Error";
        }

    }

    function getGameById($id) {
        include('../api/config.php');


        try {
            $result = mysqli_query($conn, "SELECT * FROM games WHERE game_id=$id");
            $row = $result->fetch_assoc();

            return $row;
        } catch (Exception $e) {
            return "Error";
        }

    }

    function getGameGenre() {
        // SELECT game_category.game_id, game_category.genre_id, genres.genre_name, games.game_name FROM ((game_category INNER JOIN games ON game_category.game_id = games.game_id) INNER JOIN genres ON game_category.genre_id = genres.genre_id);
    }

    function addGame() {

    }

    function updateGame() {

    }

    function deleteGame() {

    }


?>
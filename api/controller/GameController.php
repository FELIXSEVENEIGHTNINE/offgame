<?php
    // this is where the functions are called

    function getGames() {
        include('../api/config.php');
        try {
            $result = mysqli_query($conn, "SELECT * FROM games");
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

    function addGame() {

    }

    function updateGame() {

    }

    function deleteGame() {

    }


?>
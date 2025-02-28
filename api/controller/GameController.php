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

    function getGamesById() {

    }

    function addGame() {

    }

    function updateGame() {

    }

    function deleteGame() {

    }


?>
<?php
    // this is where the functions are called

    function getGameAds() {
        include('../api/config.php');
        try {
            $result = mysqli_query($conn, "SELECT * FROM games WHERE ad=1");
            return $result;
        } catch (Exception $e) {
            return "Error";
        }

    }

    function getGamesAdsById() {

    }

    function addGameAd() {

    }

    function updateGameAd() {

    }

    function deleteGameAd() {

    }


?>
<?php
    //header("Content-Type: application/json");

    //rest api
    function User($method) {
        include_once('controller/UserController.php');

        if ($method == "GET") {
            $func = getUsers();
            if ($func == "Error") {
                echo "Error.";
                return;
            }
            return $func; 
        }

        if ($method == "DELETE") {
            
        }
    }

    function Users($method, $array_info) {
        include_once('controller/UserController.php');

        if ($method == "POST") {
            $func = addUsers($array_info);
            if ($func == "Error") {
                echo "Error adding.";
                return;
            }
        }

        if ($method == "PUT") {
            $func = editUsers($array_info);
        }
    }

    function UserLogin($email, $password) {
        include_once('controller/UserController.php');
        $login_username = getUserByEmail($email);
        $login_password = getUserPassword($password);

        if(!$login_username || !$login_password) {
            echo "Error authenticating.";
            return;
        }

    }

    function Games($method) {
        include_once('controller/GameController.php');

        if ($method == "GET") {
            $func = getGames();
            if ($func == "Error") {
                echo "Error.";
                return;
            }

            return $func; 
        }

        if ($method == "POST") {

        }

        if ($method == "PUT") {
            
        }

        if ($method == "DELETE") {
            
        }
        
    }

    function Ads($method) {
        include_once('controller/GameAdsController.php');

        if ($method == "GET") {
            $func = getGameAds();
            if ($func == "Error") {
                echo "Error.";
                return;
            }

            return $func; 
        }

        if ($method == "POST") {

        }

        if ($method == "PUT") {
            
        }

        if ($method == "DELETE") {
            
        }
        
    }


?>
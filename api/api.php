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
            if ($func == "Error") {
                echo "Error adding.";
                return;
            }
        }
    }

    function UserEmail($method, $email) {
        include_once('controller/UserController.php');

        if ($method == "GET") {
            $userid = getUserId($email);
            if($userid != "Error") {
                return $userid;
            }
        }
    }

    function UserLogin($email, $password) {
        include_once('controller/UserController.php');
        $login_password = getUserPassword($email, $password);

        if($password != $login_password) {
            return 0;
        }
        return 1;
    }

    function UserRegister($email, $username, $password) {
        include_once('controller/UserController.php');
        
        $info = array($email, $username, $password);


        $register = addUser($info);

        if($register != 1) {
            return 0;
        }

        return 1;

    }

    function GameId($method,$id) {
        include_once('controller/GameController.php');

        if($method == "GET") {
            $func = getGameById($id);
            if ($func == "Error") {
                echo "Error.";
                return;
            }

            return $func; 
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

    function Blog($method) {
        include_once('controller/BlogController.php');

        if ($method == "GET") {
            $func = getBlog();
            if ($func == "Error") {
                echo "Error.";
                return;
            }
            return $func; 
        }
    }


?>
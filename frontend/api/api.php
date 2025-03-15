<?php
    //header("Content-Type: application/json");

    //rest api
    function User($method, $id) {
        include_once('controller/UserController.php');

        if ($method == "GET") {
            $func = getUsers();
            if ($func == "Error") {
                echo "Error.";
                return;
            }
            return $func; 
        }

        if ($method == "GET" && is_int($id)) {
            $arr = getUserById($id,"ALL");
            if ($arr == "Error") {
                echo "Error.";
                return;
            }
            return $arr; 
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
            $func = updateUser($array_info);
            if ($func == "Error") {
                // echo "Error editing.";
                return 0;
            }
            return 1;
        }
    }

    function RegisterUser($email, $username, $password) {
        include_once('controller/UserController.php');
        
        $info = array($email, $username, $password);
        $register = addUser($info);

        if($register != 1) {
            return 0;
        }

        return 1;

    }

    function LogInUser($email) {
        include_once('controller/UserController.php');

        //if ($method == "GET") {
            $userid = getUserId($email);
            if($userid != "Error") {
                return $userid;
            }
        //}
    }

    function UserDetail($type, $id) {
        include_once('controller/UserController.php');

        return getUserDetailById($type, $id);
    }

    function AdminAuth($number, $password) {
        include_once('controller/AdminController.php');

        $NumberCheck = checkAdminNumber($number);
        if(!$NumberCheck) return "Wrong Number";

        $PassCheck = getAdminPasswordByNumber($number);
        if($PassCheck != $password) return "Wrong Password";

        return 1;
    }

    function AdminId($method, $number) {
        include_once('controller/AdminController.php');
        
        if($method == "GET") return getAdminId($number);
    }

    function Admin($method, $id) {
        include_once('controller/AdminController.php');

        if($method == "GET") return getAdmin($id);
    }

    function UserAuth($email, $password) {
        include_once('controller/UserController.php');
        $login_password = getUserPassword($email, $password);

        if($password != $login_password) {
            return 0;
        }
        return 1;
    }

    function UserId($method,$id) {
        include_once('controller/UserController.php');

        if($method == "GET") {
            $func = getUserByIdSingle($id);
            if ($func == "Error") {
                echo "Error.";
                return;
            }

            return $func; 
        }
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

    function Developer($type, $id) {

        if($type == "Check") {
            include_once('controller/UserController.php');

            return isUserDeveloper($id);
        }
        else if ($type == "GET") {
            include_once('controller/DeveloperController.php');
            return getDeveloperId($id);
        }
    }

    function DeveloperGames($id) {
        include_once('controller/DeveloperController.php');

        return getDeveloperGames($id);
    }

    function GameDeveloper($method, $id) {
        include_once('controller/DeveloperController.php');

        return getDeveloperNameFromId($id);

        // if($method == "GET") {
        //     return getDeveloperNamesAndId();
        // }

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

    function Blog($method, $blogarray) {
        include_once('controller/BlogController.php');

        if ($method == "GET") {
            $func = getBlog();
            if ($func == "Error") {
                echo "Error.";
                return;
            }
            return $func; 
        }

        if ($method == "PUT") {
            $func = addBlog($blogarray);
            if ($func == "Error") {
                echo "Error.";
                return;
            }
            return $func; 
        }
    }

    function Achievement($method, $game_id, $user_id, $achievement_id) {
        include_once('controller/AchievementController.php');
        
        if($method == "PUT") {
            $info = array($game_id, $user_id, $achievement_id);
            $func = addAchievement($info);
            if($func == "Error") {
                echo "Error.";
                return;
            }
            return $func;
        }

        // if($register != 1) {
        //     return 0;
        // }

        // return 1;
    }

    function Achievements($id) {
        include_once('controller/AchievementController.php');

        return getAchievements($id);
    }


?>
<?php
    // this is where the functions are called

    function getUsers() {
        include('../api/config.php');
        try {
            $result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
            return $result;
        } catch (Exception $e) {
            return "Error";
        }

    }

    function getUserId($email) {
        include('../api/config.php');

        try {
            $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
            $row = $result->fetch_assoc();

            return $row['user_id'];
        } catch (Exception $e) {
            return "Error";
        }
    }

    function getUserByIdSingle($user_id) {
        include('../api/config.php');
        try {
            $result = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$user_id'");
            $row = $result->fetch_assoc();
            return $row;
        } catch (Exception $e) {
            return 0;
        }

    }

    function getUserById($user_id, $data) {
        include('../api/config.php');
        try {
            $result = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$user_id'");
            if($data == "ALL") {
                $row = $result->fetch_assoc();
                return $row;
            }

            if ($data == "username") {
                return $result['username'];
            }
            if ($data == "email") {
                return $result['email'];
            }
            
            return $result;
        } catch (Exception $e) {
            return 0;
        }

    }

    function getUserByEmail($email) {
        include('../api/config.php');
        try {
            $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
            return $result;
        } catch (Exception $e) {
            return 0;
        }
    }

    function getUserByUsername() {

    }
    
    // only important for logging in
    function getUserPassword($email, $password) {
        include('../api/config.php');
        try {
            $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
            $row = $result->fetch_assoc();

            return $row['password'];
        } catch (Exception $e) {
            return "Error.";
        }
    }

    function getUserDetailById($type, $id) {
        include('../api/config.php');

        try {
            $result = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$id'");
            $row = $result->fetch_assoc();
            
            if ($type == "email") {
                return $row['email'];
            }
            if ($type == "password") {
                return $row['password'];
            }
            if ($type == "username") {
                return $row['username'];
            }
            if ($type == "profile_picture") {
                return $row['profile_picture'];
            }
            
        } catch (Exception $e) {
            return "Error.";
        }
    }

    function addUser($array_info) {
        include('../api/config.php');

        //$user_id = $array_info[0];
        $email = $array_info[0];
        $username = $array_info[1];
        $password = $array_info[2];

        try {
            $result = mysqli_query($conn, "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')");
            return $result;
        } catch (Exception $e) {
            return "Error";
        }
    }

    function isUserDeveloper($id) {
        include('../api/config.php');

        try {
            $result = mysqli_query($conn, "SELECT * FROM developers WHERE user_id=$id");

            if(empty($result)) {
                return 0;
            }

            return $result;
        } catch (Exception $e) {
            return "Error";
        }
    }

    function getUserFollowGame($id) {
        include('../api/config.php');

        try {
            $result = mysqli_query($conn, "SELECT * FROM following_game WHERE user_id=$id");

            if(empty($result)) {
                return 0;
            }

            return $result;
        } catch (Exception $e) {
            return "Error";
        }
    }

    function getUserAuthKey($id) {
        include('../api/config.php');

        try {
            $result = mysqli_query($conn, "SELECT authkey FROM users WHERE user_id=$id");
            // if(empty($result)) {
            //     return 0;
            // }
            // $row = $result->fetch_assoc();


            return $result;
        } catch (Exception $e) {
            return "Error";
        }
    }

    function updateUser($array_info) {
        include('../api/config.php');

        $user_id = $array_info[0];
        $username = $array_info[1];
        $password = $array_info[2];
        $email = $array_info[3];

        try {
            $result = mysqli_query($conn, "UPDATE users SET username='$username', password='$password', email='$email' WHERE user_id=$user_id");
            return $result;
        } catch (Exception $e) {
            return 0;
        }

        //UPDATE users SET password="password" WHERE

    }

    function deleteUser() {

    }


?>
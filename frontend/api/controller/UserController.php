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

    function addUser($array_info) {
        include('../api/config.php');

        //$user_id = $array_info[0];
        $username = $array_info[0];
        $password = $array_info[1];
        $email = $array_info[2];

        try {
            $result = mysqli_query($conn, "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')");
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

        if($username == NULL) {
            $username = getUserById($user_id, "username");
        }

        try {
            $result = mysqli_query($conn, "UPDATE users SET username='$username', password='$password', email='$email' WHERE user_id=$user_id");
            return $result;
        } catch (Exception $e) {
            return "Error";
        }

        //UPDATE users SET password="password" WHERE

    }

    function deleteUser() {

    }


?>
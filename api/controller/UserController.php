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

    function getUserById() {

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
    
    function getUserPassword($password) {
        include('../api/config.php');
        try {
            $result = mysqli_query($conn, "SELECT * FROM users WHERE password='$password'");
            return $result;
        } catch (Exception $e) {
            return 0;
        }
    }

    function addUser($array_info) {
        include('../api/config.php');

        $user_id = $array_info[1];
        $username = $array_info[2];
        $password = $array_info[3];
        $email = $array_info[4];

        try {
            $result = mysqli_query($conn, "INSERT INTO users (user_id, username, password, email) VALUES ($user_id, '$username', '$password', '$email')");
            return $result;
        } catch (Exception $e) {
            return "Error";
        }
    }

    function updateUser() {

    }

    function deleteUser() {

    }


?>
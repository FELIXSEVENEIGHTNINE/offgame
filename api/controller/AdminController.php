<?php
    // this is where the functions are called

    function checkAdminNumber($number) {
        include('../api/config.php');

        try {
            $result = mysqli_query($conn, "SELECT * FROM admin WHERE admin_num=$number");

            return $result;
        } catch (Exception $e) {
            return "Error";
        }
    }

    function getAdminPasswordByNumber($number) {
        include('../api/config.php');

        try {
            $result = mysqli_query($conn, "SELECT * FROM admin WHERE admin_num=$number");
            $row = $result->fetch_assoc();

            return $row['password'];
        } catch (Exception $e) {
            return "Error";
        }
    }

    function getAdminId($number) {
        include('../api/config.php');

        try {
            $result = mysqli_query($conn, "SELECT * FROM admin WHERE admin_num=$number");
            $row = $result->fetch_assoc();

            return $row['admin_id'];
        } catch (Exception $e) {
            return "Error";
        }
    }



?>
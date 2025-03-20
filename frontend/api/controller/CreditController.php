<?php
    function getUserCredit($id) {
        include('../api/config.php');

        try {
            $result = mysqli_query($conn, "SELECT * FROM credit WHERE user_id = $id");
            $row = $result->fetch_assoc();
            
            if ($row['amount'] == NULL) return 0;
            return $row['amount'];
        } catch (Exception $e) {
            return "Error";
        }
    }

    

?>
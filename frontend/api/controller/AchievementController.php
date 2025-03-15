<?php
    function getAchievement($id) {
        include('../api/config.php');

        try {
            $result = mysqli_query($conn, "SELECT achievements.achieve_id AS achievement_id, users.user_id, achievement_data.achieve_id, achievement_data.achieve_name FROM ((achievements LEFT JOIN users ON users.user_id = achievements.user_id) LEFT JOIN achievement_data ON achievement_data.achieve_id = achievements.achievement_id) WHERE achievements.user_id=$id;");
            
            return $result;
        } catch (Exception $e) {
            return "Error";
        }
    }

    function getAchievements($id) {
        include('../../../api/config.php');

        try {
            $result = mysqli_query($conn, "SELECT achievements.achieve_id, users.user_id, achievement_data.achieve_id, achievement_data.achieve_name FROM ((achievements INNER JOIN users ON users.user_id = achievements.user_id) INNER JOIN achievement_data ON achievement_data.achieve_id = achievements.achieve_id);");
            
            return $result;
        } catch (Exception $e) {
            return "Error";
        }
    }
    
    function addAchievement($array_info) {
        // include('../api/config.php');
        include('../../../../api/config.php');

        $game_id = $array_info[0];
        $user_id = $array_info[1];
        $achievement_id = $array_info[2];

        try {
            $result = mysqli_query($conn, "INSERT INTO achievements (game_id, user_id, achievement_id) VALUES ('$game_id', '$user_id', '$achievement_id')");
            return $result;
        } catch (Exception $e) {
            return "Error";
        }
    }


?>
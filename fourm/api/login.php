<?php
include "../db/_dbConnect.php";
$login = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login']) && $_POST['login'] == 'true') {

        if (isset($_POST['LoginUsername']) && $_POST['LoginUsername'] != '') {
            $user_username = $_POST['LoginUsername'];
            $user_password = $_POST['LoginPassword'];

            $sql = "SELECT * FROM `users` where `user_username`='$user_username'";
            $result = mysqli_query($conn, $sql);
            $rowNum = mysqli_num_rows($result);
            if ($rowNum == 1) {
                $row = mysqli_fetch_assoc($result);
                $user_password_db = $row['user_password'];
                if (password_verify($user_password, $user_password_db))
                 {
                    $login=true;
                    session_start();
                    $_SESSION['login']=true;
                    $_SESSION['username']=$row['user_username'];
                   
                    header("location:/project/fourm/index.php?login=true");
                    exit;
                }
            } else {
                echo "not exists user";
            }


        } else {
            echo "not execute";
        }
    }
}
?>
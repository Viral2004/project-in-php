<?php
include "../db/_dbConnect.php";
$userExist = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['signup']) && $_POST['signup'] == 'true') {

        if (isset($_POST['signUpUsername']) && $_POST['signUpUsername'] != '') {

            $user_username = $_POST['signUpUsername'];
            $user_password = $_POST['signUpPassword'];
            $hashPasword = password_hash($user_password, PASSWORD_DEFAULT);
            $sqlExist = "SELECT * FROM `users` where `user_username`='$user_username'";
            $resultExist = mysqli_query($conn, $sqlExist);
            $numRow = mysqli_num_rows($resultExist);
            if ($numRow > 0) {
                $userExist = "User alredy Exits";
                header("location:/project/fourm/index.php?signup=err&message=".urlencode($userExist) . "");
                exit();
            } else {
                $sqlInsert = "INSERT INTO `users` (`user_username`, `user_password`) VALUES ( '$user_username', '$hashPasword')";
                $result = mysqli_query($conn, $sqlInsert);
                header("location: /project/fourm/index.php?signup=success");
                exit();

            }

        }
    }


   

}
?>
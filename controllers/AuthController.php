<?php
$errorArray = [];
$connect = mysqli_connect("localhost", "root", "", "fb");
var_dump($_POST);

if ($connect) {
    var_dump($_POST);

    if (!isset($_POST['email']) || empty($_POST['email'])) {

        $errorArray[] = "email";
    }

    if (!isset($_POST['password']) || empty($_POST['password'])) {

        $errorArray[] = "password";
    }



    if (count($errorArray) > 0) {
        echo "error";
        header("Location:login.php?error=" . implode(",", $errorArray));
    } else {
        var_dump($errorArray);
        echo "mfesh errors";


        $email = mysqli_escape_string($connect, $_POST['email']);
        $password = mysqli_escape_string($connect, $_POST['password']);
        //$user_id = mysqli_escape_string($connect, $_POST['id']);

        $getUsers = mysqli_query($connect, "select * from users where mail='$email'&& password='$password'");
        //var_dump("getUsers : : ".$getUsers);
        var_dump("select * from users where mail='$email'&& password='$password'");
        $row = mysqli_fetch_assoc($getUsers);
        if ($row) {
            echo "logined";
            var_dump($row);
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['mail'];
            $_SESSION['password'] = $row['password'];
            header("Location:../views/posts/List/List.php");
        } else {
            echo "cant login";
            header("Location:login.php");
            var_dump($getUsers);
        }
    }
} else {
    echo (" can not connected");
}

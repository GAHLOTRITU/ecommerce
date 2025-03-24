<?php
session_start();
require_once '../inc/connection.php' ;

$user = $_REQUEST['username'];
$pass = $_REQUEST['password'];

$sql = "SELECT * FROM `users` WHERE `username` = '$user'";
$res = mysqli_query($con , $sql);

if ( mysqli_num_rows($res) > 0 ) {

    $row = mysqli_fetch_assoc($res);

    if ( $row['status'] == 1 ) {

        if ( $row['type'] != 1 ) {

            if ( $row["password"] == $pass ) {
                $_SESSION["status"] = 1 ;
                $_SESSION["id"] = $row["id"] ;
                header('location:../home.php');
            } else {
                header('location:../index.php?err=wrong password');
            }

        } else {
            header('location:../index.php?err=unauthrized user');
        }

    } else {
        header('location:../index.php?err=user blocked');
    }

} else {
    header('location:../index.php?err=user does not exist');
}
?>
<?php
session_start();
if( !isset( $_SESSION["status"] ) ) {
    header('location:index.php');
} else {
    if( $_SESSION["status"] != 1 ) {
        header('location:index.php');
    }
}
?>
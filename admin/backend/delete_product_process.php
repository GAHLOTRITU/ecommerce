<?php
require_once '../inc/connection.php';

$id = $_REQUEST["id"];

$sql = "UPDATE `products` SET `status` = '0' WHERE `id` = '$id'";
$res = mysqli_query($con , $sql);

if ($res) {
    echo 1;
} else {
    echo 0;
}
?>
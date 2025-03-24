<?php
require_once '../inc/connection.php';

$id = $_REQUEST["id"];

$sql = "UPDATE `vendors` SET `status` = '0' WHERE `id` = '$id'";
$res = mysqli_query($con , $sql);

if ($res) {
    echo 1;
} else {
    echo 0;
}
?>
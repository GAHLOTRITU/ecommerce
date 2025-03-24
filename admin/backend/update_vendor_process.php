<?php
require_once '../inc/connection.php';

$owner_name = $_REQUEST["owner_name"];
$shop_name = $_REQUEST["shop_name"];
$mobile = $_REQUEST["mobile"];
$email = $_REQUEST["email"];
$address = $_REQUEST["address"];
$gst = $_REQUEST["gst"];
$vid = $_REQUEST["vid"];

$sql = "UPDATE `vendors` SET `shop_name` = '$shop_name', `owner_name` = '$owner_name' , `mobile` = '$mobile', `email` = '$email', `address` = '$address', `gst` = '$gst' WHERE `id` = '$vid'";
$res = mysqli_query( $con , $sql );

if($res) {
    echo 1;
} else {
    echo 0;
}

?>
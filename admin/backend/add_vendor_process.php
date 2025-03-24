<?php
require_once '../inc/connection.php';

$owner_name = $_REQUEST["owner_name"];
$shop_name = $_REQUEST["shop_name"];
$mobile = $_REQUEST["mobile"];
$email = $_REQUEST["email"];
$address = $_REQUEST["address"];
$gst = $_REQUEST["gst"];

$sql = "INSERT INTO `vendors`( `shop_name`, `owner_name`, `mobile`, `email`, `address`, `gst`, `status`) VALUES ('$shop_name','$owner_name','$mobile','$email','$address','$gst','1')";

$res = mysqli_query( $con , $sql );

if($res) {
    echo 1;
} else {
    echo 0;
}

?>
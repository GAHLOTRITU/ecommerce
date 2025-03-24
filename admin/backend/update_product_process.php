<?php
require_once '../inc/connection.php';

$id = $_REQUEST["id"];


if ( $_FILES["product_img"]["tmp_name"] != '' ) {

    $s = "SELECT `image` FROM `products` WHERE `id` = '$id'";
    $r = mysqli_query( $con , $s );
    $ro = mysqli_fetch_assoc($r);
    $imgnm = $ro['image'];

    $imgloc = '../uploads/' . $imgnm ;
    move_uploaded_file( $_FILES["product_img"]["tmp_name"] , $imgloc );
}

$product_name = $_REQUEST["product_name"];
$product_catg = $_REQUEST["product_catg"];
$fprice = $_REQUEST["fprice"];
$sprice = $_REQUEST["sprice"];

$sql = "UPDATE `products` SET `product_name` = '$product_name' , `category` = '$product_catg' , `fprice` = '$fprice' , `sprice` ='$sprice' WHERE `id` = '$id' ";
$res = mysqli_query( $con , $sql );

if($res) {
    echo 1;
} else {
    echo 0;
}


?>
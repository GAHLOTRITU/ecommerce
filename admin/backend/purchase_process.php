<?php
require_once '../inc/connection.php';

$inv_no = $_REQUEST["inv_no"];
$vid = $_REQUEST["vid"];
$pid = $_REQUEST["pid"];
$price = $_REQUEST["price"];
$qty = $_REQUEST["qty"];

$sql = "INSERT INTO `purchase`( `inv_no`, `vid`, `pid`, `bprice`, `qty` ) VALUES ('$inv_no','$vid','$pid','$price','$qty')";
$res = mysqli_query( $con , $sql );

$sql1 = "SELECT `qty` FROM `products` WHERE `id` = '$pid'";
$res1 = mysqli_query( $con , $sql1 );
$row = mysqli_fetch_assoc($res1);

$old_qty = $row['qty'] ;

$new_qty = (int)$old_qty + (int)$qty ;

$sql2 = "UPDATE `products` SET `qty` = '$new_qty' , `bprice` = '$price' WHERE `id` = '$pid'";
$res2 = mysqli_query( $con , $sql2 ) ;

if ( $res2 ) {
    echo 1 ;
} else {
    echo 0 ;
}
?>
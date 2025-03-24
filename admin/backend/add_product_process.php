<?php
require_once '../inc/connection.php';

$imgnm = 'IMG_' . uniqid() . '.jpg';
$imgloc = '../uploads/' . $imgnm ;

if ( move_uploaded_file( $_FILES["product_img"]["tmp_name"] , $imgloc ) ) {

    $product_name = $_REQUEST["product_name"];
    $product_catg = $_REQUEST["product_catg"];
    $fprice = $_REQUEST["fprice"];
    $sprice = $_REQUEST["sprice"];
    
    $sql = "INSERT INTO `products` ( `product_name`, `category`, `fprice`, `sprice`, `bprice`, `qty`, `image`, `status` ) VALUES ('$product_name','$product_catg','$fprice','$sprice','','','$imgnm','1')";
    $res = mysqli_query( $con , $sql );
    
    if($res) {
        echo 1;
    } else {
        echo 0;
    }

} else {
    echo 0 ;
}


?>
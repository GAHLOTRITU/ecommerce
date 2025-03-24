<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../inc/connection.php' ;

$type = $_REQUEST["type"] ;
$data = [];

if ( $type == 1 ) {

    $sql = "SELECT * FROM `products` WHERE `status` = '1'";
    $res = mysqli_query( $con , $sql );
    while ( $row = mysqli_fetch_assoc($res) ) {
        array_push( $data , $row );
    }

} else if ( $type == 2 ) {

    $uid = $_REQUEST["uid"];

    $sql = "SELECT `c`.* , `p`.`product_name` , `p`.`fprice` , `p`.`sprice` , `p`.`image` FROM `cart` AS `c` JOIN `products` AS `p` ON `c`.`pid` = `p`.`id` WHERE `c`.`uid` = '$uid'";
    $res = mysqli_query( $con , $sql );
    while ( $row = mysqli_fetch_assoc($res) ) {
        array_push( $data , $row );
    }

} else if ( $type == 3 ) {

    $uid = $_REQUEST["uid"];
    $pid = $_REQUEST["pid"];
    $qty = 1;

    $sql = "INSERT INTO `cart` (`uid` , `pid` , `qty`) VALUES ( '$uid' , '$pid' , '$qty' )" ;
    $res = mysqli_query( $con , $sql );

    if ( $res ) {
        $data = [
            "status" => 1 ,
            "msg" => "Cart added"
        ];
    } else {
        $data = [
            "status" => 0 ,
            "msg" => "try again"
        ];
    }

} else if ( $type == 4 ) {

    $id = $_REQUEST["id"];

    $sql = "DELETE FROM `cart` WHERE  `id` = '$id'" ;
    $res = mysqli_query( $con , $sql );

    if ( $res ) {
        $data = [
            "status" => 1 ,
            "msg" => "Item removed"
        ];
    } else {
        $data = [
            "status" => 0 ,
            "msg" => "try again"
        ];
    }

} else {
    
    $data = [
        "status" => 0 ,
        "msg" => "invalid operation"
    ];

}

echo json_encode($data);
?>
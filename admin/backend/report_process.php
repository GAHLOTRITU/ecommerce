<?php
require_once '../inc/connection.php';

$srch = $_REQUEST['srch'];
$reprot_type = $_REQUEST['reprot_type'];

if ($reprot_type == 1) {

    // stock report 

    $sql = "SELECT * FROM `products` WHERE  `product_name` LIKE '%$srch%' ";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {

        echo '
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Catg.</th>
                <th scope="col">F price.</th>
                <th scope="col">S Price.</th>
                <th scope="col">B Price.</th>
                <th scope="col">Qty</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
    ';

        $x = 1;
        while ($row = mysqli_fetch_assoc($res)) {
            extract($row);
            $qty = $qty == '' ? 0 : $qty;
            $status = $status == 1 ? '<span class="badge bg-success">Enabled</span>' : '<span class="badge bg-danger">Disabled</span>';
            echo "
            <tr>
                <th> $x </th>
                <td> $product_name </td>
                <td> $category </td>
                <td> $fprice Rs. </td>
                <td> $sprice Rs. </td>
                <td> $bprice Rs. </td>
                <td> $qty </td>
                <td> <img src='uploads/$image' alt='primg' class='pr-img'> </td>
                <td> $status </td>
            </tr>
        ";
            $x++;
        }

        echo '
            </tbody>
        </table>
    ';
    } else {
        echo 'no product found';
    }
} else if ($reprot_type == 2) {

    // sell report 

    $sql = "SELECT `sell`.* , `products`.`product_name` AS 'pname' FROM `sell` JOIN `products` ON `sell`.`pid` = `products`.`id` WHERE  `sell`.`invno` LIKE '%$srch%' OR `sell`.`mobile` LIKE '%$srch%' ";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {

        echo '
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Pr. Name</th>
                <th scope="col">Price.</th>
                <th scope="col">Qty</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
    ';

        while ($row = mysqli_fetch_assoc($res)) {
            extract($row);
            
            $qty = $qty == '' ? 0 : $qty;
            $total = $price * $qty ;
            $status = $status == 1 ? '<span class="badge bg-success">Delivered</span>' : '<span class="badge bg-danger">Canceled</span>';
            echo "
            <tr>
                <th> $invno </th>
                <td> $name </td>
                <td> $email </td>
                <td> $mobile </td>
                <td> $pname </td>
                <td> $price Rs. </td>
                <td> $qty </td>
                <td> $total </td>
                <td> $status </td>
            </tr>
        ";
        }

        echo '
            </tbody>
        </table>
    ';
    } else {
        echo 'no data found';
    }
} else if ($reprot_type == 3) {

    // purchase report 

    $sql = "SELECT `p`.* , `v`.`shop_name` , `v`.`mobile` ,`pr`.`product_name`  FROM `purchase` AS `p` JOIN `vendors` AS `v` ON `p`.`vid` = `v`.`id` JOIN `products` AS `pr` ON `p`.`pid` = `pr`.`id` WHERE  `p`.`inv_no` LIKE '%$srch%' OR `v`.`mobile` LIKE '%$srch%' ";
    
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {

        echo '
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">Pr. Name</th>
                <th scope="col">Price.</th>
                <th scope="col">Qty</th>
                <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
    ';

        while ($row = mysqli_fetch_assoc($res)) {
            extract($row);
            
            $qty = $qty == '' ? 0 : $qty;
            $total = $bprice * $qty ;
            echo "
            <tr>
                <th> $inv_no </th>
                <td> $shop_name </td>
                <td> $mobile </td>
                <td> $product_name </td>
                <td> $bprice Rs. </td>
                <td> $qty </td>
                <td> $total </td>
            </tr>
        ";
        }

        echo '
            </tbody>
        </table>
    ';
    } else {
        echo 'no data found';
    }
} else {}
?>
<?php
require_once '../inc/connection.php';

$sql = "SELECT * FROM `products` WHERE `status` = '1'" ;
$res = mysqli_query($con,$sql);

if ( mysqli_num_rows($res) > 0 ) {

    echo '
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Catg.</th>
                <th scope="col">F price.</th>
                <th scope="col">S Price.</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
    ';

    $x = 1 ;
    while ( $row = mysqli_fetch_assoc($res) ) {
        extract($row);
        echo "
            <tr>
                <th> $x </th>
                <td> $product_name </td>
                <td> $category </td>
                <td> $fprice Rs. </td>
                <td> $sprice Rs. </td>
                <td> <img src='uploads/$image' alt='primg' class='pr-img'> </td>
                <td>
                    <a class='btn btn-warning' href='product_update.php?id=$id'><i class='bi bi-pencil-square'></i></a>
                    <button class='btn btn-danger' onclick='deleteProduct($id)'><i class='bi bi-trash3-fill'></i></button>
                </td>
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
?> 
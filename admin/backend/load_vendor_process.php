<?php
require_once '../inc/connection.php';

$sql = "SELECT * FROM `vendors` WHERE `status` = '1'" ;
$res = mysqli_query($con,$sql);

if ( mysqli_num_rows($res) > 0 ) {

    echo '
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">O. Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">GST</th>
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
                <td> $shop_name </td>
                <td> $owner_name </td>
                <td> $mobile </td>
                <td> $email </td>
                <td> $address </td>
                <td> $gst </td>
                <td>
                    <a class='btn btn-warning' href='vendor_update.php?id=$id'><i class='bi bi-pencil-square'></i></a>
                    <button class='btn btn-danger' onclick='deleteVendor($id)'><i class='bi bi-trash3-fill'></i></button>
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
    echo 'no vendor found';
}
?> 
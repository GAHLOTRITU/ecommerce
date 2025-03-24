<?php
    require_once 'inc/session.php';
    require_once 'inc/connection.php';
    require_once 'inc/header.php';
    require_once 'inc/nav.php';

    $id = $_GET["id"];
    $sql = "SELECT * FROM `vendors` WHERE `id` = '$id'";
    $res = mysqli_query($con ,$sql);
    $row = mysqli_fetch_assoc($res);
    extract($row);
?>

<div class="container">
    <div id="msg"></div>
    <h3 class="mt-5">Update Vendor</h3>
    <hr>
    <input type="text" value="<?= $id ?>" id="vid" hidden>
    <div class="row mt-2">
        <div class="col">
            <input type="text" id="owner_name" value="<?= $owner_name ?>" placeholder="Enter owner name" class="form-control">
        </div>
        <div class="col">
            <input type="text" id="shop_name" value="<?= $shop_name ?>" placeholder="Enter shop name" class="form-control">
        </div>
        <div class="col">
            <input type="text" id="mobile" value="<?= $mobile ?>" placeholder="Enter mobile" class="form-control">
        </div>
        <div class="col">
            <input type="text" id="email" value="<?= $email ?>" placeholder="Enter email" class="form-control">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <input type="text" id="address" value="<?= $address ?>" placeholder="Enter address" class="form-control">
        </div>
        <div class="col">
            <input type="text" id="gst"  value="<?= $gst ?>" placeholder="Enter gst" class="form-control">
        </div>
        <div class="col">
            <button class="btn btn-success" onclick="updateVendor()">Update</button>
        </div>
    </div>
</div>
    
    
    
<?php
    require_once 'inc/footer.php';
?>
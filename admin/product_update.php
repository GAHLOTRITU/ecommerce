<?php
    require_once 'inc/session.php';
    require_once 'inc/connection.php';
    require_once 'inc/header.php';
    require_once 'inc/nav.php';

    $id = $_REQUEST["id"];
    $sql = "SELECT * FROM `products` WHERE `id` = '$id'";
    $res = mysqli_query( $con , $sql );
    $row = mysqli_fetch_assoc($res);
    extract($row);
?>

<form id="update-product">
    <div class="container">
        <div id="msg"></div>
        <h3 class="mt-5">Update product</h3>
        <hr>
        <div class="row mt-2">
            <input type="text" name="id" value="<?=$id?>" hidden>
            <div class="col">
                <input type="text" name="product_name" placeholder="Enter product name" class="form-control" value="<?= $product_name ?>">
            </div>
            <div class="col">
                <input type="text" name="product_catg" placeholder="Enter product category" class="form-control" value="<?=$category?>" >
            </div>
            <div class="col">
                <input type="text" name="fprice" placeholder="Enter product fake price" class="form-control" value="<?=$fprice?>" >
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <input type="text" name="sprice" placeholder="Enter product selling price" class="form-control" value="<?=$sprice?>" >
            </div>
            <div class="col">
                <input type="file" name="product_img" class="form-control">
            </div>
            <div class="col">
                <button class="btn btn-success" type="submit">UPDATE</button>
            </div>
        </div>
    </div>
</form>

    
    
    
<?php
    require_once 'inc/footer.php';
?>
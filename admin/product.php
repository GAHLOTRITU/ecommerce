<?php
    require_once 'inc/session.php';
    require_once 'inc/header.php';
    require_once 'inc/nav.php';
?>

<form id="add-product">
    <div class="container">
        <div id="msg"></div>
        <h3 class="mt-5">Add product</h3>
        <hr>
        <div class="row mt-2">
            <div class="col">
                <input type="text" name="product_name" placeholder="Enter product name" class="form-control">
            </div>
            <div class="col">
                <input type="text" name="product_catg" placeholder="Enter product category" class="form-control">
            </div>
            <div class="col">
                <input type="text" name="fprice" placeholder="Enter product fake price" class="form-control">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <input type="text" name="sprice" placeholder="Enter product selling price" class="form-control">
            </div>
            <div class="col">
                <input type="file" name="product_img" class="form-control">
            </div>
            <div class="col">
                <button class="btn btn-success" type="submit">SAVE</button>
            </div>
        </div>
    </div>
</form>

<div class="container">
    <h3 class="mt-5">All product</h3>
    <hr>
    <div id="product-list"></div>
</div>
    
    
    
<?php
    require_once 'inc/footer.php';
?>
<script>
    loadProduct();
</script>
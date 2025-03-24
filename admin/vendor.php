<?php
    require_once 'inc/session.php';
    require_once 'inc/header.php';
    require_once 'inc/nav.php';
?>

<div class="container">
    <div id="msg"></div>
    <h3 class="mt-5">Add Vendor</h3>
    <hr>
    <div class="row mt-2">
        <div class="col">
            <input type="text" id="owner_name" placeholder="Enter owner name" class="form-control">
        </div>
        <div class="col">
            <input type="text" id="shop_name" placeholder="Enter shop name" class="form-control">
        </div>
        <div class="col">
            <input type="text" id="mobile" placeholder="Enter mobile" class="form-control">
        </div>
        <div class="col">
            <input type="text" id="email" placeholder="Enter email" class="form-control">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <input type="text" id="address" placeholder="Enter address" class="form-control">
        </div>
        <div class="col">
            <input type="text" id="gst" placeholder="Enter gst" class="form-control">
        </div>
        <div class="col">
            <button class="btn btn-success" onclick="addVendor()">SAVE</button>
        </div>
    </div>
</div>


<div class="container">
    <h3 class="mt-5">All Vendors</h3>
    <hr>
    <div id="product-list"></div>
</div>
    
    
    
<?php
    require_once 'inc/footer.php';
?>
<script>
    loadVendor();
</script>
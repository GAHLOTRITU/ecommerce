  <?php  
    require_once 'inc/session.php';
    require_once 'inc/connection.php';
    require_once 'inc/header.php';
    require_once 'inc/nav.php';
?>

<div class="container mt-5">
  <h2>Purchase</h2>
  <hr>
  <div id="msg"></div>
  <div class="row">
    <div class="col">
        <input type="text" class="form-control" placeholder="enter invioce no" id="invno">
    </div>
  </div>
  <div class="row mt-3">
    <div class="col">
        <select id="shop-list" class="form-control">
            <option value="">Select shop...</option>
            
            <?php
              $sql = "SELECT * FROM `vendors` WHERE `status` = '1'";
              $res = mysqli_query( $con , $sql );
              while( $row = mysqli_fetch_assoc($res) ) {
                extract($row);
                echo "<option value='$id-$mobile-$address'> $shop_name </option>";
              }
            ?>
            
        </select>
    </div>
    <div class="col">
      <input type="text" id="vid" hidden>
        <input type="text" class="form-control" id="mobile" readonly>
    </div>
    <div class="col">
        <input type="text" class="form-control" id="address" readonly>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col">
        <select id="product-list-purchase" class="form-control">
            <option value="">Select product...</option>
            
            <?php
              $sql1 = "SELECT * FROM `products` WHERE `status` = '1'";
              $res1 = mysqli_query( $con , $sql1 );
              while( $row1 = mysqli_fetch_assoc($res1) ) {
                extract($row1);
                echo "<option value='$id'> $product_name </option>";
              }
            ?>

        </select>
    </div>
    <div class="col">
      <input type="text" id="pid" hidden>
        <input type="number" class="form-control" placeholder="Enter buying price" id="pprice">
    </div>
    <div class="col">
        <input type="number" class="form-control" placeholder="Enter Qty" id="pqty">
    </div>
  </div>
  <div class="row mt-3">
    <div class="col"></div>
    <div class="col">
        <p id="total"></p>
        <button class="btn btn-success" onclick="purchase()">PURCHASE</button>
    </div>
    <div class="col"></div>
  </div>
</div>

<?php
    require_once 'inc/footer.php';
?>
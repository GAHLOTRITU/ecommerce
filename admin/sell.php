<?php  
    require_once 'inc/session.php';
    require_once 'inc/connection.php';
    require_once 'inc/header.php';
    require_once 'inc/nav.php';

    // $invno = rand(1111,9999);
    // $invno = date('Ymdhms');
?>

<div class="container mt-5">
  <h2>Sell</h2>
  <hr>
  <div id="msg"></div>
  <div class="row">
    <div class="col">
        <input type="text" class="form-control" placeholder="enter invioce no" id="invno" readonly>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col">
      <input type="text" class="form-control" id="csnm" placeholder="enter customer name">
    </div>
    <div class="col">
        <input type="text" class="form-control" id="mobile" placeholder="enter customer mobile">
    </div>
    <div class="col">
        <input type="text" class="form-control" id="address" placeholder="enter customer address">
    </div>
  </div>
  <div class="row mt-3">
    <div class="col">
        <select id="product-list-sell" class="form-control">
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
        <input type="number" class="form-control" placeholder="Enter buying price" id="sprice" readonly>
    </div>
    <div class="col">
        <input type="number" class="form-control" placeholder="Enter Qty" id="sqty">
    </div>
  </div>
  <div class="row mt-3">
    <div class="col"></div>
    <div class="col">
        <p id="total"></p>
        <button class="btn btn-success" onclick="sell()">SELL</button>
    </div>
    <div class="col"></div>
  </div>
</div>

<?php
    require_once 'inc/footer.php';
?>

<script>

  // let x = Math.floor( Math.random() * 10000 );
  // $("#invno").val(x);

  let date = new Date();
  let invno = 'QK' + date.getFullYear() + date.getMonth() + date.getDate() + date.getHours() + date.getMinutes() + date.getSeconds();
  $("#invno").val(invno);
</script>
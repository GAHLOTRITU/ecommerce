<?php
require_once 'inc/session.php';
require_once 'inc/header.php';
require_once 'inc/nav.php';
?>

<div class="container mt-5">
    <h2>Purchase report</h2>
    <hr>
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="enter inv no , mobile no" id="purchase_srch">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col" id="res"></div>
    </div>
</div>

<?php
require_once 'inc/footer.php';
?>
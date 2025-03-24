<?php
session_start();
if( isset( $_SESSION["status"] ) ) {
    if( $_SESSION["status"] == 1 ) {
        header('location:home.php');
    }
}
require_once 'inc/header.php';
?>


    <div class="container">
        <div class="form-class">
            <div class="row mt-2 mb-2">
                <img src="assets/images/logo.jpg" alt="logo" class="logo-img">
                <h1>Login</h1>
                <hr>
                <?php
                    if( isset ( $_GET["err"] )) {
                        echo '
                            <div class="alert alert-danger"> ' . $_GET["err"] . ' </div>
                        ';
                    }
                ?>
            </div>
            <form action="backend/login_process.php" method="POST" enctype="multipart/form-data">
                <div class="row mt-2">
                    <input type="text" class="form-control" name="username" placeholder="enter username">
                </div>
                <div class="row mt-2">
                    <input type="text" class="form-control" name="password" placeholder="enter username">
                </div>
                <div class="row mt-2">
                    <button class="btn btn-success">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
    
    
    
<?php
    require_once 'inc/footer.php';
?> 
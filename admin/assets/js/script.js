$("#add-product").on( "submit" , function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    $.ajax({
        url : "backend/add_product_process.php" ,
        method : "POST" ,
        data : formData ,
        contentType : false ,
        processData : false ,
        success : function ( res ) {
            if( res == 1 ) {
                loadProduct();
                $("#msg").html(`
                    <div class="alert alert-success">
                        product added
                    </div>
                    `);
            } else {
                $("#msg").html(`
                    <div class="alert alert-danger">
                        Error ... !!!!
                    </div>
                    `);
            }
        }
    });
});

$("#update-product").on( "submit" , function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    $.ajax({
        url : "backend/update_product_process.php" ,
        method : "POST" ,
        data : formData ,
        contentType : false ,
        processData : false ,
        success : function ( res ) {
            if( res == 1 ) {
                alert('product updated');
                location.href = "product.php";
            } else {
                $("#msg").html(`
                    <div class="alert alert-danger">
                        Error ... !!!!
                    </div>
                    `);
            }
        }
    });
});

function loadProduct () {
    $.ajax({
        url : "backend/load_product_process.php" ,
        method : "GET" ,
        success : function (data) {
            $("#product-list").html(data);
        }
    });
}

function deleteProduct(pid) {
    if ( confirm ('Are you sure ?') ) {
        $.ajax({
            url : 'backend/delete_product_process.php' ,
            method : 'POST' ,
            data : { id : pid } , 
            success : function (data) {
                if (data == 1) {
                    loadProduct();
                    $("#msg").html(`
                        <div class="alert alert-success">
                            product deleted
                        </div>
                        `);
                } else {
                    $("#msg").html(`
                        <div class="alert alert-danger">
                            Error ... !!!!
                        </div>
                        `);
                }
            }
        });
    }
}

function addVendor() {

    const owner_name = $("#owner_name").val() ;
    const shop_name = $("#shop_name").val() ;
    const mobile = $("#mobile").val() ;
    const email = $("#email").val() ;
    const address = $("#address").val() ;
    const gst = $("#gst").val() ;

    $.ajax({
        url : "backend/add_vendor_process.php" ,
        method : "POST" ,
        data : { owner_name : owner_name , shop_name : shop_name , mobile : mobile , email : email , address : address , gst : gst  } ,
        success : function ( res ) {
            if( res == 1 ) {
                loadVendor();
                $("#msg").html(`
                    <div class="alert alert-success">
                        vendor added
                    </div>
                    `);
            } else {
                $("#msg").html(`
                    <div class="alert alert-danger">
                        Error ... !!!!
                    </div>
                    `);
            }
        }
    });
}

function loadVendor() {
    $.ajax({
        url : "backend/load_vendor_process.php" ,
        method : "GET" ,
        success : function (data) {
            $("#product-list").html(data);
        }
    });
}

function deleteVendor(vid) {
    if ( confirm ('Are you sure ?') ) {
        $.ajax({
            url : 'backend/delete_vendor_process.php' ,
            method : 'POST' ,
            data : { id : vid } , 
            success : function (data) {
                if (data == 1) {
                    loadVendor();
                    $("#msg").html(`
                        <div class="alert alert-success">
                            vendor deleted
                        </div>
                        `);
                } else {
                    $("#msg").html(`
                        <div class="alert alert-danger">
                            Error ... !!!!
                        </div>
                        `);
                }
            }
        });
    }
}

function updateVendor() {

    const owner_name = $("#owner_name").val() ;
    const shop_name = $("#shop_name").val() ;
    const mobile = $("#mobile").val() ;
    const email = $("#email").val() ;
    const address = $("#address").val() ;
    const gst = $("#gst").val() ;
    const vid = $("#vid").val() ;

    $.ajax({
        url : "backend/update_vendor_process.php" ,
        method : "POST" ,
        data : { owner_name : owner_name , shop_name : shop_name , mobile : mobile , email : email , address : address , gst : gst , vid : vid } ,
        success : function ( res ) {
            if( res == 1 ) {
                alert('vendor updated');
                location.href = 'vendor.php';
            } else {
                $("#msg").html(`
                    <div class="alert alert-danger">
                        Error ... !!!!
                    </div>
                    `);
            }
        }
    });

}

$("#shop-list").on( "change" , function () {
    let x = this.value ;
    x = x.split('-');
    $("#vid").val(x[0]);
    $("#mobile").val(x[1]);
    $("#address").val(x[2]); 
});

$("#product-list-purchase").on( "change" , function () {
    $("#pid").val( this.value );
});

$("#pqty").on("keyup" , function () {
    let qty = this.value ;
    let price = parseInt( $("#pprice").val() ) ; 
    let total = qty * price ;
    $("#total").html(`Total = ${total}`);
});

function purchase() {

    const inv_no = $("#invno").val();
    const vid = $("#vid").val();
    const pid = $("#pid").val();
    const price = $("#pprice").val();
    const qty = $("#pqty").val();

    $.ajax({
        url : 'backend/purchase_process.php' ,
        method : 'POST' ,
        data : { inv_no : inv_no , vid : vid , pid : pid , price : price , qty : qty } ,
        success : function (res) {
            if ( res == 1 ) {
                alert('purchase done');
                location.reload();
            } else {
                alert('error');
            }
        }
    });
}

$("#s_srch").on( "keyup" , function () {
    // stock report
    let srch = this.value;
    genrateReport(srch , 1);
});

$("#sell_srch").on( "keyup" , function () {
    // sell report
    let srch = this.value;
    genrateReport(srch , 2);
});

$("#purchase_srch").on( "keyup" , function () {
    // purchase report
    let srch = this.value;
    genrateReport(srch , 3);
});

function genrateReport (srch , reprot_type ) {
    $.ajax({
        url : 'backend/report_process.php' ,
        method : 'POST' ,
        data : { srch : srch , reprot_type : reprot_type } ,
        success : function (res) {
            $("#res").html(res);
        }
    });
    
}
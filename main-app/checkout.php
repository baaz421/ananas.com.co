
<?php 
include "includes/header.php";
@$u_id = $_SESSION['u_id'];
if(isset($_SESSION['checkout_id'])){
	$checkout_id = $_SESSION['checkout_id'];

}else{
	$checkout_id = "";
}


?>

<main class="main">
	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
		<div class="container">
			<h1 class="page-title"><?php echo $english['participate']; ?><span>Review</span></h1>
		</div><!-- End .container -->
	</div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php"><?php echo $english['home']; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $english['participate']; ?></li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
    	<div class="checkout">
            <div class="container">
            	<div class="row justify-content-center">
            		<aside class="col-lg-3">
            			<div class="summary">
            				<h3 class="summary-title text-uppercase">Your Ananas Wallet </h3>
            				<!-- End .summary-title -->

            				<table class="table table-summary w-100">
            					<thead>
            						<tr>
            							<th class="font-italic" >Available Balance</th>
            							<th class="font-weight-bold" ><?php echo current_bal($u_id,$conn); ?>.0</th>
            						</tr>
            					</thead>
            				</table><!-- End .table table-summary -->
            			</div><!-- End .summary -->
            		</aside><!-- End .col-lg-3 -->
            		<aside class="col-lg-6">
            			<div class="summary">
            				<h3 class="summary-title">Your Deal Details</h3>
            				<input type="text" value="<?php echo $checkout_id; ?>" id="checkout-id" hidden>
            				<!-- End .summary-title -->

            				<table class="table table-summary w-100" id="load-pro-details">
            					<thead>
            						<tr>
            							<th>Product</th>
            							<th>Price</th>
            							<th>Qty</th>
            							<th>Total</th>
            						</tr>
            					</thead>

            					<tbody>
            						<!-- <div id="load-pro-details"></div> -->
            						<!-- <tr id="load-pro-details"></tr> -->
            						<!-- <tr>
            							<td><a href="#">Beige knitted elastic runner shoes</a></td>
            							<td>1</td>
            							<td>$84.00</td>
            						</tr> -->
            						<!-- </tr> -->
            						<tr class="summary-subtotal">
            							<td>Subtotal:</td>
            							<td>&nbsp</td>
            							<td>&nbsp</td>
            							<td id="sub-total"></td>
            						</tr><!-- End .summary-subtotal -->
            						<tr id="coupon-show">
            						</tr>
                				
            						<tr class="summary-total">
            							<td>Total:</td>
            							<td>&nbsp</td>
            							<td>&nbsp</td>
            							<td id="final-total"></td>
            						</tr><!-- End .summary-total -->
            					</tbody>
            				</table><!-- End .table table-summary -->

            				<button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
            					<span class="btn-text">Join Deal</span>
            					<span class="btn-hover-text">Proceed to Deal</span>
            				</button>
            			</div><!-- End .summary -->
            		</aside><!-- End .col-lg-3 -->
            	</div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
<!-- ERROR MESSAGE DIV-->
  <div id="error-message">
  </div>
  <div id="success-message">
  </div>
<!-- ERROR MESSAGE DIV CLOSE-->

<?php 
include "includes/footer.php";
?>
<script type="text/javascript">
$(document).ready(function(){
// load product deatails 
function LoadProductDetails(){
	$.ajax({
		url : "join-deal-ajax-pages/load-cart-review.php",
		success : function(data){
			$("#load-pro-details > tbody").prepend(data);
			SubTotal();
			loadCouponField();
			MainTotalDisplay();
		}		
	})
}
LoadProductDetails();

// load sub total 
function SubTotal(){
	$.ajax({
		url : "all-products-files/load-sub-total-cart.php",
		success: function(data){
			$("#sub-total").text(data+".0");
		}
	});
}


// load coupon field 
function loadCouponField(){
	$.ajax({
		url : "join-deal-ajax-pages/show-coupon-option.php",
		success: function(data){
			$("#coupon-show").html(data);
		}
	});
}


// update coupon percentage
function addPer(percentage){
	var checkout_id = $("#checkout-id").val();
	var coupon_per = percentage;
	$.ajax({
      url : "join-deal-ajax-pages/update-for-coupon.php",
      type : "POST",
      data :{c_per:coupon_per,checkout_id:checkout_id},
      success :function(data){

      }
    });
}

// final total amount dispaly

function MainTotalDisplay(){
	$.ajax({
  		url : "all-products-files/load-sub-total-cart.php",
  		success: function(sub_total){
  			$.ajax({
		  		url : "join-deal-ajax-pages/final-amt.php",
		  		success: function(percentage){
		  			var minus_per = sub_total / 100 * percentage;
		  			var final_amt = sub_total - minus_per;
		  			$("#final-total").text(final_amt);
		  			  			
		  		}
		  	});		
  		}
  	});

}



  // submit coupon code
	$(document).on("click","#submit-coupon",function(cou){
		var cou_code = $("#coupon-code").val().trim();
		var show_text_coupon =$("#coupon-text-show");
		if(cou_code != ""){
			$.ajax({
	      url : "join-deal-ajax-pages/check-coupon-code.php",
	      type : "POST",
	      data :{c_code:cou_code},
	      success :function(data){
	        if(data > 0){
	        	addPer(data);
	        		$.ajax({
					  		url : "all-products-files/load-sub-total-cart.php",
					  		success: function(total){
					  			
					  			var minus_per = total / 100 * data;
					  			var final_amt = total - minus_per;
					  			$("#final-total").text(final_amt);			  			
					  		}
					  	});      	
	        		loadCouponField();
	          $("#success-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-success mt-1 mb-2 rounded' role='alert'>successfully Applied Coupon code.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	                 $("#error-message").slideUp();
	          setTimeout(function(){$("#success-message").fadeOut("slow")}, 4000);
	        }else if(data == -1){
	        $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger' role='alert mt-1 mb-2 rounded'>sorry this code is Expied.!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	          $("#success-message").slideUp();
	          setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
	        }else if(data == -2){
	        $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger' role='alert mt-1 mb-2 rounded'>Sorry this coupon code Disabled.!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	          $("#success-message").slideUp();
	          setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
	        }else{
	        	$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger' role='alert mt-1 mb-2 rounded'>Sorry this coupon code not matched or Wrong please try again.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	          $("#success-message").slideUp();
	          setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
	        }
	      }
	    });			
		}else{
			$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-primary' role='alert mt-1 mb-2 rounded'>Please Enter Coupon Code.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	  $("#success-message").slideUp();
	  setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
		}
		cou.preventDefault();
	});

});
</script>
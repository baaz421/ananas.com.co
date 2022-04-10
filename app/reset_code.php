<?php 

include "includes/header.php";
?>

<main class="main">

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
    	<div class="container">    		
    		<div class="form-box">
    			<div class="form-tab">
        			<ul class="nav nav-pills nav-fill" role="tablist">
					    <li class="nav-item">
					        <a class="nav-link active " >Forgot Password</a>

					    </li>
					    
					</ul>
					<div class="tab-content">
					<!-- ================ sign in starts =========== -->
					    <div class="tab-pane fade show active">
					    	<form action="forgotpass.php" method="post">
					    		<?php 
			                    if(isset($_SESSION['info'])){
			                    	$in = $_SESSION['info'];
			                    	if($in != null){
			                    		$alert_class = "alert alert-success text-center";

			                    	}
			                        ?>
			                        <div class="<?php echo $alert_class; ?>">
			                            <?php echo $in; ?>
			                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
					    		
					    		<div class="form-group">
					    			<input type="number" class="form-control" placeholder="Enter verification code" name="otp" required>
					    		</div><!-- End .form-group -->

					    		<div class="form-footer">
					    			<button type="submit" name="check-reset-otp" class="btn btn-outline-primary-2">
	                					<span>Continue</span>
	            						<i class="icon-long-arrow-right"></i>
	                				</button>
					    	</form>
					    </div><!-- .End .tab-pane -->

					<!-- ================ sign in close =========== -->

                        
					</div><!-- End .tab-content -->
				</div><!-- End .form-tab -->
    		</div><!-- End .form-box -->

    	</div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</main><!-- End .main -->
<?php 
include "includes/footer.php";
?>
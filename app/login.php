<?php 

@$email = $_SESSION['email'];
if($email != false){
	
	header('Location: http://localhost/molla/app/dashboard.php');
}

include "includes/header.php";
?>
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php"><?php echo $english['home']; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $english['login']; ?></li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
    	<div class="container">    		
    		<div class="form-box">
    			<div class="form-tab">
        			<ul class="nav nav-pills nav-fill" role="tablist">
					    <li class="nav-item">
					        <a class="nav-link active " >Log In</a>
					    </li>
					    
					</ul>
					<div class="tab-content">
					<!-- ================ sign in starts =========== -->
					    <div class="tab-pane fade show active">
					    	<form action="login.php?continue=<?php echo $_GET['continue']; ?>"method="post">
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
					    			<label for="singin-email-2">Username *</label>
					    			<input type="email" class="form-control" id="singin-email-2" name="email" required placeholder="Enter your Email Address">
					    		</div><!-- End .form-group -->

					    		<div class="form-group">
					    			<label for="singin-password-2">Password *</label>
					    			<input type="password" class="form-control" id="singin-password-2" name="password" required>
					    		</div><!-- End .form-group -->

					    		<div class="form-footer">
					    			<button type="submit" name="login" class="btn btn-outline-primary-2">
	                					<span>LOG IN</span>
	            						<i class="icon-long-arrow-right"></i>
	                				</button>

	                				<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="signin-remember-2">
										<label class="custom-control-label" for="signin-remember-2">Remember Me</label>
									</div><!-- End .custom-checkbox -->

									<a href="forgotpass.php" class="forgot-link">Forgot Your Password?</a>
					    		</div><!-- End .form-footer -->
					    	</form>
					    	<div class="form-choice">
						    	<p class="text-center">or sign in with</p>
						    	<div class="row">
						    		<div class="col-sm-6">
						    			<a href="#" class="btn btn-login btn-g">
						    				<i class="icon-google"></i>
						    				Login With Google
						    			</a>
						    		</div><!-- End .col-6 -->
						    		<div class="col-sm-6">
						    			<a href="#" class="btn btn-login btn-f">
						    				<i class="icon-facebook-f"></i>
						    				Login With Facebook
						    			</a>
						    		</div><!-- End .col-6 -->
						    	</div><!-- End .row -->
						    	<div class="row">
	                                <div class="col-sm">
	                                    <br>
	                                    <p class="text-center"> or if new member</p>
	                                    <a href="signup.php" class="btn btn-login">
	                                        <b>Register Here </b>
	                                    </a>
	                                </div>  
	                            </div>
					    	</div><!-- End .form-choice -->
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
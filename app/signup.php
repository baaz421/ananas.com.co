<?php 

include "includes/header.php";
?>

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php"><?php echo $english['home']; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $english['signup']; ?></li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
        <div class="container">         
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        
                        <li class="nav-item">
                            <a class="nav-link active">Register</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                    

                        <!-- ================ register starts =========== -->

                        <div class="tab-pane fade show active" >
                            <form action="signup.php" method="post">

                                <?php 
                                    if(count($errors) == 1){
                                        ?>
                                        <div class="alert alert-danger text-center">
                                            <?php
                                            foreach($errors as $showerror){
                                                echo $showerror;
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }elseif(count($errors) > 1){
                                        ?>
                                        <div class="alert alert-danger">
                                            <?php
                                            foreach($errors as $showerror){
                                                ?>
                                                <li><?php echo $showerror; ?></li>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                ?>
                                <div class="form-group">
                                    <label for="register-email-2">Your name *</label>
                                    <input type="text" class="form-control" name="username" >
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <label for="register-email-2">Your email address *</label>
                                    <input type="email" class="form-control" name="useremail" >
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-password-2">Password *</label>
                                    <input type="password" class="form-control" name="userpass" >
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
                                    <label for="register-password">Your mobile number*</label>                                           
                                    <input type="tel" class="form-control" id="phone" size="100%" name="phone" >
                                    <input type="text" class="form-control" id="ccodez" name="phonecode" hidden >
                                    <input type="text" class="form-control" id="cname" name="contryname"  hidden>
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <label for="register-password">Date Of Birth *</label>
                                    <input type="date" id="datemin" name="birthdate" min="1950-01-02" class="form-control" >
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button type="submit"  name="signup" class="btn btn-outline-primary-2">
                                        <span>SIGN UP</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="register-policy-2" >
                                        <label class="custom-control-label" for="register-policy-2">I agree to the <a href="#">privacy policy</a> *</label>
                                    </div><!-- End .custom-checkbox -->
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
                                        <a href="#" class="btn btn-login  btn-f">
                                            <i class="icon-facebook-f"></i>
                                            Login With Facebook
                                        </a>
                                    </div><!-- End .col-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .form-choice -->
                            <div class="row">
                                <div class="col-sm">
                                    <br>
                                    <p class="text-center">or if already member</p>
                                    <a href="login.php" class="btn btn-login">
                                        <b>Log in Here</b>
                                    </a>
                                </div>  
                            </div>
                        </div><!-- .End .tab-pane -->

                        <!-- ================ register starts =========== -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->

        </div><!-- End .container -->
        
    </div><!-- End .login-page section-bg -->
</main><!-- End .main -->
<script src="build/js/intlTelInput.js"></script>
  <script>
    var input = document.querySelector("#phone");

   var iti = window.intlTelInput(input, {
  //nationalMode: true,
  initialCountry: "auto",
  geoIpLookup: function(callback) {
    $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
      var countryCode = (resp && resp.country) ? resp.country : "qa";
      callback(countryCode);
    });
  },
  separateDialCode: true,
  utilsScript: "build/js/utils.js"
});

  </script>
<?php 
include "includes/footer.php";
?>
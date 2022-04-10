    <!-- =========================footer starts here======================-->
        <footer class="footer">
        	<div class="footer-middle border-0">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget widget-about">
	            				<img src="assets/images/logo.png" class="footer-logo" alt="Footer Logo" width="105" height="25">
	            				<p><?php echo $english['footer_des']; ?></p>

	            				<div class="social-icons">
                                    <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Pinterest"><i class="icon-pinterest"></i></a>
                                </div><!-- End .soial-icons -->
	            			</div><!-- End .widget about-widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget">
	            				<h4 class="widget-title"><?php echo $english['useful_links']; ?></h4><!-- End .widget-title -->

	            				<ul class="widget-list">
	            					<li><a href="about.php"><?php echo $english['about']; ?></a></li>
                                    <li><a href="services.php"><?php echo $english['services']; ?></a></li>
                                    <li><a href="faq.php"><?php echo $english['faq']; ?></a></li>
                                    <li><a href="contact.php"><?php echo $english['contact']; ?></a></li>
                                    <li><a href="login.php"><?php echo $english['login']; ?></a></li>
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget">
	            				<h4 class="widget-title"><?php echo $english['customer_service']; ?></h4><!-- End .widget-title -->

	            				<ul class="widget-list">
	            					<li><a href="#"><?php echo $english['payment_method']; ?></a></li>
	            					<li><a href="#"><?php echo $english['shipping']; ?></a></li>
	            					<li><a href="#"><?php echo $english['terms_conditions']; ?></a></li>
	            					<li><a href="#"><?php echo $english['privacy_policy']; ?></a></li>
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget">
	            				<h4 class="widget-title"><?php echo $english['my_accout']; ?></h4><!-- End .widget-title -->

	            				<ul class="widget-list">
	            					<li><a href="login.php?continue=<?php echo $actual_link; ?>" data-toggle="modal"><?php echo $english['login']; ?></a></li>
	            					<li><a href="cart.php"><?php echo $english['view_holds']; ?></a></li>
	            					<li><a href="wishlist.php"><?php echo $english['wishlist']; ?></a></li>
	            					<li><a href="dashboard.php"><?php echo $english['my_accout']; ?></a></li>
	            					<li><a href="contact.php"><?php echo $english['contact']; ?></a></li>
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->
	            	</div><!-- End .row -->
	            </div><!-- End .container -->
	        </div><!-- End .footer-middle -->

	        <div class="footer-bottom">
	        	<div class="container">
	        		<p class="footer-copyright"><?php echo $english['copyrights']; ?></p><!-- End .footer-copyright -->
	        		<figure class="footer-payments">
	        			<img src="assets/images/payments.png" alt="Payment methods" width="272" height="20">
	        		</figure><!-- End .footer-payments -->
	        	</div><!-- End .container -->
	        </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    <!-- =========================footer close here======================-->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

<!-- =========================mobile view starts here======================-->
    <!-- Mobile Menu -->
    <?php
        include 'mobileview.php';
    ?>
<!-- =========================mobile view close here======================-->


  

    <!-- Google Map -->
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDc3LRykbLB-y8MuomRUIY0qH5S6xgBLX4"></script>
    
    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>

    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.elevateZoom.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.sticky-kit.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/about.html  22 Nov 2019 10:03:54 GMT -->
</html>
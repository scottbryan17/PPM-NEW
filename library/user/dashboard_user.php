<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>
<meta name="viewport" content="width=997">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<style type="text/css" media="screen">
div.cms-rich-text {padding:0}
@font-face {
	font-family: 'Nespresso';
	src:
	url('https://www.nespresso.com/shared_res/nc2/free_html/sg/guides/fonts/nespresso-regular.woff') format('woff'), 
	url('https://www.nespresso.com/shared_res/nc2/free_html/sg/guides/fonts/nespresso-regular.ttf')  format('truetype'),
	url('https://www.nespresso.com/shared_res/nc2/free_html/sg/guides/fonts/nespresso-regular.svg#nespresso') format('svg');
	font-weight: normal;
	font-style: normal;
}

@font-face {
	font-family: 'Nespresso';
	src:
	url('https://www.nespresso.com/shared_res/nc2/free_html/sg/guides/fonts/nespresso-bold.woff') format('woff'), 
	url('https://www.nespresso.com/shared_res/nc2/free_html/sg/guides/fonts/nespresso-bold.ttf')  format('truetype'),
	url('https://www.nespresso.com/shared_res/nc2/free_html/sg/guides/fonts/nespresso-bold.svg#nespresso') format('svg');
	font-weight: bold;
	font-style: normal;
}
#register {background-color:#000; font-family:'Nespresso', Trebuchet, Arial, sans-serif; font-size:14px}
#register .container {max-width:997px; margin:0 auto;}
#register .sign-up h1 {color: #8c734b; text-transform: uppercase; margin-top: 0; font-size: 36px;}
#register .sign-up {background-color:#fff; text-align:center; padding:30px 2%;}
#register .sign-up li { display: inline-block; width: 49%; vertical-align:top; padding: 0}
#register .sign-up-img { float: left; width: 25%;}
#register .sign-up-content { float: left; width: 73%;  color: #333}
#register .sign-up-content h2 { text-transform: none!important; }
#register .sign-up h2 {text-transform:uppercase; font-size:22px; margin-bottom:20px; margin-top: 0; color: #000}
#register .sign-up h4 {color:#8c734b; font-weight:normal; font-size:17px; margin:0 0 40px}
#register .sign-up ul {text-align:left; list-style-type: none; padding: 25px 0 25px 0;}
#register .sign-up .cta {border-top:1px dotted #8c734b; margin:0; padding:50px 0}
#register .sign-up .cta a {display:inline-block; padding:15px; width:250px; border-radius:5px; color:#fff; text-transform:uppercase; text-decoration:none; font-size:16px;
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#292929+0,000000+100 */
	background: #292929; /* Old browsers */
	background: -moz-linear-gradient(top,  #292929 0%, #000000 100%); /* FF3.6-15 */
	background: -webkit-linear-gradient(top,  #292929 0%,#000000 100%); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(to bottom,  #292929 0%,#000000 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#292929', endColorstr='#000000',GradientType=0 ); /* IE6-9 */
}
#register .sign-up .cta a i {margin-left:5px}
@media only screen and (max-width: 767px) {
	#register .sign-up li {width: auto; display: block; overflow: hidden;}
}
@media only screen and (max-width: 600px) {
	#register .sign-up .cta a {margin:0 auto 10px; display: block;}
}

#register .how-to-register {background-color:#303030; text-align:center; padding:60px; overflow:hidden;}
@media only screen and (max-width: 768px) {
	#register .how-to-register {padding: 30px;}
}
#register .how-to-register h4 {font-size:18px; color:#c6c5c5; font-weight: normal; margin:20px; padding:0 150px 0 150px;}
@media screen and (max-width: 1024px) {
	#register .how-to-register h4 {padding: 0;}
}
<!--#register .how-to-register h1 {color:#8c734b; text-transform:uppercase; margin-top:0; font-size:36px}-->
#register .how-to-register ul {list-style:none; float:left; width:50%; box-sizing:border-box; padding-right:30px}
@media screen and (max-width: 480px) {
#register .how-to-register ul {width: 100%!important;}
}
#register .how-to-register li {text-align:left; margin-bottom:20px; padding-left:20px; position: relative;}
#register .how-to-register .right-icon {position: absolute; left:0; top: 5px;}
#register .how-to-register i.fa.fa-chevron-right { color: #8c734b;}
#register .how-to-register li a {color:#c6c5c5; text-decoration:none;}
#register .register-steps {background-color:#474747; padding:80px 50px 0; color:#c6c5c5; overflow:hidden; clear: both;}
@media screen and (max-width: 768px) {
#register .register-steps {padding:30px;!important;}
}
#register .register-steps  h2 {color:#8c734b; text-transform:uppercase; margin-top:0; font-size:24px; text-align: center; padding-bottom: 25px; margin:0}
#register .step-container {position:relative; clear:both}
#register .step-container .step-note {font-size:11px}
#register .step-container .step-content strong {display:block; font-weight:normal; color:#a98e61; font-size:30px}
#register .step-container .step-content p {margin-top:5px}
#register #step1 .step-image {float:left}
@media only screen and (max-width: 768px) {
	#register #step1 .step-image img {max-width:100%!important;}
}
#register #step1 .step-content {width:260px; float:left; margin-left: 20px; margin-top: 10px;}
@media only screen and (max-width: 768px) { 
	#register #step1 .step-content {margin-left:0!important; width:auto!important; margin-bottom: 20px;}
}
#register #step2 .step-image {float:right}
@media only screen and (max-width: 768px) {
	#register #step2 .step-image img {max-width:100%!important; float:none;}
}
#register #step2 .step-content {width:380px; text-align:right; position:absolute; top:12px; left:0px;}
@media only screen and (max-width: 768px) {
	#register #step2 .step-content  {position:inherit!important; width:auto!important; text-align:left!important; margin-bottom: 50px; top:15px;}
}
#register #step2 strong {margin-right:-5px}
#register #step3 .step-image {float:left}
@media only screen and (max-width:768px) {
	#register #step3 .step-image img {max-width:100%!important; float:none;}
}
#register #step3 .step-content {width:300px; position:absolute; right: 90px; top:0px;}
@media only screen and (max-width:768px) {
	#register #step3 .step-content {margin-left:0!important; position:inherit!important; left:0!important; width:auto!important; float:left;}
}
#register .find-serial-number h2 {color: #8c734b; text-transform:uppercase; font-size:24px; margin-bottom:0; margin-top: 0; padding-bottom:10px;}
#register .find-serial-number {color:#c6c5c5; background-color:#424242; text-align:center; padding:50px; font-size:16px; overflow: hidden;}
@media only screen and (max-width: 768px) {
	#register .find-serial-number {padding: 30px;}
}
#register .find-serial-number .background-hover { height: 70px; overflow: hidden; transition: height 0.5s; -webkit-transition: height 0.5s;}
@media only screen and (max-width:768px) {
	#register .find-serial-number .background-hover{height:90px;}
}
#register .find-serial-number .background-hover:hover { height: 500px;}
#register .find-serial-number .triangle-shape { width: 0px; height: 0px; border-left: 15px solid transparent; border-right: 15px solid transparent; border-top: 15px solid #8c734b; margin: 0 auto; padding-bottom: 40px;}
#register #serial-number-img .serial-image { float: right; }
@media only screen and (max-width: 768px) {
	#register #serial-number-img .serial-image img {max-width:100%; float:none;}
}
#register #serial-number-img .serial-content { width: 350px; float: right; text-align: right; position:absolute; left: 36px; margin-top:30px; font-size: 14px;}
@media only screen and (max-width: 768px) {
	#register #serial-number-img .serial-content {width:auto!important; position:inherit!important; text-align:left!important; left:0!important; margin-top:0!important;}
}
#register .serial-container { position: relative; clear: both; }

#register .register-now { color: #c6c5c5; background-color: #323232; text-align: center; padding:30px 130px 50px; font-size: 16px;}
@media only screen and (max-width: 768px) {
#register .register-now {padding: 30px;}
}
#register .register-now p { margin-bottom: 30px;}
#register .register-now a { display: inline-block; background-color: #8c734b; color: #fefefe; font-size: 15px; text-transform: uppercase; text-decoration: none; padding:10px; width: 300px;}

#register .nespresso-business h2 {color: #8c734b; text-transform:uppercase; font-size:24px; margin-bottom:0; margin-top: 0;}
#register .nespresso-business p {font-size: 14px; margin:20px 0}
#register .nespresso-business { color: #c6c5c5; background-color: #2b2b2b; text-align: center; padding: 50px; font-size: 16px;}
@media only screen and (max-width: 768px) {
	#register .nespresso-business {padding: 30px;}
}
#register .nespresso-business a { color: #c6c5c5; text-decoration: underline;}

#register .transfer-nespresso-account { color: #c6c5c5; background-color: #353535; text-align: center; padding: 50px; font-size: 16px;}
@media only screen and (max-width:480px) {
#register .transfer-nespresso-account {padding: 30px!important;}
}
#register .transfer-nespresso-account h2 {color: #8c734b; text-transform:uppercase; font-size:24px; margin-bottom:0; margin-top: 0; padding: 0 20px 0 20px;}
@media only screen and (max-width: 768px) {
	#register .transfer-nespresso-account h2 {padding: 0px;}
}
#register .transfer-nespresso-account p {margin: 20px 0}
#register .transfer-nespresso-account ul { text-align:left; font-size:14px;}
#register .transfer-nespresso-account a { color: #c6c5c5; text-decoration: underline;}

#register .login-fail{ color: #c6c5c5; background-color: #3d3d3d; text-align: center; padding: 50px 100px; font-size: 16px;}
@media only screen and (max-width: 768px) {
#register .login-fail {padding: 30px;}
}
#register .login-fail p { font-size: 14px; margin: 20px 0}
#register .login-fail h2 {color: #8c734b; text-transform:uppercase; font-size:24px; margin-bottom:0; margin-top: 0;}
#register .login-fail a { color: #c6c5c5; text-decoration: underline;}

#register .register-contact {background-color:#3d3d3d; color:#c6c5c5; padding:0 150px 50px; font-size:16px; text-align:center; border-top: 1px dotted #c6c5c5;}
@media only screen and (max-width: 768px) {
	#register .register-contact {padding: 30px;}
}
#register .register-contact a {color:#c6c5c5; text-decoration: underline;}
#register .register-contact p {margin: 20px 0}

#register .update-account {background-color:#424242; color:#c6c5c5; padding:40px 30px; font-size:16px; text-align:center; overflow:hidden;}
@media only screen and (max-width: 768px) {
	#register .register-contact {padding: 30px;}
}
#register .update-account h2 {color: #8c734b; text-transform:uppercase; font-size:24px; margin-bottom:0; margin-top: 0;}
#register .update-account p {font-size:14px;}
#register #contact-account {padding-top:40px;} 
#register #contact-account .contact-image { float: left;}
@media only screen and (max-width: 768px) {
	#register #contact-account .contact-image {float: none!important;}
}
.contact-image img {max-width: 100%;}
#register .contact-content { float:right; width:420px; }
@media only screen and (max-width: 1024px) {
	#register .contact-content {float: none; width: auto;}
}
#register .contact-content h4 {margin: 0; font-weight:normal}
#register .contact-content p { margin-top:0; font-size:13px;}
#register .update-account ul {text-align:left; list-style-type: none; padding:0; margin-top:0;}
#register .update-account li {margin-bottom:25px;} 
</style>
<div id="register">
	<div class="container">
		<div class="sign-up">
			<h1>How to register</h1>
			<h4>Register with <i>Nespresso</i> now to place your order online and enjoy these exclusive benefits:</h4>
			<ul>
				<li>
					<div class="sign-up-img"><img src="https://www.nespresso.com/shared_res/nc2/free_html/sg/guides/images/sign-up.jpg"></div>
					<div class="sign-up-content">
						<h2>The <i>Nespresso</i> online</h2>
						<p>With the <i>Nespresso</i> online or mobile application, you can easily order anytime, anywhere 24 hours a day, 7 times a week. As a Club Member, keep up to date with <i>Nespresso</i> news, discover new releases and enjoy exclusive online offers.</p>
					</div>
				</li>
				<li>
					<div class="sign-up-img"><img src="https://www.nespresso.com/shared_res/nc2/free_html/sg/guides/images/service-box.jpg"></div>
					<div class="sign-up-content">
						<h2>Services just for you</h2>
						<p>Enjoy free delivery when you purchase minimum 150 capsules, $130 spent or a <i>Nespresso</i> machine. Receive your order on the same day when you order before 1.30pm.</p>
					</div>
				</li>
			</ul>	
			<div class="cta">
				<h2>SIGN UP FOR YOUR <i>Nespresso</i> ACCOUNT</h2>
				<a href="#register-step">How to Register <i class="fa fa-chevron-right" aria-hidden="true"></i></a> <a href="order.html">How to order <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
			</div>
		</div><!-- sign-up -->
		<div id="register-step" class="how-to-register">
			<h4>Choose your user status and we will guide you accordingly on registering your account:</h4>
            <ul>
            	<li><i class="fa fa-chevron-right right-icon" aria-hidden="true"></i> <a href="#register-step-1">It is my first time registering with <i>Nespresso</i></a></li>
                <li><i class="fa fa-chevron-right right-icon" aria-hidden="true"></i> <a href="#step2">I am registered with <i>Nespresso</i> in Singapore but never online</a></li>
                <li><i class="fa fa-chevron-right right-icon" aria-hidden="true"></i> <a href="#use-nespresso-business">I use <i>Nespresso</i> in my business</a></li>
            </ul>
            <ul>
                <li><i class="fa fa-chevron-right right-icon" aria-hidden="true"></i> <a href="#transfer-account">I have moved to Singapore and wish to transfer my <i>Nespresso</i> account</a></li>
            	<li><i class="fa fa-chevron-right right-icon" aria-hidden="true"></i> <a href="#contact-register">I want to update my account information</a></li>
                <li><i class="fa fa-chevron-right right-icon" aria-hidden="true"></i> <a href="#account-fail-to-login">I have a <i>Nespresso</i> account but cannot login</a></li>
            </ul>
		</div><!-- how-to-register-->
        <div id="register-step-1" class="register-steps">
			<h2>It is my first time registering with <i>Nespresso</i></h2>
        	<div id="step1" class="step-container">
            	<div class="step-image"><img src="images/step-1.jpg"></div>
            	<div class="step-content">
                	<strong>01.</strong>
                    <p>Click on "Register" located on the top right hand corner of the website.</p>
                </div>
            </div>
            <div id="step2" class="step-container">
            	<div class="step-image"><img src="images/step-2.jpg"></div>
            	<div class="step-content">
                	<strong>02.</strong>
                    <p>Fill in your personal information and address. Fields stated with an asterisk (*) are mandatory.</p>
					<p>If you already have an existing <i>Nespresso</i> Club membership number, please select 'Yes, I have a <i>Nespresso</i> Club membership number'. Enter your membership number and your address postal code and click  'Continue'. Your membership number can be found on your order invoice.</p>
                </div>
            </div>
        	<div id="step3" class="step-container">
            	<div class="step-image"><img src="images/step-3.jpg"></div>
            	<div class="step-content">
                	<strong>03.</strong>
                    <p>If you have bought a new machine, register it now to enjoy a 2 year warranty and take advantage of the <i>Nespresso</i> Assistance Service. Select your machine model and key in the machine serial number,  date of purchase and store purchase location.</p>
                </div>
            </div>
        </div><!-- register-steps -->
		<div class="find-serial-number">
			<div class="background-hover">
				<h2>How to find my machine serial number?</h2>
				<div class="triangle-shape"></div>	
				<div id="serial-number-img" class="serial-container">
					<div class="serial-image"><img src="images/find-serial-number.jpg"></div>
					<div class="serial-content">
						<p>The <i>Nespresso</i> serial number consists of 19 alphanumeric characters and can be found on the drip tray or at the base of your machine, printed on a removable sticker.</p>
					</div>
				</div>
			</div>
        </div><!-- find-serial-number -->
		
        <div class="register-now">
        	<p>When your registration is complete, an email will be sent to the email address you provided. You are now ready to discover the world of <i>Nespresso</i>.</p>
            <a href="https://www.nespresso.com/sg/en/registration" target="_blank">Register for my account now <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
        </div><!-- register-now -->
		
		<div id="use-nespresso-business" class="nespresso-business">
			<h2>I use <i>nespresso</i> in my business</h2>
        	<p>If you are a business user using professional capsules, please access the <i>Nespresso</i> Professional website at <a href="https://www.nespresso.com/pro/sg/en/home" target="_blank">www.nespresso.com/pro</a> to login.</p>
        </div><!-- nespresso-business -->
		
		<div id="transfer-account" class="transfer-nespresso-account">
			<h2>I have moved to Singapore and wish to transfer my <i>Nespresso</i> account</h2>
        	<p>If you have an existing account in another country, you can either:</p>
			<ul>
				<li>Create a new account on <i>Nespresso</i> Singapore's website using a different email address or;</li>
				<li>Contact the <i>Nespresso</i> Club at 800 852 3525 (24/7 toll-free) or fill in the <a href="https://www.nespresso.com/sg/en/contactus" target="_blank">contact form</a> to transfer your account to Singapore.</li>
			</ul>
        </div><!-- transfer-nespresso-account -->
		
		<div id="account-fail-to-login" class="login-fail">
			<h2>I have a <i>Nespresso</i> account but I cannot login</h2>
        	<p>Have you forgotten your password? <a href="https://www.nespresso.com/pro/sg/en/forgotPassword" target="_blank">Click here</a> to reset it. If you do not receive a reset password email from <i>Nespresso</i> you may need to <a href="https://www.nespresso.com/sg/en/registration" target="_blank">register</a> for a new account.</p>
			<p>If you still encounter difficulties with registration, contact us by filling in the <a href="https://www.nespresso.com/sg/en/contactus" target="_blank">contact form</a> or call the <i>Nespresso</i> Club at 800 852 3525 (24/7 toll-free). </p>
        </div><!-- login-fail -->
		
        <div class="register-contact">
        	<p><img src="https://www.nespresso.com/shared_res/nc2/free_html/sg/guides/images/contact-bubble.png"></p>
        	<p>If you still encounter difficulties with registration, contact us by filling in the <a href="https://www.nespresso.com/sg/en/contactus" target="_blank">contact form</a> or call the <i>Nespresso</i> Club at 800 852 3525 (24/7 toll-free).</p>
        </div><!-- register-contact -->
		
		<div id="contact-register" class="update-account">
			<h2>I want to update my account information</h2>
			<p>You can manage your account information under 'MY ACCOUNT' section located at the top right hand corner of the website after logging in.</p>
			<div id="contact-account" class="contact-container">
            	<div class="contact-image"><img src="https://www.nespresso.com/shared_res/nc2/free_html/sg/guides/images/my-account.jpg"></div>
				<div class="contact-content">
					<ul>
						<li>
							<h4>MY ORDERS</h4>
							<p>View the last 15 orders in your history</p>
						</li>
						<li>
							<h4>MY CHECKOUT PREFERENCES</h4>
							<p>Save your credit card details to speed up the checkout process.</p>
						</li>
						<li>
							<h4>MY PERSONAL INFORMATION</h4>
							<p>Access your membership number, manage your email address and password, or register your coffee machine here.</p>
						</li>
						<li>
							<h4>MY ADDRESSES</h4>
							<p>Manage your billing and delivery address. You may add multiple address in this section.</p>
						</li>
						<li>
							<h4>MY SUBSCRIPTIONS</h4>
							<p>Manage how you receive news from Nespresso through email,SMS or phone.</p>
						</li>
						<li>
							<h4>MY ALERTS</h4>
							<p>Subscribe to email alerts to remind you to order your capsules when you are running low on coffee, or when your machine needs cleaning.</p>
						</li>
					</ul>
				</div>
            </div>			
        </div><!-- update-contact -->
	</div><!-- container -->
</div><!-- #register -->

<?php include('footer.php') ?>
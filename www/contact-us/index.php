<?php
include('../inc/purityofessence.php');
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Contact Us | MasterCard WorldWide Insights</title>
	<meta name="description" content="Contact us for more information. If your financial institution, corporation, or government agency is interested in more information on the MasterCard Mobile Payments Readiness Index, please complete the information below.">
	<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/css/central.css" type="text/css" />
    <!--[if lte IE 7]>
        <link href="/css/patches/patch_layout.css" rel="stylesheet" type="text/css" />
    <![endif]-->
	<script src="/js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body>
	<?php include('../inc/header.php') ?>

	<div class="page_margins">
	        <div id="main" role="main">
			<form id="contactform" class="yform" method="post" action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8">
				<div class="content-box">
					<h2>Contact Us</h2>
					<article>
						<h3>Get In Touch</h3>
						<p>If your financial institution, corporation, or government agency is interested in more information on the MasterCard Mobile Payments Readiness Index, please complete the information below.<br /><br />
							<span class="orange">*</span> Required</p>
							<div style="padding-left:20px">
							<div class="type-text">
								<label for="first_name">First Name <span class="orange">*</span></label>
								<input type="text" id="first_name" name="first_name" style="width:300px" maxlength="40" class="required" />
							</div>
							<div class="type-text">
								<label for="last_name">Last Name <span class="orange">*</span></label>
								<input type="text" id="last_name" name="last_name" style="width:300px" maxlength="80" class="required" />
							</div>
							<div class="type-text">
								<label for="email">Email Address <span class="orange">*</span></label>
								<input type="text" id="email" name="email" style="width:300px" maxlength="80" class="required email" />
							</div>
							<div class="type-text">
								<label for="phone">Phone <span class="orange">*</span></label>
								<input type="text" name="phone" id="phone" style="width:300px" maxlength="40" class="required"/>
							</div>
							<div class="type-text">
								<label for="company">Organization <span class="orange">*</span></label>
								<input type="text" name="company" id="company" style="width:300px" maxlength="40" class="required"/>
							</div>
							<div class="type-text">
								<label for="description">Comments</label>
								<textarea name="description" id="description" style="height:65px"> </textarea>
							</div>
							<div class="type-check">
								<input id="NF0000007rm05" name="00NF0000007rm05" type="checkbox" value="1" />
								<label for="NF0000007rm05">I would like to sign up for MasterCard's insights email list.</label>
							</div>
							<p style="margin-top:1em"><a href="http://www.mastercard.us/privacy/">Global Privacy Policy</a></p>
							<div>
								<input type="image" alt="Submit" src="/css/screen/img/btn_submit.png" style="width:97px;height:35px;" />
							</div>
							</div>
					</article>
				</div>
				<input type="hidden" name="Publishing_Source__c" value="MPRI Contact Us" />
				<input type="hidden" name="LeadSource" value="Website" />
				<input type="hidden" name="oid" value="00DA0000000K9eN">
				<input type="hidden" name="retURL" value="http://<?php echo $_SERVER['HTTP_HOST'] ?>/contact-us/thankyou.php">
			</form>
     
			<?php include('../inc/subfooter.php') ?>
		</div>
	</div>
	<?php include('../inc/footer.php') ?>
	<script src="/js/libs/jquery.validate.min.js" type="text/javascript"></script>
    <script type='text/javascript'>
		$(function () { $(".contact-us a").addClass("active");  });
		
		$("#contactform").validate();
	</script>
	<?php include('../inc/ga.php') ?>
</body>
</html>

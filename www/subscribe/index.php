../subscribe/index.php<?php
        include_once '../inc/purityofessence.php';
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Subscribe | MasterCard WorldWide Insights</title>
	<meta name="description" content="Sign up to get Mastercard insights in your inbox." />
	<meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="/css/central.css" type="text/css" />
    <!--[if lte IE 7]>
        <link href="/css/patches/patch_layout.css" rel="stylesheet" type="text/css" />
    <![endif]-->
	<script src="/js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body>
	<?php include('../inc/header.php') ?>

	<form id="subscribeform" class="yform" action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="post" onsubmit="return validation(this);">
	<div class="page_margins">
        <div id="main" role="main">
			<div id="reports-process">
				<a href="javascript:history.go(-1);" class="back">Back</a>
				<div class="content-box">
					<h2>Email List Signup</h2>
					<article>
						<h3 style="width:100%">Sign up to get Mastercard insights in your inbox.</h3>
						<p style="width:660px">Sign up for MasterCard's insights email list. We'll never share your information with others, and you can opt-out at any time.
						</p>
						<div class="subcolumns">
							<div class="c50l">
								<div class="panel" style="height: 460px;">
									<h3>Sign Up</h3>
									<div style="margin:0 40px">
											<div class="type-text">
												<input type="text" title="First Name" id="first_name" name="first_name" style="width:300px" class="required" />
											</div>
											<div class="type-text">
												<input type="text" title="Last Name" id="last_name" name="last_name" style="width:300px" class="required" />
											</div>
											<div class="type-text">
												<input type="text" title="Email Address" id="email" name="email" style="width:300px" class="required email" />
											</div>
<!--
											<div class="type-check">
												<input type="checkbox" id="NF0000007rm05" name="00NF0000007rm05" class="required" value="1" title="Please check to agree" />
												<label for="NF0000007rm05">I would like to sign up for MasterCard's insights email list.</label>
											</div>
-->
											<p style="margin-top:1em"><a href="http://www.mastercard.us/privacy/">Global Privacy Policy</a></p>
											<div>
												<input type="image" name="submit" alt="Sign up" src="/css/screen/img/btn-signup2.png" style="width:97px;height:35px;" />
											</div>
									</div>
								</div>
							</div>
							<div class="c50r">
								<div class="panel"  style="height: 460px;text-align:center">
									<h3 style="margin-bottom:50px">Share</h3>
									<p>Tell your colleagues about the MPRI:</p>
									<div class="icons floatbox">
										<a rel="0" class="newWindow twitter" title="Twitter" href="https://twitter.com/intent/tweet?url=<?php echo $topTwitterURL ?>&text=<?php echo $topTwitterMessage ?>"></a>
										<a rel="0" class="newWindow linkedin" title="LinkedIn" href="http://www.linkedin.com/cws/share?url=<?php echo $topLinkedInURL ?>&token=&isFramed=false&lang=en_US"></a>
										<a rel="1" class="newWindow facebook" title="Facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $topFacebookURL ?>&t=<?php echo $topFacebookMessage ?>"></a>
										<a rel="1" class="newWindow pinterest" title="Pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo $topPinterestURL ?>&media=<?php echo $topPinterestImage ?>&description=<?php echo $topPinterestMessage ?>"></a>
									</div>
									<div style="color:#aaa">
										Direct Link<br />
										<input type="text" id="txtDirectlink" class="styledtextbox" value="http://bit.ly/IyZ5P4" />
									</div>
								</div>
							</div>
						</div>
					</article>
				</div>			
			<?php include('../inc/subfooter.php') ?>
		</div>
		</div>
	</div>
	<?php include('../inc/footer.php') ?>
	<input type="hidden" name="Publishing_Source__c" value="MPRI Subscribe" />
	<input type="hidden" name="lead_source" value="Website" />
	<input type="hidden" name="oid" value="00DA0000000K9eN">
	<input type="hidden" name="retURL" value="http://<?php echo $_SERVER['HTTP_HOST'] ?>/subscribe/process-signedup.php">
	</form>

    <script type='text/javascript'>
		$(function () { 
			// find all the input elements with title attributes
			$('input[title!=""]').hint();
			// find all the input elements with title attributes
			$('textarea[title!=""]').hint();
		});

		function validation(form) {
			if(form.first_name.value == '' || form.first_name.value == "First Name") {
				alert('Please enter your first name');
				form.first_name.focus();
				return false;
			}

			if(form.last_name.value == '' || form.last_name.value == "Last Name") {
				alert('Please enter your last name');
				form.last_name.focus();
				return false;
			}

			if(form.email.value == '' || form.email.value == "Email Address") {
				alert('Please enter your email address');
				form.email.focus();
				return false;
			} else {
				var emailValidation = form.email.value;
				if (emailValidation.indexOf('@') == -1){
					alert('Please enter a valid email address');
					form.email.focus();
					return false;
				}
			}

//			if(!form.NF0000007rm05.checked) {
//				alert('Please click the checkbox to receive marketing information about MasterCard products');
//				form.NF0000007rm05.focus();
//				return false;
//			}
			
			return true;
		}

	</script>
	<?php include('../inc/ga.php') ?>
</body>
</html>

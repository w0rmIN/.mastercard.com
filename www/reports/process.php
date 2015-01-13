../reports/process.php<?php
        #include_once('../inc/purityofessence.php');
	require_once 'HTMLPurifier.auto.php';
	$config = HTMLPurifier_Config::createDefault();
	$purifier = new HTMLPurifier($config);

	function get_bitly_short_url($url,$login,$appkey,$format='txt') {
		$connectURL = 'http://api.bit.ly/v3/shorten?login='.$login.'&apiKey='.$appkey.'&uri='.urlencode($url).'&format='.$format;
		return curl_get_result($connectURL);
	}

	/* returns expanded url */
	function get_bitly_long_url($url,$login,$appkey,$format='txt') {
		$connectURL = 'http://api.bit.ly/v3/expand?login='.$login.'&apiKey='.$appkey.'&shortUrl='.urlencode($url).'&format='.$format;
		return curl_get_result($connectURL);
	}

	/* returns a result form url */
	function curl_get_result($url) {
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}

	//Get the current page's URL and convert to a short URL
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

	/* get the short url */
	$short_url = ""; //get_bitly_short_url($pageURL,'tmurzens','R_e8194fd945830f544ddf77581860d5ae');

	/* get the long url from the short one */
	//$long_url = get_bitly_long_url($short_url,'tmurzens','R_e8194fd945830f544ddf77581860d5ae');

	//Get the requested files and zip them
	include '../country-data/popularity.php';
	$files_to_zip = array();
	if (isset($_GET["downloadall"])) {
		$download_file = "pdf/MasterCard_MPRI_All.zip";
		$pdfdownload_file = "pdf/MasterCard_MPRI_All.pdf";
		$Show_DL_PDF = true;
	} else {
		if(isset($_GET["c"])) {
                  foreach ($_GET["c"] as $value){
			array_push($files_to_zip, $value);
			//increment the "popularity" value
			$value = strtoupper($value);
			$$value++;
			$Total++;
		  }
		}
                if (isset($_GET["c1"])) { 
			array_push($files_to_zip, $_GET["c1"]); 
			//increment the "popularity" value
			$value = strtoupper($purifier->purify($_GET["c1"]));
			$$value++;
			$Total++;
		}
		if (isset($_GET["c2"])) { 
			array_push($files_to_zip, $purifier->purify($_GET["c2"])); 
			//increment the "popularity" value
			$value = strtoupper($purifier->purify(($_GET["c2"])));
			$$value++;
			$Total++;
		}
		
		if (count($files_to_zip) > 1) {
			// multiple files selected - download a zip
			$download_file = "/reports/downloadzip.php?c1=".implode(",", $files_to_zip);
			$pdfdownload_file = "/reports/downloadmulti.php?c1=".implode(",", $files_to_zip);
			$Show_DL_PDF = true;
		} else if (count($files_to_zip) == 1) {
			// one file selected - download PDF
			$download_file = "downloadsingle.php?c=pdf/".$files_to_zip[0].".pdf";
			$Show_DL_PDF = false;
		} else {
			// no files selected
			header('Location: /reports/?count=0');
		}
	
		//Write incremented popularity values to file
		$newfile = "<?php\n" .
			"\$Total = ". $Total . ";\n" . "\$GLB = ". $GLB . ";\n" .
			"\$AR = ". $AR . ";\n" . "\$AU = ". $AU . ";\n" .
			"\$BR = ". $BR . ";\n" . "\$CA = ". $CA . ";\n" .
			"\$CN = ". $CN . ";\n" . "\$CO = ". $CO . ";\n" .
			"\$EG = ". $EG . ";\n" . "\$FR = ". $FR . ";\n" .
			"\$DE = ". $DE . ";\n" . "\$HK = ". $HK . ";\n" .
			"\$HU = ". $HU . ";\n" . "\$IN = ". $IN . ";\n" .
			"\$ID = ". $ID . ";\n" . "\$IT = ". $IT . ";\n" .
			"\$JP = ". $JP . ";\n" . "\$KE = ". $KE . ";\n" .
			"\$MY = ". $MY . ";\n" . "\$MX = ". $MX . ";\n" .
			"\$NZ = ". $NZ . ";\n" . "\$NG = ". $NG . ";\n" .
			"\$PH = ". $PH . ";\n" . "\$PL = ". $PL . ";\n" .
			"\$RU = ". $RU . ";\n" . "\$SA = ". $SA . ";\n" .
			"\$SG = ". $SG . ";\n" . "\$ZA = ". $ZA . ";\n" .
			"\$KR = ". $KR . ";\n" . "\$TW = ". $TW . ";\n" .
			"\$TH = ". $TH . ";\n" . "\$TR = ". $TR . ";\n" .
			"\$AE = ". $AE . ";\n" . "\$GB = ". $GB . ";\n" .
			"\$US = ". $US . ";\n" . "\$VN = ". $VN . ";\n" .
			"?> \n";
		$fh = @fopen("../country-data/popularity.php", 'w');
		if ($fh) {
			fwrite($fh, $newfile);
		}
		@fclose($fh);
	}
	
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Download Reports | MasterCard WorldWide Insights</title>
	<meta name="description" content="Download reports for the Mobile Payments Readiness Index (MPRI) from MasterCard Insights. Download the Whitepaper, or download any of the country reports.">
	<meta http-equiv='refresh' content='3;url=<?php echo $download_file ?>'>
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
			<div id="reports-process">
				<a href="javascript:history.go(-1);" class="back">Back</a>
				<div class="content-box">
					<h2>Download the Report</h2>
					<article>
						<div class="subcolumns">
							<div class="c50l" id="instructions">
								<h3>Your download will start automatically.</h3>
								<p>If your download does not start, <a href="<?php echo $download_file ?>">click here</a>.
<?php if ($Show_DL_PDF) { ?>
									<br />Trouble with .zip files? <a href="<?php echo $pdfdownload_file ?>" target="_blank">Download a PDF instead</a>.
<?php } ?>
									</p>
							</div>
							<div class="c50r">
								<div class="dl-additional">
									<div><a href="/reports/"><span>Download additional MPRI reports</span></a></div>
								</div>
							</div>
						</div>
						<div class="subcolumns">
							<div class="c50l">
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
							<div class="c50r">
								<div class="panel" style="height: 460px;">
									<h3>Sign Up</h3>
									<div style="margin:0 40px">
										<p>Sign up to get MasterCard insights in your inbox</p>
										<form id="subscribeform" class="yform" action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="post" onsubmit="return validation(this);">
											<div class="type-text">
												<input type="text" title="First Name" id="first_name" name="first_name" style="width:300px" class="required" />
											</div>
											<div class="type-text">
												<input type="text" title="Last Name" id="last_name" name="last_name" style="width:300px" class="required" />
											</div>
											<div class="type-text">
												<input type="text" title="Email Address" id="email" name="email" style="width:300px" class="required email" />
											</div>
											<div class="type-check">
												<input type="checkbox" id="NF0000007rm05" name="00NF0000007rm05" class="required" title="Please check to agree" />
												<label for="NF0000007rm05">I would like to sign up for MasterCard's insights email list.</label>
											</div>
											<div class="subcolumns">
												<div class="c50l">
													<div>
														<input type="image" alt="Sign up" src="/css/screen/img/btn-signup2.png" style="width:97px;height:35px;" />
													</div>
												</div>
												<div class="c50r">
													<p style="margin-top:1em"><a href="http://www.mastercard.us/privacy/">Global Privacy Policy</a></p>
												</div>
											</div>
											<input type="hidden" name="Publishing_Source__c" value="MPRI Subscribe" />
											<input type="hidden" name="lead_source" value="Website" />
											<input type="hidden" name="oid" value="00DA0000000K9eN">
											<input type="hidden" name="retURL" value="http://<?php echo $_SERVER['HTTP_HOST'] ?>/reports/process-signedup.php">
										</form>
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
    <script type='text/javascript'>
		$(function () { 
			$(".reports a").addClass("active");

			// find all the input elements with title attributes
			$('input[title!=""]').hint();
			// find all the input elements with title attributes
			$('textarea[title!=""]').hint();

		});
	</script>
	<script type="text/javascript">
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

			if(!form.NF0000007rm05.checked) {
				alert('Please click the checkbox to receive marketing information about MasterCard products');
				form.NF0000007rm05.focus();
				return false;
			}
			
			return true;
		}

	</script>
	<?php include('../inc/ga.php') ?>
</body>
</html>

../subscribe/process-signedup.php<?php
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

	/* creates a compressed zip file */
	function create_zip($files = array(),$destination = '',$overwrite = false) {
		//if the zip file already exists and overwrite is false, return false
		if(file_exists($destination) && !$overwrite) { return false; }
		//vars
		$valid_files = array();
		//if files were passed in...
		if(is_array($files)) {
			//cycle through each file
			foreach($files as $file) {
				//make sure the file exists
				if(file_exists($file)) {
					$valid_files[] = $file;
				}
			}
		}
		//if we have good files...
		if(count($valid_files)) {
			//create the archive
			$zip = new ZipArchive();
			if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
				return false;
			}
			//add the files
			foreach($valid_files as $file) {
				$zip->addFile($file,$file);
			}
			//debug
			//echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
			
			//close the zip -- done!
			$zip->close();
			
			//check to make sure the file exists
			return file_exists($destination);
		} else {
			return false;
		}
	}

	//Get the current page's URL and convert to a short URL
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

	/* get the short url */
	$short_url = get_bitly_short_url($pageURL,'tmurzens','R_e8194fd945830f544ddf77581860d5ae');

	/* get the long url from the short one */
	//$long_url = get_bitly_long_url($short_url,'tmurzens','R_e8194fd945830f544ddf77581860d5ae');

?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Subscribe | MasterCard WorldWide Insights</title>
	<meta name="description" content="Sign up to get Mastercard insights in your inbox.">
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
				<div class="content-box">
					<h2>Email List Signup</h2>
					<article>
						<div class="subcolumns">
							<div class="c50l">
								<div class="panel">
									<h3 style="margin-bottom:50px">Sign Up</h3>
									<div style="margin:0 40px">
										<p style="text-align:center">Thank You</p>
									</div>
								</div>
							</div>
							<div class="c50r">
								<div class="panel" style="text-align:center">
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
	<?php include('../inc/ga.php') ?>
</body>
</html>

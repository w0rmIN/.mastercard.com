../country-comparisons/index.php<?php
        include_once '../inc/purityofessence.php';
	$HasC1 = false;
	$HasC2 = false;
	$c1 = "";
	$c2 = "";
	if (isset($_GET['c1'])) {;
		$HasC1 = strlen($purifier->purify(($_GET['c1'])));
		$c1 = strtolower($purifier->purify($_GET['c1']));
	}
	if (isset($_GET['c1'])) {;
		$HasC2 = strlen($purifier->purify($_GET['c2']));
		$c2 = strtolower($purifier->purify($_GET['c2']));
	}
	
	$left_country = "";
	$left_Familiarity = "";
	$left_Willingness = "";
	$left_Frequency = "";
	if ($HasC1) {
		include '../country-data/'.$c1.'.php';
		$left_rank = $rank;
		$left_country = $name;
		$left_isoCode = $isoCode;
		$left_capital = $capital;
		$left_population = $population;
		$left_GDP = $GDP;
		$left_GDPperCapita = $GDPperCapita;
		$left_mobileOwnership = $mobileOwnership;
		$left_OverallIndexScore = $OverallIndexScore;
		$left_EnvironmentScore = $EnvironmentScore;
		$left_FinancialServicesScore = $FinancialServicesScore;
		$left_RegulationsScore = $RegulationsScore;
		$left_InfrastructureScore = $InfrastructureScore;
		$left_ConsumerReadinessScore = $ConsumerReadinessScore;
		$left_MobileCommerceClusterScore = $MobileCommerceClusterScore;
		$left_summary = $summary;
		$left_needToKnow = $needToKnow;
		$left_mcConclusion = $mcConclusion;
		$left_Familiarity = $Familiarity;
		$left_Willingness = $Willingness;
		$left_Frequency = $Frequency;

		$left_summary = str_ireplace("<a href='#marketforces'>", "", $left_summary);
		$left_summary = str_ireplace("<a href='#consumersentiment'>", "", $left_summary);
		$left_summary = str_ireplace("</a>", "", $left_summary);
	}
	
	$right_country = "";
	$right_Familiarity = "";
	$right_Willingness = "";
	$right_Frequency = "";
	if ($HasC2) {
		include '../country-data/'.$c2.'.php';
		$right_rank = $rank;
		$right_country = $name;
		$right_isoCode = $isoCode;
		$right_capital = $capital;
		$right_population = $population;
		$right_GDP = $GDP;
		$right_GDPperCapita = $GDPperCapita;
		$right_mobileOwnership = $mobileOwnership;
		$right_OverallIndexScore = $OverallIndexScore;
		$right_EnvironmentScore = $EnvironmentScore;
		$right_FinancialServicesScore = $FinancialServicesScore;
		$right_RegulationsScore = $RegulationsScore;
		$right_InfrastructureScore = $InfrastructureScore;
		$right_ConsumerReadinessScore = $ConsumerReadinessScore;
		$right_MobileCommerceClusterScore = $MobileCommerceClusterScore;
		$right_summary = $summary;
		$right_needToKnow = $needToKnow;
		$right_mcConclusion = $mcConclusion;
		$right_Familiarity = $Familiarity;
		$right_Willingness = $Willingness;
		$right_Frequency = $Frequency;

		$right_summary = str_ireplace("<a href='#marketforces'>", "", $right_summary);
		$right_summary = str_ireplace("<a href='#consumersentiment'>", "", $right_summary);
		$right_summary = str_ireplace("</a>", "", $right_summary);
	}
	
	include '../country-data/averages.php';
	$avg_OverallIndexScore = $OverallIndexScore;
	$avg_EnvironmentScore = $EnvironmentScore;
	$avg_FinancialServicesScore = $FinancialServicesScore;
	$avg_RegulationsScore = $RegulationsScore;
	$avg_InfrastructureScore = $InfrastructureScore;
	$avg_ConsumerReadinessScore = $ConsumerReadinessScore;
	$avg_MobileCommerceClusterScore = $MobileCommerceClusterScore;	
	
	if ($HasC1 && $HasC2) {
		$TwitterURL = urlencode("http://mobilereadiness.mastercard.com/country-comparisons/index.php?c1=".$left_isoCode."&c2=".$right_isoCode);
		$TwitterMessage = urlencode("How do ".$left_country." and ".$right_country." compare on the #MobilePayments Readiness Index from #MasterCard Insights.");

		$LinkedInURL = urlencode("http://mobilereadiness.mastercard.com/country-comparisons/index.php?c1=".$left_isoCode."&c2=".$right_isoCode);

		$FacebookURL = urlencode("http://mobilereadiness.mastercard.com/country-comparisons/index.php?c1=".$left_isoCode."&c2=".$right_isoCode);
		$FacebookMessage = urlencode("How do ".$left_country." and ".$right_country." compare on the Mobile Payments Readiness Index from MasterCard Insights.");
		
		$PinterestURL = urlencode("http://mobilereadiness.mastercard.com/country-comparisons/index.php?c1=".$left_isoCode."&c2=".$right_isoCode);
		$PinterestImage = urlencode("http://mobilereadiness.mastercard.com/img/pinterest_mpri.jpg");
		$PinterestMessage = urlencode("How do ".$left_country." and ".$right_country." compare on the Mobile Payments Readiness Index from MasterCard Insights.");
	} else {
		if ($HasC1 || $HasC2) {
			if ($HasC1) { $theCountry = $left_country; $theCode = $left_isoCode; }
			if ($HasC2) { $theCountry = $right_country; $theCode = $right_isoCode; }
			$TwitterURL = urlencode("http://mobilereadiness.mastercard.com/country?".strtolower($theCode));
			$TwitterMessage = urlencode("See how ".$theCountry." compares to the rest of the world when it comes to being prepared for #MobilePayments.");
			
			$LinkedInURL = urlencode("http://mobilereadiness.mastercard.com/country?".strtolower($theCode));

			$FacebookURL = urlencode("http://mobilereadiness.mastercard.com/country?".strtolower($theCode));
			$FacebookMessage = urlencode("See how ".$theCountry." compares to the rest of the world when it comes to being prepared for #MobilePayments.");
			
			$PinterestURL = urlencode("http://mobilereadiness.mastercard.com/country?".strtolower($theCode));
			$PinterestImage = urlencode("http://mobilereadiness.mastercard.com/img/pinterest_mpri.jpg");
			$PinterestMessage = urlencode("See how ".$theCountry." compares to the rest of the world when it comes to being prepared for #MobilePayments.");
		}
	}

?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Country Comparison | MasterCard WorldWide Insights</title>
	<meta name="description" content="See how two countries stack up in the Mobile Payments Readiness Index (MPRI) from MasterCard Insights.">
	<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/css/central.css" type="text/css" />
	<style type="text/css">
		.c50l .overall-score {background: url("/img/score-badge/<?php echo $left_rank ?>.png") no-repeat scroll 0 0 transparent;}
		.c50r .overall-score {background: url("/img/score-badge/<?php echo $right_rank ?>.png") no-repeat scroll 0 0 transparent;}
<?php 	if ($left_OverallIndexScore > $right_OverallIndexScore) { ?>
		.scoring-bg-l {background:url("img/bg-advantage-left.png") no-repeat 460px 70px;}
<?php 	} else if ($left_OverallIndexScore < $right_OverallIndexScore) { ?>
		.scoring-bg-r {background:url("img/bg-advantage-right.png") no-repeat 0 70px;}
<?php 	} ?>
<?php 	if ($left_ConsumerReadinessScore > $right_ConsumerReadinessScore) { ?>
		.consumer-readiness-bg-l {background:url("img/bg-advantage-left.png") no-repeat 460px 1px;}
<?php 	} else if ($left_ConsumerReadinessScore < $right_ConsumerReadinessScore) { ?>
		.consumer-readiness-bg-r {background:url("img/bg-advantage-right.png") no-repeat 0 1px;}
<?php 	} ?>
<?php 	if ($left_MobileCommerceClusterScore > $right_MobileCommerceClusterScore) { ?>
		.mcc-bg-l {background:url("img/bg-advantage-left.png") no-repeat 460px 1px;}
<?php 	} else if ($left_MobileCommerceClusterScore < $right_MobileCommerceClusterScore) { ?>
		.mcc-bg-r {background:url("img/bg-advantage-right.png") no-repeat 0px 1px;}
<?php 	} ?>
<?php 	if ($left_EnvironmentScore > $right_EnvironmentScore) { ?>
		.environment-bg-l {background:url("img/bg-advantage-left.png") no-repeat 460px 1px;}
<?php 	} else if ($left_EnvironmentScore < $right_EnvironmentScore) { ?>
		.environment-bg-r {background:url("img/bg-advantage-right.png") no-repeat 0px 1px;}
<?php 	} ?>
<?php 	if ($left_FinancialServicesScore > $right_FinancialServicesScore) { ?>
		.financial-bg-l {background:url("img/bg-advantage-left.png") no-repeat 460px 1px;}
<?php 	} else if ($left_FinancialServicesScore < $right_FinancialServicesScore) { ?>
		.financial-bg-r {background:url("img/bg-advantage-right.png") no-repeat 0px 1px;}
<?php 	} ?>
<?php 	if ($left_InfrastructureScore > $right_InfrastructureScore) { ?>
		.infrastructure-bg-l {background:url("img/bg-advantage-left.png") no-repeat 460px 1px;}
<?php 	} else if ($left_InfrastructureScore < $right_InfrastructureScore) { ?>
		.infrastructure-bg-r {background:url("img/bg-advantage-right.png") no-repeat 0px 1px;}
<?php 	} ?>
<?php 	if ($left_RegulationsScore > $right_RegulationsScore) { ?>
		.regulations-bg-l {background:url("img/bg-advantage-left.png") no-repeat 460px 1px;}
<?php 	} else if ($left_RegulationsScore < $right_RegulationsScore) { ?>
		.regulations-bg-r {background:url("img/bg-advantage-right.png") no-repeat 0px 1px;}
<?php 	} ?>
	</style>
    <!--[if lte IE 7]>
        <link href="/css/patches/patch_layout.css" rel="stylesheet" type="text/css" />
    <![endif]-->
	<script src="/js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body>
	<?php include('../inc/header.php') ?>

	<div class="page_margins">
        <div id="main" role="main">
			<div id="comparisons">
				<h1>Country Comparisons</h1>

				<div class="content-box">
					<h2>&nbsp;</h2>
					<form action="/country-comparisons/index.php" method="get" id="frmSelect">
					<div class="subcolumns selection">
						<div class="c50l">
							<div style="float:right;margin-right:50px;width:278px">
								<select name="c1" class="orangeSelect autoSubmit">
									<option value="">Select a Country</option>
									<option value="AR" <?php if (strtoupper($_GET['c1']) == "AR") {?> selected="selected"<?php } ?>>Argentina</option>
									<option value="AU" <?php if (strtoupper($_GET['c1']) == "AU") {?> selected="selected"<?php } ?>>Australia</option>
									<option value="BR" <?php if (strtoupper($_GET['c1']) == "BR") {?> selected="selected"<?php } ?>>Brazil</option>
									<option value="CA" <?php if (strtoupper($_GET['c1']) == "CA") {?> selected="selected"<?php } ?>>Canada</option>
									<option value="CN" <?php if (strtoupper($_GET['c1']) == "CN") {?> selected="selected"<?php } ?>>China</option>
									<option value="CO" <?php if (strtoupper($_GET['c1']) == "CO") {?> selected="selected"<?php } ?>>Colombia</option>
									<option value="EG" <?php if (strtoupper($_GET['c1']) == "EG") {?> selected="selected"<?php } ?>>Egypt</option>
									<option value="FR" <?php if (strtoupper($_GET['c1']) == "FR") {?> selected="selected"<?php } ?>>France</option>
									<option value="DE" <?php if (strtoupper($_GET['c1']) == "DE") {?> selected="selected"<?php } ?>>Germany</option>
									<option value="HK" <?php if (strtoupper($_GET['c1']) == "HK") {?> selected="selected"<?php } ?>>Hong Kong</option>
									<option value="HU" <?php if (strtoupper($_GET['c1']) == "HU") {?> selected="selected"<?php } ?>>Hungary</option>
									<option value="IN" <?php if (strtoupper($_GET['c1']) == "IN") {?> selected="selected"<?php } ?>>India</option>
									<option value="ID" <?php if (strtoupper($_GET['c1']) == "ID") {?> selected="selected"<?php } ?>>Indonesia</option>
									<option value="IT" <?php if (strtoupper($_GET['c1']) == "IT") {?> selected="selected"<?php } ?>>Italy</option>
									<option value="JP" <?php if (strtoupper($_GET['c1']) == "JP") {?> selected="selected"<?php } ?>>Japan</option>
									<option value="KE" <?php if (strtoupper($_GET['c1']) == "KE") {?> selected="selected"<?php } ?>>Kenya</option>
									<option value="MY" <?php if (strtoupper($_GET['c1']) == "MY") {?> selected="selected"<?php } ?>>Malaysia</option>
									<option value="MX" <?php if (strtoupper($_GET['c1']) == "MX") {?> selected="selected"<?php } ?>>Mexico</option>
									<option value="NZ" <?php if (strtoupper($_GET['c1']) == "NZ") {?> selected="selected"<?php } ?>>New Zealand</option>
									<option value="NG" <?php if (strtoupper($_GET['c1']) == "NG") {?> selected="selected"<?php } ?>>Nigeria</option>
									<option value="PH" <?php if (strtoupper($_GET['c1']) == "PH") {?> selected="selected"<?php } ?>>Philippines</option>
									<option value="PL" <?php if (strtoupper($_GET['c1']) == "PL") {?> selected="selected"<?php } ?>>Poland</option>
									<option value="RU" <?php if (strtoupper($_GET['c1']) == "RU") {?> selected="selected"<?php } ?>>Russia</option>
									<option value="SA" <?php if (strtoupper($_GET['c1']) == "SA") {?> selected="selected"<?php } ?>>Saudi Arabia</option>
									<option value="SG" <?php if (strtoupper($_GET['c1']) == "SG") {?> selected="selected"<?php } ?>>Singapore</option>
									<option value="ZA" <?php if (strtoupper($_GET['c1']) == "ZA") {?> selected="selected"<?php } ?>>South Africa</option>
									<option value="KR" <?php if (strtoupper($_GET['c1']) == "KR") {?> selected="selected"<?php } ?>>South Korea</option>
									<option value="TW" <?php if (strtoupper($_GET['c1']) == "TW") {?> selected="selected"<?php } ?>>Taiwan</option>
									<option value="TH" <?php if (strtoupper($_GET['c1']) == "TH") {?> selected="selected"<?php } ?>>Thailand</option>
									<option value="TR" <?php if (strtoupper($_GET['c1']) == "TR") {?> selected="selected"<?php } ?>>Turkey</option>
									<option value="AE" <?php if (strtoupper($_GET['c1']) == "AE") {?> selected="selected"<?php } ?>>UAE</option>
									<option value="GB" <?php if (strtoupper($_GET['c1']) == "GB") {?> selected="selected"<?php } ?>>United Kingdom</option>
									<option value="US" <?php if (strtoupper($_GET['c1']) == "US") {?> selected="selected"<?php } ?>>United States</option>
									<option value="VN" <?php if (strtoupper($_GET['c1']) == "VN") {?> selected="selected"<?php } ?>>Vietnam</option>
								</select>
							</div>
						</div>
						<div class="c50r">
							<div style="margin-left:38px;width:278px">
								<select name="c2" class="orangeSelect autoSubmit">
									<option value="">Select a Country</option>
									<option value="AR" <?php if (strtoupper($_GET['c2']) == "AR") {?> selected="selected"<?php } ?>>Argentina</option>
									<option value="AU" <?php if (strtoupper($_GET['c2']) == "AU") {?> selected="selected"<?php } ?>>Australia</option>
									<option value="BR" <?php if (strtoupper($_GET['c2']) == "BR") {?> selected="selected"<?php } ?>>Brazil</option>
									<option value="CA" <?php if (strtoupper($_GET['c2']) == "CA") {?> selected="selected"<?php } ?>>Canada</option>
									<option value="CN" <?php if (strtoupper($_GET['c2']) == "CN") {?> selected="selected"<?php } ?>>China</option>
									<option value="CO" <?php if (strtoupper($_GET['c2']) == "CO") {?> selected="selected"<?php } ?>>Colombia</option>
									<option value="EG" <?php if (strtoupper($_GET['c2']) == "EG") {?> selected="selected"<?php } ?>>Egypt</option>
									<option value="FR" <?php if (strtoupper($_GET['c2']) == "FR") {?> selected="selected"<?php } ?>>France</option>
									<option value="DE" <?php if (strtoupper($_GET['c2']) == "DE") {?> selected="selected"<?php } ?>>Germany</option>
									<option value="HK" <?php if (strtoupper($_GET['c2']) == "HK") {?> selected="selected"<?php } ?>>Hong Kong</option>
									<option value="HU" <?php if (strtoupper($_GET['c2']) == "HU") {?> selected="selected"<?php } ?>>Hungary</option>
									<option value="IN" <?php if (strtoupper($_GET['c2']) == "IN") {?> selected="selected"<?php } ?>>India</option>
									<option value="ID" <?php if (strtoupper($_GET['c2']) == "ID") {?> selected="selected"<?php } ?>>Indonesia</option>
									<option value="IT" <?php if (strtoupper($_GET['c2']) == "IT") {?> selected="selected"<?php } ?>>Italy</option>
									<option value="JP" <?php if (strtoupper($_GET['c2']) == "JP") {?> selected="selected"<?php } ?>>Japan</option>
									<option value="KE" <?php if (strtoupper($_GET['c2']) == "KE") {?> selected="selected"<?php } ?>>Kenya</option>
									<option value="MY" <?php if (strtoupper($_GET['c2']) == "MY") {?> selected="selected"<?php } ?>>Malaysia</option>
									<option value="MX" <?php if (strtoupper($_GET['c2']) == "MX") {?> selected="selected"<?php } ?>>Mexico</option>
									<option value="NZ" <?php if (strtoupper($_GET['c2']) == "NZ") {?> selected="selected"<?php } ?>>New Zealand</option>
									<option value="NG" <?php if (strtoupper($_GET['c2']) == "NG") {?> selected="selected"<?php } ?>>Nigeria</option>
									<option value="PH" <?php if (strtoupper($_GET['c2']) == "PH") {?> selected="selected"<?php } ?>>Philippines</option>
									<option value="PL" <?php if (strtoupper($_GET['c2']) == "PL") {?> selected="selected"<?php } ?>>Poland</option>
									<option value="RU" <?php if (strtoupper($_GET['c2']) == "RU") {?> selected="selected"<?php } ?>>Russia</option>
									<option value="SA" <?php if (strtoupper($_GET['c2']) == "SA") {?> selected="selected"<?php } ?>>Saudi Arabia</option>
									<option value="SG" <?php if (strtoupper($_GET['c2']) == "SG") {?> selected="selected"<?php } ?>>Singapore</option>
									<option value="ZA" <?php if (strtoupper($_GET['c2']) == "ZA") {?> selected="selected"<?php } ?>>South Africa</option>
									<option value="KR" <?php if (strtoupper($_GET['c2']) == "KR") {?> selected="selected"<?php } ?>>South Korea</option>
									<option value="TW" <?php if (strtoupper($_GET['c2']) == "TW") {?> selected="selected"<?php } ?>>Taiwan</option>
									<option value="TH" <?php if (strtoupper($_GET['c2']) == "TH") {?> selected="selected"<?php } ?>>Thailand</option>
									<option value="TR" <?php if (strtoupper($_GET['c2']) == "TR") {?> selected="selected"<?php } ?>>Turkey</option>
									<option value="AE" <?php if (strtoupper($_GET['c2']) == "AE") {?> selected="selected"<?php } ?>>UAE</option>
									<option value="GB" <?php if (strtoupper($_GET['c2']) == "GB") {?> selected="selected"<?php } ?>>United Kingdom</option>
									<option value="US" <?php if (strtoupper($_GET['c2']) == "US") {?> selected="selected"<?php } ?>>United States</option>
									<option value="VN" <?php if (strtoupper($_GET['c2']) == "VN") {?> selected="selected"<?php } ?>>Vietnam</option>
								</select>

							</div>
						</div>
<?php 	if (!$HasC1 && !$HasC2) { ?> 					
						<div style="height:300px"></div>
<?php 	} ?> 					
						
					</div>
					</form>
					
<?php 	if ($HasC1 || $HasC2) { ?> 					
					<h2 class="ribbon-title"><span>Quick Stats</span></h2>
					<div class="subcolumns">
						<div class="c50l">
<?php 		if ($HasC1) { ?> 					
							<div class="quick-stats">
								<ul>
									<li>
										<h3>Capital</h3>
										<h4><?php echo $left_capital ?></h4>
									</li>
									<li>
										<h3>Population</h3>
										<h4><?php echo $left_population ?></h4>
									</li>
									<li>
										<h3>GDP</h3>
										<h4><?php echo $left_GDP ?></h4>
									</li>
									<li>
										<h3>GDP per Capita</h3>
										<h4><?php echo $left_GDPperCapita ?></h4>
									</li>
									<li>
										<h3>Mobile Ownership</h3>
										<h4><?php echo $left_mobileOwnership ?></h4>
									</li>
								</ul>
								<a href="/country/?<?php echo $left_isoCode ?>"><img src="country/<?php echo $left_isoCode ?>.jpg" alt="<?php echo $left_country ?>" /></a>
							</div>
<?php 		} ?> 					
						</div>
						<div class="c50r">
<?php 		if ($HasC2) { ?> 					
							<div class="quick-stats">
								<a href="/country/?<?php echo $right_isoCode ?>"><img src="country/<?php echo $right_isoCode ?>.jpg" alt="<?php echo $right_country ?>" height="255" width="274" /></a>
								<ul>
									<li>
										<h3>Capital</h3>
										<h4><?php echo $right_capital ?></h4>
									</li>
									<li>
										<h3>Population</h3>
										<h4><?php echo $right_population ?></h4>
									</li>
									<li>
										<h3>GDP</h3>
										<h4><?php echo $right_GDP ?></h4>
									</li>
									<li>
										<h3>GDP per Capita</h3>
										<h4><?php echo $right_GDPperCapita ?></h4>
									</li>
									<li>
										<h3>Mobile Ownership</h3>
										<h4><?php echo $right_mobileOwnership ?></h4>
									</li>
								</ul>
							</div>
<?php 		} ?> 					
						</div>
					</div>
					
					<h2 class="ribbon-title"><span>Scoring</span></h2>
					<div class="subcolumns">
						<div class="c50l">
<?php 		if ($HasC1) { ?> 					
							<div class="scoring">
								<div class="floatbox scoring-bg-l">
									<div class="overall-score">
										<div><?php echo number_format($left_OverallIndexScore, 1, '.', '') ?></div>
									</div>
								</div>

								<div id="bars">
									<div class="floatbox consumer-readiness-bg-l">
										<div class="graph consumer-readiness" style="margin-top:0">
											<div class="floatbox">
												<div style="float:right;position:relative;z-index:10000">
													<div class="help"></div>
													<div class="tooltip">
														<img src="/img/tooltip-arrow.png" class="tooltip-arrow"/>
														<em>Consumer Readiness</em>
														<hr>
														Measures how familiar with, how willing to use, and how frequently consumers are currently using all three types of mobile payments.<br />
														<a href="/about/#readiness" class="btn btn-more">More</a>
													</div>
													<h3>Consumer Readiness</h3>
													<div class="bar-graph-horz">
														<div class="color left"><div class="inner"></div></div>
													</div>
												</div>
											</div>
											<div class="index-average"><div class="inner"></div></div>
										</div>
									</div>
									
									<div class="floatbox mcc-bg-l">
										<div class="graph mcc">
											<div class="floatbox">
												<div style="float:right;position:relative;z-index:9000">
													<div class="help"></div>
													<div class="tooltip">
														<img src="/img/tooltip-arrow.png" class="tooltip-arrow"/>
														<em>Mobile Commerce Clusters</em>
														<hr>
														Measures partnerships among banks, mobile networks, and governments.<br />
														<a href="/about/#mcc" class="btn btn-more">More</a>
													</div>
													<h3>Mobile Commerce Clusters</h3>
													<div class="bar-graph-horz">
														<div class="color left"><div class="inner"></div></div>
													</div>
												</div>
											</div>
											<div class="index-average">
												<div class="inner"></div>
											</div>
										</div>
									</div>

									<div class="floatbox environment-bg-l">
										<div class="graph environment">
											<div class="floatbox">
												<div style="float:right;;position:relative;z-index:8000">
													<div class="help"></div>
													<div class="tooltip">
														<img src="/img/tooltip-arrow.png" class="tooltip-arrow"/>
														<em>Environment</em>
														<hr>
														Measures economic, technological, and demographic factors within a market.<br />
														<a href="/about/#environment" class="btn btn-more">More</a>
													</div>
													<h3>Environment</h3>
													<div class="bar-graph-horz">
														<div class="color left"><div class="inner"></div></div>
													</div>
												</div>
											</div>
											<div class="index-average">
												<div class="inner"></div>
											</div>
										</div>
									</div>

									<div class="floatbox financial-bg-l">
										<div class="graph financial">
											<div class="floatbox">
												<div style="float:right;position:relative;z-index:7000">
													<div class="help"></div>
													<div class="tooltip">
														<img src="/img/tooltip-arrow.png" class="tooltip-arrow"/>
														<em>Financial Services</em>
														<hr>
														Measures the effectiveness and penetration of consumer financial products.<br />
														<a href="/about/#financial" class="btn btn-more">More</a>
													</div>
													<h3>Financial Services</h3>
													<div class="bar-graph-horz">
														<div class="color left"><div class="inner"></div></div>
													</div>
												</div>
											</div>
											<div class="index-average">
												<div class="inner"></div>
											</div>
										</div>
									</div>

									<div class="floatbox infrastructure-bg-l">
										<div class="graph infrastructure">
											<div class="floatbox">
												<div style="float:right;position:relative;z-index:6000">
													<div class="help"></div>
													<div class="tooltip">
														<img src="/img/tooltip-arrow.png" class="tooltip-arrow"/>
														<em>Infrastructure</em>
														<hr>
														Measures the sophistication and penetration of the mobile phone industry and NFC terminalization.<br />
														<a href="/about/#infrastructure" class="btn btn-more">More</a>
													</div>
													<h3>Infrastructure</h3>
													<div class="bar-graph-horz">
														<div class="color left"><div class="inner"></div></div>
													</div>
												</div>
											</div>
											<div class="index-average">
												<div class="inner"></div>
											</div>
										</div>
									</div>

									<div class="floatbox regulations-bg-l">
										<div class="graph regulations">
											<div class="floatbox">
												<div style="float:right;position:relative;z-index:5000">
													<div class="help"></div>
													<div class="tooltip">
														<img src="/img/tooltip-arrow.png" class="tooltip-arrow"/>
														<em>Regulation</em>
														<hr>
														Measures legal and regulatory structures and how they affect businesses.<br />
														<a href="/about/#regulations" class="btn btn-more">More</a>
													</div>
													<h3>Regulation</h3>
													<div class="bar-graph-horz">
														<div class="color left"><div class="inner"></div></div>
													</div>
												</div>
											</div>
											<div class="index-average">
												<div class="inner"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
<?php 		} ?> 					
						</div>
						<div class="c50r">
<?php 		if ($HasC2) { ?> 					
							<div class="scoring">
								<div class="scoring-bg-r">
									<div class="overall-score">
										<div><?php echo number_format($right_OverallIndexScore, 1, '.', '') ?></div>
									</div>
								</div>
								
								<div id="bars">
									<div class="floatbox consumer-readiness-bg-r">
										<div class="graph consumer-readiness">
											<div class="floatbox">
												<div style="float:left;position:relative;z-index:10000">
													<div class="bar-graph-horz" style="float:left">
														<div class="color right">
															<div class="inner"></div>
														</div>
													</div>
													<h3 style="display:block;float:left">Consumer Readiness</h3>
													<div class="help"></div>
													<div class="tooltip">
														<img src="/img/tooltip-arrow.png" class="tooltip-arrow"/>
														<em>Consumer Readiness</em>
														<hr>
														Measures how familiar with, how willing to use, and how frequently consumers are currently using all three types of mobile payments.<br />
														<a href="/about/#readiness" class="btn btn-more">More</a>
													</div>
												</div>
											</div>
											<div class="index-average">
												<div class="inner"></div>
											</div>
										</div>
									</div>
									
									<div class="floatbox mcc-bg-r">
										<div class="graph mcc">
											<div class="floatbox">
												<div style="float:left;position:relative;z-index:9000">
													<div class="bar-graph-horz" style="float:left">
														<div class="color right">
															<div class="inner"></div>
														</div>
													</div>
													<h3 style="display:block;float:left">Mobile Commerce Clusters</h3>
													<div class="help"></div>
													<div class="tooltip">
														<img src="/img/tooltip-arrow.png" class="tooltip-arrow"/>
														<em>Mobile Commerce Clusters</em>
														<hr>
														Measures partnerships among banks, mobile networks, and governments.<br />
														<a href="/about/#mcc" class="btn btn-more">More</a>
													</div>
												</div>
											</div>
											<div class="index-average">
												<div class="inner"></div>
											</div>
										</div>
									</div>

									<div class="floatbox environment-bg-r">
										<div class="graph environment">
											<div class="floatbox">
												<div style="float:left;position:relative;z-index:8000">
													<div class="bar-graph-horz" style="float:left">
														<div class="color right">
															<div class="inner"></div>
														</div>
													</div>
													<h3 style="display:block;float:left">Environment</h3>
													<div class="help"></div>
													<div class="tooltip">
														<img src="/img/tooltip-arrow.png" class="tooltip-arrow"/>
														<em>Environment</em>
														<hr>
														Measures economic, technological, and demographic factors within a market.<br />
														<a href="/about/#environment" class="btn btn-more">More</a>
													</div>
												</div>
											</div>
											<div class="index-average">
												<div class="inner"></div>
											</div>
										</div>
									</div>

									<div class="floatbox financial-bg-r">
										<div class="graph financial">
											<div class="floatbox">
												<div style="float:left;position:relative;z-index:7000">
													<div class="bar-graph-horz" style="float:left">
														<div class="color right">
															<div class="inner"></div>
														</div>
													</div>
													<h3 style="display:block;float:left">Financial Services</h3>
													<div class="help"></div>
													<div class="tooltip">
														<img src="/img/tooltip-arrow.png" class="tooltip-arrow"/>
														<em>Financial Services</em>
														<hr>
														Measures the effectiveness and penetration of consumer financial products.<br />
														<a href="/about/#financial" class="btn btn-more">More</a>
													</div>
												</div>											</div>
											<div class="index-average">
												<div class="inner"></div>
											</div>
										</div>
									</div>

									<div class="floatbox infrastructure-bg-r">
										<div class="graph infrastructure">
											<div class="floatbox">
												<div style="float:left;position:relative;z-index:6000">
													<div class="bar-graph-horz" style="float:left;display:relative;z-index:6000">
														<div class="color right">
															<div class="inner"></div>
														</div>
													</div>
													<h3 style="display:block;float:left">Infrastructure</h3>
													<div class="help"></div>
													<div class="tooltip">
														<img src="/img/tooltip-arrow.png" class="tooltip-arrow"/>
														<em>Infrastructure</em>
														<hr>
														Measures the sophistication and penetration of the mobile phone industry and NFC terminalization.<br />
														<a href="/about/#infrastructure" class="btn btn-more">More</a>
													</div>
												</div>
											</div>
											<div class="index-average">
												<div class="inner"></div>
											</div>
										</div>
									</div>

									<div class="floatbox regulations-bg-r">
										<div class="graph regulations">
											<div class="floatbox">
												<div style="float:left;position:relative;z-index:5000">
													<div class="bar-graph-horz" style="float:left;display:relative;z-index:5000">
														<div class="color right">
															<div class="inner"></div>
														</div>
													</div>
													<h3 style="display:block;float:left">Regulation</h3>
													<div class="help"></div>
													<div class="tooltip">
														<img src="/img/tooltip-arrow.png" class="tooltip-arrow"/>
														<em>Regulation</em>
														<hr>
														Measures legal and regulatory structures and how they affect businesses.<br />
														<a href="/about/#regulations" class="btn btn-more">More</a>
													</div>
												</div>
											</div>
											<div class="index-average">
												<div class="inner"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
<?php 		} ?> 					
						</div>
					</div>
					<div class="subcolumns">
						<div class="c50l">
							<div class="scoring">
								<div style="margin-right:20px">
									<span class="icon-gradientSquare" style="z-index:4000">Country Score</span>
								</div>
							</div>
						</div>
						<div class="c50r">
							<div class="scoring">
								<div style="margin-left:20px">
									<span class="icon-horzLine">Index Average</span>
								</div>
							</div>
						</div>
					</div>

<!-- Comment out summary section:
					<h2 class="ribbon-title"><span>Summaries</span></h2>
					<div class="subcolumns">
						<div class="c50l">
<?php 		if ($HasC1) { ?> 					
							<div class="summaries">
								<article>
									<?php echo $left_summary ?>
								</article>
							</div>
<?php 		} ?> 					
						</div>
						<div class="c50r">
<?php 		if ($HasC2) { ?> 					
							<div class="summaries">
								<article>
									<?php echo $right_summary ?>
								</article>
							</div>
<?php 		} ?> 					
						</div>
					</div>
-->					
					<h2 class="ribbon-title-wide"><span>What you need to know</span></h2>
					<div class="subcolumns">
						<div class="c50l">
<?php 		if ($HasC1) { ?> 					
							<div class="what-you-need-to-know">
								<h4><?php echo $left_country ?></h4>
								<table class="wide-bullet" style='margin:0 20px 0 30px'>
									<?php echo $left_needToKnow ?>
								</table>
							</div>
<?php 		} ?> 					
						</div>
						<div class="c50r">
<?php 		if ($HasC2) { ?> 					
							<div class="what-you-need-to-know">
								<h4><?php echo $right_country ?></h4>
								<table class="wide-bullet" style='margin:0 20px 0 30px'>
									<?php echo $right_needToKnow ?>
								</table>
							</div>
<?php 		} ?> 					
						</div>
					</div>

					<h2 class="ribbon-title-wide"><span>Consumer Sentiment</span></h2>
					<div class="consumer-sentiments floatbox">
						<div class="chart-outer">
							<span class="copyright">&copy; MasterCard</span>
							<!--<ul class="tabs">
								<li class="selected first">
									<a href="#" id="tabGlobal">Global</a>
								</li>
								<li class="last">
									<a href="#" id="tabCountry">Country</a>
								</li>
							</ul>-->

							<h2>Familiarity vs. Willingness vs. Usage</h2>
							<p>Relative to the Index average and leading countries, how do consumers feel about mobile payments?</p>
							<div id="Chart1">
								<div class="tooltip">
									<span>54% - France</span>
									<div class="arrow"></div>
								</div>
							</div>
							<div class="icons">
								<span class="country-score">Country Score</span>
								<span class="index-average">Index Average</span>
								<span class="leading-country">Leading Country</span>
							</div>
						</div>

					</div>

					<h2 class="ribbon-title-wide"><span>Mastercard Conclusion</span></h2>
					<div class="subcolumns">
						<div class="c50l">
<?php 		if ($HasC1) { ?> 					
							<div class="mastercard-conclusions">
								<article>
									<?php echo $left_mcConclusion; ?>
								</article>
							</div>
<?php 		} ?> 					
						</div>
						<div class="c50r">
<?php 		if ($HasC2) { ?> 					
							<div class="mastercard-conclusions">
								<article>
									<?php echo $right_mcConclusion; ?>
								</article>
							</div>
<?php 		} ?> 					
						</div>
					</div>
					
					<div id="options">
						<a href="/reports/process.php?c1=<?php echo $c1 ?>&c2=<?php echo $c2 ?>" class="btn btn-downloadthesereports" style="margin:0 auto">Download these Reports</a>
					</div>
					<div class="subcolumns" id="bottomoptions">
						<div class="c50l">
							<a href="/country-comparisons/" class="btn btn-newcomparison" style="float:right;margin-right:40px;">New Comparison</a>
						</div>
						<div class="c50r">
							<div class="share floatbox">
								<span>Share Page:</span>
								<div class="icons">
								<a rel="0" class="newWindow twitter" title="Twitter" href="https://twitter.com/intent/tweet?url=<?php echo $TwitterURL ?>&text=<?php echo $TwitterMessage ?>"></a>
								<a rel="0" class="newWindow linkedin" title="LinkedIn" href="http://www.linkedin.com/cws/share?url=<?php echo $LinkedInURL ?>&token=&isFramed=false&lang=en_US"></a>
								<a rel="1" class="newWindow facebook" title="Facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $FacebookURL ?>&t=<?php echo $FacebookMessage ?>"></a>
								<a rel="1" class="newWindow pinterest" title="Pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo $PinterestURL ?>&media=<?php echo $PinterestImage ?>&description=<?php echo $PinterestMessage ?>"></a>
								</div>
							</div>
						</div>
					</div>
<?php	} else { ?>
					<div style="height:50px"></div>
<?php	} ?>				
				</div>			
			</div>
			<?php include('../inc/subfooter.php') ?>
		</div>
	</div>
	<?php include('../inc/footer.php') ?>
    <script src="/js/libs/jquery.customselect.js" type="text/javascript"></script>
	<script src="/js/libs/raphael.js" type="text/javascript"></script>
	<script src="/js/mylibs/Chart.js" type="text/javascript"></script>
    <script type='text/javascript'>
		$(function () { 
			$(".country-comparisons a").addClass("active");
			
			$('.orangeSelect').customSelect();
			$('.orangeSelect').show();
			
<?php 	if ($HasC1) { ?> 					
			$(".c50l .consumer-readiness .bar-graph-horz .color").animate({width: "<?php echo $left_ConsumerReadinessScore ?>%"}, 1000); 			
			$(".c50l .mcc .bar-graph-horz .color").animate({width: "<?php echo $left_MobileCommerceClusterScore ?>%"}, 1000); 			
			$(".c50l .environment .bar-graph-horz .color").animate({width: "<?php echo $left_EnvironmentScore ?>%"}, 1000); 			
			$(".c50l .financial .bar-graph-horz .color").animate({width: "<?php echo $left_FinancialServicesScore ?>%"}, 1000); 			
			$(".c50l .infrastructure .bar-graph-horz .color").animate({width: "<?php echo $left_InfrastructureScore ?>%"}, 1000); 			
			$(".c50l .regulations .bar-graph-horz .color").animate({width: "<?php echo $left_RegulationsScore ?>%"}, 1000);
<?php 	} ?>
			
<?php 	if ($HasC2) { ?> 					
			$(".c50r .consumer-readiness .bar-graph-horz .color").animate({width: "<?php echo $right_ConsumerReadinessScore ?>%"}, 1000); 			
			$(".c50r .mcc .bar-graph-horz .color").animate({width: "<?php echo $right_MobileCommerceClusterScore ?>%"}, 1000); 			
			$(".c50r .environment .bar-graph-horz .color").animate({width: "<?php echo $right_EnvironmentScore ?>%"}, 1000); 			
			$(".c50r .financial .bar-graph-horz .color").animate({width: "<?php echo $right_FinancialServicesScore ?>%"}, 1000); 			
			$(".c50r .infrastructure .bar-graph-horz .color").animate({width: "<?php echo $right_InfrastructureScore ?>%"}, 1000); 			
			$(".c50r .regulations .bar-graph-horz .color").animate({width: "<?php echo $right_RegulationsScore ?>%"}, 1000);
<?php 	} ?>
			
<?php 	if ($HasC1 || $HasC2) { ?> 					
			$(".consumer-readiness .index-average .inner").animate({width: "<?php echo $avg_ConsumerReadinessScore ?>%"}, 1000); 			
			$(".mcc .index-average .inner").animate({width: "<?php echo $avg_MobileCommerceClusterScore ?>%"}, 1000); 			
			$(".environment .index-average .inner").animate({width: "<?php echo $avg_EnvironmentScore ?>%"}, 1000); 			
			$(".financial .index-average .inner").animate({width: "<?php echo $avg_FinancialServicesScore ?>%"}, 1000); 			
			$(".infrastructure .index-average .inner").animate({width: "<?php echo $avg_InfrastructureScore ?>%"}, 1000); 			
			$(".regulations .index-average .inner").animate({width: "<?php echo $avg_RegulationsScore ?>%"}, 1000);
<?php 	} ?>

			//Autopost the selects
			$(".autoSubmit").each(function (index) {
				$(this).change(function () {
					$('#frmSelect').submit();
				})
			});
			
			$(document).click(function() {
				$('.tooltip').hide();
			});
			$(".c50l .mcc .help").click(function (event) {
				$('.tooltip').hide();
				$('.c50l .mcc .tooltip').show(500);
				setTimeout(function() { $(".c50l .mcc .tooltip").hide(500); }, 4000);
				event.stopPropagation();
			})
			$(".c50r .mcc .help").click(function (event) {
				$('.tooltip').hide();
				$('.c50r .mcc .tooltip').show(500);
				setTimeout(function() { $(".c50r .mcc .tooltip").hide(500); }, 4000);
				event.stopPropagation();
			})
			$(".c50l .environment .help").click(function (event) {
				$('.tooltip').hide();
				$('.c50l .environment .tooltip').show(500);
				setTimeout(function() { $(".c50l .environment .tooltip").hide(500); }, 4000);
				event.stopPropagation();
			})
			$(".c50r .environment .help").click(function (event) {
				$('.tooltip').hide();
				$('.c50r .environment .tooltip').show(500);
				setTimeout(function() { $(".c50r .environment .tooltip").hide(500); }, 4000);
				event.stopPropagation();
			})
			$(".c50l .infrastructure .help").click(function (event) {
				$('.tooltip').hide();
				$('.c50l .infrastructure .tooltip').show(500);
				setTimeout(function() { $(".c50l .infrastructure .tooltip").hide(500); }, 4000);
				event.stopPropagation();
			})
			$(".c50r .infrastructure .help").click(function (event) {
				$('.tooltip').hide();
				$('.c50r .infrastructure .tooltip').show(500);
				setTimeout(function() { $(".c50r .infrastructure .tooltip").hide(500); }, 4000);
				event.stopPropagation();
			})
			$(".c50l .consumer-readiness .help").click(function (event) {
				$('.tooltip').hide();
				$('.c50l .consumer-readiness .tooltip').show(500);
				setTimeout(function() { $(".c50l .consumer-readiness .tooltip").hide(500); }, 4000);
				event.stopPropagation();
			})
			$(".c50r .consumer-readiness .help").click(function (event) {
				$('.tooltip').hide();
				$('.c50r .consumer-readiness .tooltip').show(500);
				setTimeout(function() { $(".c50r .consumer-readiness .tooltip").hide(500); }, 4000);
				event.stopPropagation();
			})
			$(".c50l .financial .help").click(function (event) {
				$('.tooltip').hide();
				$('.c50l .financial .tooltip').show(500);
				setTimeout(function() { $(".c50l .financial .tooltip").hide(500); }, 4000);
				event.stopPropagation();
			})
			$(".c50r .financial .help").click(function (event) {
				$('.tooltip').hide();
				$('.c50r .financial .tooltip').show(500);
				setTimeout(function() { $(".c50r .financial .tooltip").hide(500); }, 4000);
				event.stopPropagation();
			})
			$(".c50l .regulations .help").click(function (event) {
				$('.tooltip').hide();
				$('.c50l .regulations .tooltip').show(500);
				setTimeout(function() { $(".c50l .regulations .tooltip").hide(500); }, 4000);
				event.stopPropagation();
			})
			$(".c50r .regulations .help").click(function (event) {
				$('.tooltip').hide();
				$('.c50r .regulations .tooltip').show(500);
				setTimeout(function() { $(".c50r .regulations .tooltip").hide(500); }, 4000);
				event.stopPropagation();
			})
		});

		var data = [
			[
				'<?php echo $left_country ?>',
				// section 1
				[
					{ caption: 'Familiar', leader: <?php echo ($FamiliarityHigh * 2.7) ?>, average: <?php echo ($FamiliarityAverage * 2.7) ?>, country: <?php echo ($left_Familiarity * 2.7) ?>, leadername: '<?php echo $FamiliarityLeader ?>'},
					{ caption: 'Willing', leader: <?php echo ($WillingnessHigh * 2.7) ?>, average: <?php echo ($WillingnessAverage * 2.7) ?>, country: <?php echo ($left_Willingness * 2.7) ?>, leadername: '<?php echo $WillingnessLeader ?>'},
					{ caption: 'Using', leader: <?php echo ($FrequencyHigh * 2.7) ?>, average: <?php echo ($FrequencyAverage * 2.7) ?>, country: <?php echo ($left_Frequency * 2.7) ?>, leadername: '<?php echo $FrequencyLeader ?>'}
				],
			],
			[
				'<?php echo $right_country ?>',
				// section 1
				[
					{ caption: 'Familiar', leader: <?php echo ($FamiliarityHigh * 2.7) ?>, average: <?php echo $FamiliarityAverage * 2.7 ?>, country: <?php echo $right_Familiarity * 2.7 ?>, leadername: '<?php echo $FamiliarityLeader ?>'},
					{ caption: 'Willing', leader: <?php echo ($WillingnessHigh * 2.7) ?>, average: <?php echo $WillingnessAverage * 2.7 ?>, country: <?php echo $right_Willingness * 2.7 ?>, leadername: '<?php echo $WillingnessLeader ?>'},
					{ caption: 'Using', leader: <?php echo ($FrequencyHigh * 2.7) ?>, average: <?php echo $FrequencyAverage * 2.7 ?>, country: <?php echo $right_Frequency * 2.7 ?>, leadername: '<?php echo $FrequencyLeader ?>'}
				]
			]
		];
		
		Chart.create('Chart1', 860, 300, 50);
		Chart.setAxis(50, ['100%', '75%', '50%', '25%', '0%']);
		Chart.setData(data);


		// =====================================================================
		// ============/ tabs
		// =====================================================================

		$('#tabGlobal').click(_tabGlobalClick);
		$('#tabCountry').click(_tabCountryClick);

		function _tabGlobalClick(e) {
			$(this).parent().parent().children('li').removeClass('selected');
			$(this).parent().addClass('selected');

			Chart.clear();
			Chart.setAxis(50, ['80%', '60%', '40%', '20%', '0%']);
			Chart.setData(data);
			return false;
		}

		function _tabCountryClick(e) {
			$(this).parent().parent().children('li').removeClass('selected');
			$(this).parent().addClass('selected');

			Chart.clear();
			Chart.setAxis(50, ['100%', '75%', '50%', '25%']);
			Chart.setData(data2);
			return false;
		}

	</script>
	<?php include('../inc/ga.php') ?>
</body>
</html>

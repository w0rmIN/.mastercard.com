../the-index/index.php<?php 
        include_once '../inc/purityofessence.php';
	header('Cache-Control: no-cache, no-store');
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>The Index | MasterCard WorldWide Insights</title>
	<meta name="description" content="Mobile Payments Readiness Index (MPRI) - The MPRI is a unique in-depth multi-component view of 34 markets worldwide, gauging these markets' preparedness for mobile payments in all three varietes: mobile at point of sale (POS), mobile commerce (m-commerce), and person-to-person funds transfer (P2P).">
	<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/css/central.css" type="text/css" />
	<link rel="stylesheet" href="/css/screen/flash.css" type="text/css" />
    <!--[if lte IE 7]>
        <link href="/css/patches/patch_layout.css" rel="stylesheet" type="text/css" />
    <![endif]-->
	<script src="/js/libs/swfobject.js"></script>
	<script type='text/javascript'> 
		if (!swfobject.hasFlashPlayerVersion("7.0.0")) {
			window.location="noflash.php";
		}
	</script>
	<script src="/js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body>
	<?php include('../inc/header.php') ?>

	<div class="page_margins">
        <div id="main" role="main">
			<div id="Flash" class="loading">
				<div id="flashVideoOuter"><div id="flashVideo"></div></div>
				<script type="text/javascript">
					var attributes = {
						id: 'flashVideo',
						name: 'flashVideo'
					};
					var params = {
						wmode: 'opaque',
						allowScriptAccess: 'sameDomain',
						quality: 'high',
						bgcolor: '#000'
					};
					var flashVars = {
						baseDir: '../'
					};
					swfobject.embedSWF("/swf/globe2.swf?baseDir=../", "flashVideo", "960", "630", "9.0.0", "expressInstall.swf", flashVars, params, attributes);
				</script>

				<div id="txtConsumer" class="text-block">
					<h2>Consumer Readiness</h2>
					<p>Measures how familiar with, how willing to use, and how frequently consumers are currently using all three types of mobile payments.</p>
					<a href="#ConsumerFinding" class="btnKeyFindings">Key Findings</a>
					<a href="/about/#readiness">About this component</a>
				</div>

				<div id="txtCluster" class="text-block">
					<h2>Mobile Commerce Clusters</h2>
					<p>Measures partnerships among banks, mobile networks, and governments.</p>
					<a href="#ClusterFinding" class="btnKeyFindings">Key Findings</a>
					<a href="/about/#mcc">About this component</a>
				</div>

				<div id="txtEnvironment" class="text-block">
					<h2>Environment</h2>
					<p>Measures economic, technological, and demographic factors within a market.</p>
					<a href="#EnvironmentFinding" class="btnKeyFindings">Key Findings</a>
					<a href="/about/#environment">About this component</a>
				</div>

				<div id="txtFinancial" class="text-block">
					<h2>Financial Services</h2>
					<p>Measures the effectiveness and penetration of consumer financial products.</p>
					<a href="#FinancialFinding" class="btnKeyFindings">Key Findings</a>
					<a href="/about/#financial">About this component</a>
				</div>

				<div id="txtInfrastructure" class="text-block">
					<h2>Infrastructure</h2>
					<p>Measures the sophistication and penetration of the mobile phone industry and NFC terminalization.</p>
					<a href="#InfrastructureFinding" class="btnKeyFindings">Key Findings</a>
					<a href="/about/#infrastructure">About this component</a>
				</div>

				<div id="txtRegulations" class="text-block">
					<h2>Regulation</h2>
					<p>Measures legal and regulatory structures and how they affect businesses.</p>
					<a href="#RegulationFinding" class="btnKeyFindings">Key Findings</a>
					<a href="/about/#regulations">About this component</a>
				</div>

			<?php include('../inc/belowfold.php') ?>

			<?php include('../inc/subfooter.php') ?>
		</div>
	</div>
	</div>
	<?php include('../inc/footer.php') ?>
	<script src="/js/libs/raphael.js"></script>
	<script src="/js/mylibs/Chart.js"></script>
	<script src="/js/mylibs/Application.js"></script>
	<script src="/js/mylibs/Flash.js"></script>
    <script type='text/javascript'>
		$(function () { 
			$(".home a").addClass("active");  
		});
	</script>	
	<?php include('../inc/ga.php') ?>
</body>
</html>

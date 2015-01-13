<?php
	include 'about-data.php';
	include '../inc/purityofessence.php';
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>About | MasterCard WorldWide Insights</title>
	<meta name="description" content="The MasterCard Mobile Payments Readiness Index is a data-driven, quantitative survey of the global mobile payments landscape. It gauges the readiness for mobile payments of 34 global markets, representing approximately 85 percent of the world's household consumption expenditure.">
	<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/css/central.css" type="text/css" />
    <!--[if lte IE 7]>
        <link href="/css/patches/patch_layout.css" rel="stylesheet" type="text/css" />
    <![endif]-->
	<script src="/js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body>
	<?php include('../inc/header.php') ?>
	<div class="aboutheader"></div>
	<div class="page_margins">
        <div id="main" role="main" style="margin-top: -65px;">
			<div class="content-box">
				<h2>Summary</h2>
				<article>
					<div class="subcolumns">
						<div class="c50l">
							<div style="padding-right:40px">
								<?php echo $Summary1 ?>
							</div>
						</div>
						<div class="c50r">
							<?php echo $Summary2 ?>
						</div>
					</div>
				</article>
			</div>

			<div class="about">
				<div class="content-box">
					<h2>About the Components</h2>
					<article>
						<div class="subcolumns" id="readiness">
							<div class="c38l"><img src="img/consumer.jpg" height="326" width="345" alt="" /></div>
							<div class="c62r">
								<h3>Consumer Readiness</h3>
								<?php echo $Readiness ?>
							</div>
						</div>
						<hr />
						<div class="subcolumns" id="environment">
							<div class="c62l">
								<h3>Environment</h3>
								<?php echo $Environment ?>
							</div>
							<div class="c38r"><img src="img/environment.jpg" height="326" width="345" alt="" /></div>
						</div>
						<hr />
						<div class="subcolumns" id="financial">
							<div class="c38l"><img src="img/financial.jpg" height="326" width="345" alt="" /></div>
							<div class="c62r">
								<h3>Financial Services</h3>
								<?php echo $Financial ?>
							</div>
						</div>
						<hr />
						<div class="subcolumns" id="infrastructure">
							<div class="c62l">
								<h3>Infrastructure</h3>
								<?php echo $Infrastructure ?>
							</div>
							<div class="c38r"><img src="img/infrastructure.jpg" height="326" width="345" alt="" /></div>
						</div>
						<hr />
						<div class="subcolumns" id="mcc">
							<div class="c38l"><img src="img/mcc.jpg" height="326" width="345" alt="" /></div>
							<div class="c62r">
								<h3>Mobile Commerce Clusters</h3>
								<?php echo $MCC ?>
							</div>
						</div>
						<hr />
						<div class="subcolumns" id="regulations">
							<div class="c62l">
								<h3>Regulation</h3>
								<?php echo $Regulations ?>
							</div>
							<div class="c38r"><img src="img/regulations.jpg" height="326" width="345" alt="" /></div>
						</div>
					</article>
				</div>
			</div>
			
			<div id="data-sources" class="content-box">
				<h2>Data Sources</h2>
				<article>
					<div class="subcolumns">
						<div class="c50l">
							<div style="padding:20px">
								<ul style="color:#fff">
									<?php echo $DataSources ?>
								</ul>
							</div>
						</div>
						<div class="c50r">
							<div style="background:url(img/worldmap.png) no-repeat;height: 209px;width: 383px; margin:0 auto;"></div>
							<a href="/the-index/" class="back">Back to Index</a>
						</div>
					</div>
				</article>
			</div>
     
			<?php include('../inc/subfooter.php') ?>
		</div>
	</div>
	<?php include('../inc/footer.php') ?>
    <script type='text/javascript'>
		$(function () { $(".about a").addClass("active");  });
	</script>
	<?php include('../inc/ga.php') ?>
</body>
</html>

../country/index.php<?php 
include('../inc/chinese.php'); 
include_once '../inc/purityofessence.php';
?>
<?php

	$HasC1 = strlen($_GET['c1']);
	$c1 = strtolower($_SERVER['QUERY_STRING']);
	
	include '../country-data/averages.php';
	$avg_OverallIndexScore = $OverallIndexScore;
	$avg_EnvironmentScore = $EnvironmentScore;
	$avg_FinancialServicesScore = $FinancialServicesScore;
	$avg_RegulationsScore = $RegulationsScore;
	$avg_InfrastructureScore = $InfrastructureScore;
	$avg_ConsumerReadinessScore = $ConsumerReadinessScore;
	$avg_MobileCommerceClusterScore = $MobileCommerceClusterScore;

	include '../country-data/'.$c1.'.php';
	
	$TwitterURL = urlencode("http://mobilereadiness.mastercard.com/country?".strtolower($isoCode));
	$TwitterMessage = urlencode("See how ".$name." compares to the rest of the world when it comes to being prepared for #MobilePayments.");
	
	$LinkedInURL = urlencode("http://mobilereadiness.mastercard.com/country?".strtolower($isoCode));

	$FacebookURL = urlencode("http://mobilereadiness.mastercard.com/country?".strtolower($isoCode));
	$FacebookMessage = urlencode("See how ".$name." compares to the rest of the world when it comes to being prepared for Mobile Payments.");
	
	$PinterestURL = urlencode("http://mobilereadiness.mastercard.com/country?".strtolower($isoCode));
	$PinterestImage = urlencode("http://mobilereadiness.mastercard.com/img/pinterest_mpri.jpg");
	$PinterestMessage = urlencode("See how ".$name." compares to the rest of the world when it comes to being prepared for Mobile Payments.");
	
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo $name ?> Overall Score: <?php echo number_format($OverallIndexScore, 1, '.', '') ?> | MasterCard WorldWide Insights</title>
	<meta name="description" content="See how <?php echo $name ?> stacks up in the Mobile Payments Readiness Index (MPRI) from MasterCard Insights.">
	<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/css/central.css" type="text/css" />
    <!--[if lte IE 7]>
        <link href="/css/patches/patch_layout.css" rel="stylesheet" type="text/css" />
    <![endif]-->
	<style type="text/css">
		#country #topchart {background: url('/country/topchart/<?php echo strtolower($isoCode) ?>.png') no-repeat;}
		.overall-score {background: url("/img/score-badge/<?php echo $rank ?>.png") no-repeat scroll 0 0 transparent;}
		#topchart .overall-score {background: url("/img/score-badge-sm/<?php echo $rank ?>.png") no-repeat scroll 0 0 transparent;}
	</style>
	<script src="/js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body>
	<?php include('../inc/header.php') ?>

	<div class="page_margins">
        <div id="main" role="main">
<div id="country">
	<div style="text-align:right;">
    <a href="/the-index/" class="back"><?php echo $backToIndex ?> </a>
	</div>
    <h1><?php echo $name ?></h1>
	<div id='topchart'>			
		<div class="bars left">			
			<div class="graph first mcc">
                <div class="floatbox">
					<h3><?php echo $mobileCommerceClustersLbl ?></h3>                    
					<div class="help">?
						<div class="tooltip">
							<img src="/img/tooltip-arrow.png" class="tooltip-arrow"/>
							<em><?php echo $mobileCommerceClustersLbl ?></em>
							<hr>
							<?php echo $mobileCommerceClustersDescLbl ?><br />
							<a href="/about/#mcc" class="btn <?php echo $btnMore ?>"><?php echo $moreLbl ?></a>
						</div>
					</div>
				</div>
                <div class="bar-graph-horz">
                    <div class="color left">
                        <div class="inner"></div>
                    </div>
                </div>
                <div class="index-average">
                    <div class="inner"></div>
                </div>
			</div>
			
			<div class="graph environment">		
                <div class="floatbox">
					<h3><?php echo $environmentLbl ?></h3>                    
					<div class="help">?
						<div class="tooltip">
							<img src="/img/tooltip-arrow.png" class="tooltip-arrow"/>
							<em><?php echo $environmentLbl ?></em>
							<hr>
							<?php echo $environmentDescLbl ?><br />
							<a href="/about/#environment" class="btn <?php echo $btnMore ?>"><?php echo $moreLbl ?></a>
						</div>
					</div>
                </div>
                <div class="bar-graph-horz">
                    <div class="color left">
                        <div class="inner"></div>
                    </div>
                </div>
                <div class="index-average">
                    <div class="inner"></div>
                </div>                    
			</div>
			
			<div class="graph infrastructure">					
                <div class="floatbox">
					<h3><?php echo $infrastructureLbl ?></h3>
					<div class="help">?
						<div class="tooltip">
							<img src="/img/tooltip-arrow.png" class="tooltip-arrow"/>
							<em><?php echo $infrastructureLbl ?></em>
							<hr>
							<?php echo $infrastructureDescLbl ?><br />
							<a href="/about/#infrastructure" class="btn <?php echo $btnMore ?>"><?php echo $moreLbl ?></a>
						</div>
					</div>
                </div>
                <div class="bar-graph-horz">
                    <div class="color left">
                        <div class="inner"></div>
                    </div>
                </div>
                <div class="index-average">
                    <div class="inner"></div>
                </div>                    
			</div>
		</div>
			
		<div class="overall-score">
			<div><?php echo number_format($OverallIndexScore, 1, '.', '') ?></div>
		</div>
			
		<div class="bars right">
			<div class="graph first consumer-readiness">				
                <div class="floatbox">
					<h3><?php echo $consumerReadinessLbl ?></h3>                    
					<div class="help">?
						<div class="tooltip">
							<img src="/img/tooltip-arrow.png" class="tooltip-arrow"/>
							<em><?php echo $consumerReadinessLbl ?></em>
							<hr>
							<?php echo $consumerReadinessDescLbl ?><br />
							<a href="/about/#readiness" class="btn <?php echo $btnMore ?>"><?php echo $moreLbl ?></a>
						</div>
					</div>
                </div>
                <div class="bar-graph-horz">
                    <div class="color left">
                        <div class="inner"></div>
                    </div>
                </div>
                <div class="index-average">
                    <div class="inner"></div>
                </div>                    
			</div>
			
			<div class="graph financial">				
                <div class="floatbox">
					<h3><?php echo $financialServicesLbl ?></h3>                    
					<div class="help">?
						<div class="tooltip">
							<img src="/img/tooltip-arrow.png" class="tooltip-arrow"/>
							<em><?php echo $financialServicesLbl ?></em>
							<hr>
							<?php echo $financialServicesDescLbl ?><br />
							<a href="/about/#financial" class="btn <?php echo $btnMore ?>"><?php echo $moreLbl ?></a>
						</div>
					</div>
                </div>
                <div class="bar-graph-horz">
                    <div class="color left">
                        <div class="inner"></div>
                    </div>
                </div>
                <div class="index-average">
                    <div class="inner"></div>
                </div>                    
			</div>
			
			<div class="graph regulations">				
                <div class="floatbox">
					<h3><?php echo $regulationLbl ?></h3>                    
					<div class="help">?
						<div class="tooltip">
							<img src="/img/tooltip-arrow.png" class="tooltip-arrow"/>
							<em><?php echo $regulationLbl ?></em>
							<hr>
							<?php echo $regulationDescLbl ?><br />
							<a href="/about/#regulations" class="btn <?php echo $btnMore ?>"><?php echo $moreLbl ?></a>
						</div>
					</div>
                </div>
                <div class="bar-graph-horz">
                    <div class="color left">
                        <div class="inner"></div>
                    </div>
                </div>
                <div class="index-average">
                    <div class="inner"></div>
                </div>                    
			</div>
		</div>
		
		<div class="key"></div>
	</div>
	
	<div class="content-box" style="margin-top:0">
		<h2><?php echo $summaryLbl ?></h2>
		<article>
			<div class="subcolumns">
				<div class="c50l">
					<div class="padl">
						<?php echo $summary ?>
						<a href="/reports/process.php?c1=<?php echo $c1 ?>" class="btn <?php echo $btnDownloadReport ?>"><?php echo $downloadReport ?></a>
					</div>
				</div>
				<div class="c50r">
					<div class="what-you-need-to-know">
						<h4><?php echo $whatYouNeedToKnowLbl ?></h4>
						<table class="wide-bullet full">
							<?php echo $needToKnow ?>
						</table>
					</div>
				</div>
			</div>
		</article>
	</div>
	<div class="content-box">
		<h2><?php echo $countryOverviewLbl ?></h2>
		<article>
			<h3 id="marketforces"><?php echo $marketForcesLbl ?></h3>
			<?php echo $marketforcescopy ?>
			<hr />

			<h3 id="consumersentiment"><?php echo $consumerSentimentLbl ?></h3>
			<?php echo $consumersentimentcopy ?>
			
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

				<h2><?php echo $countrypagecharttitle ?></h2>
				<p><?php echo $countrypagechartsubtitle ?></p>
				<div id="Chart1">
					<div class="tooltip">
						<span>54% - France</span>
						<div class="arrow"></div>
					</div>
				</div>
				<div class="icons">
					<span class="country-score"><?php echo $chartCountryScoreLbl ?></span>
					<span class="index-average"><?php echo $chartIndexAverageLbl ?></span>
					<span class="leading-country"><?php echo $chartLeadingCountryLbl ?></span>
				</div>
			</div>
		</article>
	</div>
	<div class="content-box">
		<h2><?php echo $mastercardConclusionLbl ?></h2>
        <article>
			<div class="floatbox">
				<div style="float:left;width:590px;">
					<?php echo $mcConclusion ?>
				</div>
				<div style="float:right;width:320px">
					<div class="floatbox">
						<div class="overall-score" style="margin:0 auto 20px;">
							<div><?php echo number_format($OverallIndexScore, 1, '.', '') ?></div>
						</div>
					</div>
					<a href="/reports/process.php?c1=<?php echo $c1 ?>" class="btn <?php echo $btnDownloadReport ?>" style="margin:0 auto"><?php echo $downloadReport ?></a>
					<div class="share floatbox">
						<span><?php echo $sharePage ?></span>
						<div class="icons">
							<a rel="0" class="newWindow twitter" title="Twitter" href="https://twitter.com/intent/tweet?url=<?php echo $TwitterURL ?>&text=<?php echo $TwitterMessage ?>"></a>
							<a rel="0" class="newWindow linkedin" title="LinkedIn" href="http://www.linkedin.com/cws/share?url=<?php echo $LinkedInURL ?>&token=&isFramed=false&lang=en_US"></a>
							<a rel="1" class="newWindow facebook" title="Facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $FacebookURL ?>&t=<?php echo $FacebookMessage ?>"></a>
							<a rel="1" class="newWindow pinterest" title="Pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo $PinterestURL ?>&media=<?php echo $PinterestImage ?>&description=<?php echo $PinterestMessage ?>"></a>
						</div>
					</div>					
				</div>
			</div>
			<hr />
			<div class="pnlCompare">
				<div>
					<p><?php echo $wonderingHow ?> <?php echo $name ?> <?php echo $stacksAgainst ?></p>
					<a href="/country-comparisons/index.php?c1=<?php echo $c1 ?>&c2=" class="btn <?php echo $btnCompareCountries ?>" style="margin:10px auto 30px;"><?php echo $compareCountries?></a>
					<hr />
					<a href="/the-index/" class="back"><?php echo $backToIndex ?></a>
				</div>
			</div>
        </article>
    </div>
</div>
     
			<?php include('../inc/subfooter.php') ?>
		</div>
	</div>
	<?php include('../inc/footer.php') ?>
	<script src="/js/libs/raphael.js" type="text/javascript"></script>
	<script src="/js/mylibs/Chart.js" type="text/javascript"></script>
    <script type='text/javascript'>
		$(function () { 
			$(".consumer-readiness .bar-graph-horz .color").animate({width: "<?php echo $ConsumerReadinessScore ?>%"}, 1000); 			
			$(".mcc .bar-graph-horz .color").animate({width: "<?php echo $MobileCommerceClusterScore ?>%"}, 1000); 			
			$(".environment .bar-graph-horz .color").animate({width: "<?php echo $EnvironmentScore ?>%"}, 1000); 			
			$(".financial .bar-graph-horz .color").animate({width: "<?php echo $FinancialServicesScore ?>%"}, 1000); 			
			$(".infrastructure .bar-graph-horz .color").animate({width: "<?php echo $InfrastructureScore ?>%"}, 1000); 			
			$(".regulations .bar-graph-horz .color").animate({width: "<?php echo $RegulationsScore ?>%"}, 1000);
			
			$(".consumer-readiness .index-average .inner").animate({width: "<?php echo $avg_ConsumerReadinessScore ?>%"}, 1000); 			
			$(".mcc .index-average .inner").animate({width: "<?php echo $avg_MobileCommerceClusterScore ?>%"}, 1000); 			
			$(".environment .index-average .inner").animate({width: "<?php echo $avg_EnvironmentScore ?>%"}, 1000); 			
			$(".financial .index-average .inner").animate({width: "<?php echo $avg_FinancialServicesScore ?>%"}, 1000); 			
			$(".infrastructure .index-average .inner").animate({width: "<?php echo $avg_InfrastructureScore ?>%"}, 1000); 			
			$(".regulations .index-average .inner").animate({width: "<?php echo $avg_RegulationsScore ?>%"}, 1000);
			
			/*$(document).click(function() {
				$('.help .tooltip').hide();
			});
			$(".tooltip a").click(function() {
				$('.help .tooltip').hide();
			});*/
			$(".mcc .help").click(function (event) {
				$('.help .tooltip').hide();
				$('.mcc .help .tooltip').show(500);
				setTimeout(function() { $(".mcc .help .tooltip").hide(500); }, 4000);
				event.stopPropagation();
			})
			$(".environment .help").click(function (event) {
				$('.help .tooltip').hide();
				$('.environment .help .tooltip').show(500);
				setTimeout(function() { $(".environment .help .tooltip").hide(500); }, 4000);
				event.stopPropagation();
			})
			$(".infrastructure .help").click(function (event) {
				$('.help .tooltip').hide();
				$('.infrastructure .help .tooltip').show(500);
				setTimeout(function() { $(".infrastructure .help .tooltip").hide(500); }, 4000);
				event.stopPropagation();
			})
			$(".consumer-readiness .help").click(function (event) {
				$('.help .tooltip').hide();
				$('.consumer-readiness .help .tooltip').show(500);
				setTimeout(function() { $(".consumer-readiness .help .tooltip").hide(500); }, 4000);
				event.stopPropagation();
			})
			$(".financial .help").click(function (event) {
				$('.help .tooltip').hide();
				$('.financial .help .tooltip').show(500);
				setTimeout(function() { $(".financial .help .tooltip").hide(500); }, 4000);
				event.stopPropagation();
			})
			$(".regulations .help").click(function (event) {
				$('.help .tooltip').hide();
				/*$('.regulations .help .tooltip').show(500).delay(4000).hide(500);*/
				$('.regulations .help .tooltip').show(500);
				setTimeout(function() { $(".regulations .help .tooltip").hide(500); }, 4000);
				event.stopPropagation();
			})
		});

		var data = [
<?php if ($FamiliarityP2P > 0 || $FamiliarityPOS > 0 || $FamiliarityMCOMM > 0) { ?>
			[
				'<?php echo $chartFamiliarLbl ?>',
				// section 1
				[
					{ caption: '<?php echo $chartP2pLbl ?>', leader: <?php echo ($FamiliarityHighP2P * 2.7) ?>, average: <?php echo ($FamiliarityAverageP2P * 2.7) ?>, country: <?php echo ($FamiliarityP2P * 2.7) ?>, leadername: '<?php echo $FamiliarityLeaderP2P ?>'},
					{ caption: '<?php echo $chartPosLbl ?>', leader: <?php echo ($FamiliarityHighPOS * 2.7) ?>, average: <?php echo ($FamiliarityAveragePOS * 2.7) ?>, country: <?php echo ($FamiliarityPOS * 2.7) ?>, leadername: '<?php echo $FamiliarityLeaderPOS ?>'},
					{ caption: '<?php echo $chartMcommLbl ?>', leader: <?php echo ($FamiliarityHighMCOMM * 2.7) ?>, average: <?php echo ($FamiliarityAverageMCOMM * 2.7) ?>, country: <?php echo ($FamiliarityMCOMM * 2.7) ?>, leadername: '<?php echo $FamiliarityLeaderMCOMM ?>'}
				],
			]
<?php } ?>
<?php if ($WillingnessP2P > 0 || $WillingnessPOS > 0 || $WillingnessMCOMM > 0) { ?>
<?php 	if ($FamiliarityP2P > 0 || $FamiliarityPOS > 0 || $FamiliarityMCOMM > 0) { ?>,<?php } ?>
			[
				'<?php echo $chartWillingLbl ?>',
				// section 2
				[
					{ caption: '<?php echo $chartP2pLbl ?>', leader: <?php echo ($WillingnessHighP2P * 2.7) ?>, average: <?php echo ($WillingnessAverageP2P * 2.7) ?>, country: <?php echo ($WillingnessP2P * 2.7) ?>, leadername: '<?php echo $WillingnessLeaderP2P ?>'},
					{ caption: '<?php echo $chartPosLbl ?>', leader: <?php echo ($WillingnessHighPOS * 2.7) ?>, average: <?php echo ($WillingnessAveragePOS * 2.7) ?>, country: <?php echo ($WillingnessPOS * 2.7) ?>, leadername: '<?php echo $WillingnessLeaderPOS ?>'},
					{ caption: '<?php echo $chartMcommLbl ?>', leader: <?php echo ($WillingnessHighMCOMM * 2.7) ?>, average: <?php echo ($WillingnessAverageMCOMM * 2.7) ?>, country: <?php echo ($WillingnessMCOMM * 2.7) ?>, leadername: '<?php echo $WillingnessLeaderMCOMM ?>'}
				],
			]
<?php } ?>
<?php if ($FrequencyP2P > 0 || $FrequencyPOS > 0 || $FrequencyMCOMM > 0) { ?>
<?php 	if ($FamiliarityP2P > 0 || $FamiliarityPOS > 0 || $FamiliarityMCOMM > 0 || $WillingnessP2P > 0 || $WillingnessPOS > 0 || $WillingnessMCOMM > 0) { ?>,<?php } ?>
			[
				'<?php echo $chartUseringLbl ?>',
				// section 3
				[
					{ caption: '<?php echo $chartP2pLbl ?>', leader: <?php echo ($FrequencyHighP2P * 2.7) ?>, average: <?php echo ($FrequencyAverageP2P * 2.7) ?>, country: <?php echo ($FrequencyP2P * 2.7) ?>, leadername: '<?php echo $FrequencyLeaderP2P ?>'},
					{ caption: '<?php echo $chartPosLbl ?>', leader: <?php echo ($FrequencyHighPOS * 2.7) ?>, average: <?php echo ($FrequencyAveragePOS * 2.7) ?>, country: <?php echo ($FrequencyPOS * 2.7) ?>, leadername: '<?php echo $FrequencyLeaderPOS ?>'},
					{ caption: '<?php echo $chartMcommLbl ?>', leader: <?php echo ($FrequencyHighMCOMM * 2.7) ?>, average: <?php echo ($FrequencyAverageMCOMM * 2.7) ?>, country: <?php echo ($FrequencyMCOMM * 2.7) ?>, leadername: '<?php echo $FrequencyLeaderMCOMM ?>'}
				]
			]
<?php } ?>
		];

		Chart.create('Chart1', 860, 300, 50);
		Chart.setAxis(50, ['100%', '75%', '50%', '25%', '0%']);
		Chart.setData(data);
	</script>
	<?php include('../inc/ga.php') ?>
</body>
</html>

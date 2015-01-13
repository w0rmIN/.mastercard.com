<?php include('inc/chinese.php') ?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>MasterCard WorldWide Insights</title>
	<meta name="description" content="Mobile Payments Readiness Index (MPRI) - The MPRI is a unique in-depth multi-component view of 34 markets worldwide, gauging these markets' preparedness for mobile payments in all three varieties: mobile at point of sale (POS), mobile commerce (m-commerce), and person-to-person funds transfer (P2P).">
	<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/central.css" type="text/css" />
    <!--[if lte IE 7]>
        <link href="css/patches/patch_layout.css" rel="stylesheet" type="text/css" />
    <![endif]-->
	<script src="js/libs/modernizr-2.5.3.min.js" type='text/javascript'></script>
</head>
<body style="background: #000 url(/img/welcomepage-nf.jpg) no-repeat center top;min-width:10px">
	<div class="page_margins" style="width:560px">
        <div id="main" role="main" style="height:1100px">




<?php

if ($defaultBrowserLanguage == "zh-cn") { ?>


			<div style="text-align:center;color:#fff;font-size:22px;text-transform:uppercase;margin-top: 95px;">欢迎您阅读万事达卡</div>
			<div style="text-align:center;color:#fff;font-size:28px;text-transform:uppercase;margin-top:14px;">移动支付成熟度指数</div>
			
			<div style="color:#999;font-size:16px;margin:330px auto 0;width:560px;line-height:1.5em;text-align: justify;">
				<strong>万事达卡移动支付成熟度指数（MPRI）</strong> <br/>是一个独特且深入的多元化报告，评估全球34个市场在商户柜台（POS）、移动商务和个人间转账等三个方面的移动支付成熟程度。
				<div style="text-align:center;margin-top:10px;"><a href="/country/?cn"><img src="/img/btn_enter_cn.png" height="36" width="159" alt="点击进入" /></a></div>
			</div>
			

<?php
	} else { ?>

			<div style="text-align:center;color:#fff;font-size:22px;text-transform:uppercase;margin-top: 95px;">Welcome to the  MasterCard</div>
			<div style="text-align:center;color:#fff;font-size:28px;text-transform:uppercase;margin-top:14px;">Mobile Payments Readiness Index</div>

			<div style="color:#999;font-size:16px;margin:330px auto 0;width:560px;line-height:1.5em;text-align: justify;">
				<strong>The MASTERCARD MOBILE PAYMENTS READINESS INDEX (MPRI)</strong> <br/>is a unique, in-depth, multicomponent view of 34 markets worldwide, gauging these markets' preparedness for mobile payments in three varieties: mobile at point of sale (POS), mobile commerce (m-commerce), and person-to-person funds transfer (P2P).
				<div style="text-align:center;margin-top:10px;"><a href="/the-index/noflash.php"><img src="/img/btn_enter.png" height="36" width="159" alt="Enter" /></a></div>
			</div>
			
<?php  
	}
?>


			
		</div>
	</div>
	<?php include('inc/ga.php') ?>
</body>
</html>
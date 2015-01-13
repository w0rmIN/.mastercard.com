../inc/header.php<?php
	$topTwitterURL = urlencode("http://mobilereadiness.mastercard.com");
	$topTwitterMessage = urlencode("Check out which countries are ready for #mobilepayments - #MasterCard Index shows who is most prepared.");
	//Alternatives:
	//2011 was the year of #mobilepayments - check out how ready each country is for this new technology according to #MasterCard.
	//Get an in-depth view of the new #MobilePayments Readiness Index from #MasterCard Insights. <LINK>
	//Get Insights on the global #MobilePayments landscape and #mobilemoney trends from #MasterCard. <LINK>
	//Learn about #mobilemoney trends from #MasterCard Insights

	$topLinkedInURL = urlencode("http://mobilereadiness.mastercard.com");
	
	$topFacebookURL = urlencode("http://mobilereadiness.mastercard.com");
	$topFacebookMessage = urlencode("2011 was the year of mobile payments - check out how ready each country is for this new technology according to MasterCard.");
	//Message seems to be ignored - see bottom example: http://developers.facebook.com/docs/share/
	
	$topPinterestURL = urlencode("http://mobilereadiness.mastercard.com");
	$topPinterestImage = urlencode("http://mobilereadiness.mastercard.com/img/pinterest_mpri.jpg");
	$topPinterestMessage = urlencode("2011 was the year of mobile payments - check out how ready each country is for this new technology according to MasterCard.");
?>
	<header id="top">
		<div class="ie6header">
			<div class="col1">
				<div class="floatbox">
					<nav>
						<ul class="megamenu">
							<li><a href="http://www.mastercard.com/us/company/en/index.html" style="padding: 10px 0 10px;"><img src="/css/screen/img/mastercard-logo.png" alt="" /></a></li>
							<li class="home"><a href="/the-index/" style="line-height:18px;padding:20px 33px 20px 15px;">Mobile Payments<br />Readiness Index</a></li>
							<li class="about"><a href="/about/">About</a></li>
							<li class="country-comparisons"><a href="/country-comparisons/" style="line-height:18px;padding:20px 33px 20px 15px;">Country<br />Comparisons</a></li>
							<li class="reports"><a href="/reports/">Reports</a></li>
							<li class="contact-us"><a href="/contact-us/">Contact Us</a></li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="col3">
				<ul class="vertical nav2">
					<li class="insights">
						<a href="http://insights.mastercard.com/" title="MasterCard Insights"><div>MasterCard Insights</div></a>
					</li>
					<li class="share floatbox">
						<span>Share</span>
						<div class="icons">
							<a rel="0" class="newWindow twitter" title="Twitter" href="https://twitter.com/intent/tweet?url=<?php echo $topTwitterURL ?>&text=<?php echo $topTwitterMessage ?>"></a>
							<a rel="0" class="newWindow linkedin" title="LinkedIn" href="http://www.linkedin.com/cws/share?url=<?php echo $topLinkedInURL ?>&token=&isFramed=false&lang=en_US"></a>
							<a rel="1" class="newWindow facebook" title="Facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $topFacebookURL ?>&t=<?php echo $topFacebookMessage ?>"></a>
							<a rel="1" class="newWindow pinterest" title="Pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo $topPinterestURL ?>&media=<?php echo $topPinterestImage ?>&description=<?php echo $topPinterestMessage ?>"></a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</header>

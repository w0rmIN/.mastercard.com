<?php

function getDefaultLanguage() {
   if (isset($_SERVER["HTTP_ACCEPT_LANGUAGE"]))
      return parseDefaultLanguage($_SERVER["HTTP_ACCEPT_LANGUAGE"]);
   else
      return parseDefaultLanguage(NULL);
   }

function parseDefaultLanguage($http_accept, $deflang = "en") {
   if(isset($http_accept) && strlen($http_accept) > 1)  {
      # Split possible languages into array
      $x = explode(",",$http_accept);
      foreach ($x as $val) {
         #check for q-value and create associative array. No q-value means 1 by rule
         if(preg_match("/(.*);q=([0-1]{0,1}\.\d{0,4})/i",$val,$matches))
            $lang[$matches[1]] = (float)$matches[2];
         else
            $lang[$val] = 1.0;
      }

      #return default language (highest q-value)
      $qval = 0.0;
      foreach ($lang as $key => $value) {
         if ($value > $qval) {
            $qval = (float)$value;
            $deflang = $key;
         }
      }
   }
   return strtolower($deflang);
}

$defaultBrowserLanguage = getDefaultLanguage();


$mobileCommerceClustersLbl = "Mobile Commerce Clusters";
$mobileCommerceClustersDescLbl = "Measures partnerships among banks, mobile networks, and governments.";

$environmentLbl = "Environment";
$environmentDescLbl = "Measures economic, technological, and demographic factors within a market.";

$infrastructureLbl = "Infrastructure";
$infrastructureDescLbl = "Measures the sophistication and penetration of the mobile phone industry and NFC terminalization.";

$consumerReadinessLbl = "Consumer Readiness";
$consumerReadinessDescLbl = "Measures how familiar with, how willing to use, and how frequently consumers are currently using all three types of mobile payments.";

$financialServicesLbl = "Financial Services";
$financialServicesDescLbl = "Measures the effectiveness and penetration of consumer financial products.";

$regulationLbl = "Regulation";
$regulationDescLbl = "Measures legal and regulatory structures and how they affect businesses.";

$backToIndex = "Back to Index";

$btnDownloadReport = "btn-downloadreport";
$downloadReport = "Download the Report";
$btnMore = "btn-more";
$moreLbl = "More";


$btnCompareCountries = "btn-comparecountries";
$compareCountries = "Compare Countries";


$sharePage = "Share Page:";

$summaryLbl = "Summary";
$whatYouNeedToKnowLbl = "What you need to know:";
$countryOverviewLbl = "Country Overview";
$marketForcesLbl = "Market Forces";
$consumerSentimentLbl = "Consumer Sentiment";

$chartFamiliarLbl = "Familiar";
$chartWillingLbl = "Willing";
$chartUseringLbl = "Using";
$chartP2pLbl = "P2P";
$chartPosLbl = "POS";
$chartMcommLbl = "m-comm";
$chartCountryScoreLbl = "Country Score";
$chartIndexAverageLbl = "Index Average";
$chartLeadingCountryLbl = "Leading Country";

$mastercardConclusionLbl = "MasterCard Conclusion";

$wonderingHow = "Wondering how";
$stacksAgainst = "stacks up against other countries?";


?>

../reports/downloadsingle.php<?php
	$filenamePrefix = "MPRI_";
	$filenameSaved = substr($_GET["c"], 4);
	$filenameOut = $filenameSaved;
	if ($filenameSaved == "glb.pdf") {$filenameOut = $filenamePrefix."whitepaper.pdf";}
	if ($filenameSaved == "sg.pdf") {$filenameOut = $filenamePrefix."singapore.pdf";}
	if ($filenameSaved == "ca.pdf") {$filenameOut = $filenamePrefix."canada.pdf";}
	if ($filenameSaved == "us.pdf") {$filenameOut = $filenamePrefix."unitedstates.pdf";}
	if ($filenameSaved == "ke.pdf") {$filenameOut = $filenamePrefix."kenya.pdf";}
	if ($filenameSaved == "kr.pdf") {$filenameOut = $filenamePrefix."southkorea.pdf";}
	if ($filenameSaved == "jp.pdf") {$filenameOut = $filenamePrefix."japan.pdf";}
	if ($filenameSaved == "ae.pdf") {$filenameOut = $filenamePrefix."unitedarabemirates.pdf";}
	if ($filenameSaved == "gb.pdf") {$filenameOut = $filenamePrefix."unitedkingdom.pdf";}
	if ($filenameSaved == "sa.pdf") {$filenameOut = $filenamePrefix."saudiarabia.pdf";}
	if ($filenameSaved == "cn.pdf") {$filenameOut = $filenamePrefix."china.pdf";}
	if ($filenameSaved == "tw.pdf") {$filenameOut = $filenamePrefix."taiwan.pdf";}
	if ($filenameSaved == "au.pdf") {$filenameOut = $filenamePrefix."australia.pdf";}
	if ($filenameSaved == "ph.pdf") {$filenameOut = $filenamePrefix."thephilippines.pdf";}
	if ($filenameSaved == "my.pdf") {$filenameOut = $filenamePrefix."malaysia.pdf";}
	if ($filenameSaved == "hk.pdf") {$filenameOut = $filenamePrefix."hongkong.pdf";}
	if ($filenameSaved == "br.pdf") {$filenameOut = $filenamePrefix."brazil.pdf";}
	if ($filenameSaved == "nz.pdf") {$filenameOut = $filenamePrefix."newzealand.pdf";}
	if ($filenameSaved == "co.pdf") {$filenameOut = $filenamePrefix."colombia.pdf";}
	if ($filenameSaved == "th.pdf") {$filenameOut = $filenamePrefix."thailand.pdf";}
	if ($filenameSaved == "de.pdf") {$filenameOut = $filenamePrefix."germany.pdf";}
	if ($filenameSaved == "in.pdf") {$filenameOut = $filenamePrefix."india.pdf";}
	if ($filenameSaved == "ng.pdf") {$filenameOut = $filenamePrefix."nigeria.pdf";}
	if ($filenameSaved == "fr.pdf") {$filenameOut = $filenamePrefix."france.pdf";}
	if ($filenameSaved == "eg.pdf") {$filenameOut = $filenamePrefix."egypt.pdf";}
	if ($filenameSaved == "vn.pdf") {$filenameOut = $filenamePrefix."vietnam.pdf";}
	if ($filenameSaved == "za.pdf") {$filenameOut = $filenamePrefix."southafrica.pdf";}
	if ($filenameSaved == "tr.pdf") {$filenameOut = $filenamePrefix."turkey.pdf";}
	if ($filenameSaved == "ru.pdf") {$filenameOut = $filenamePrefix."russia.pdf";}
	if ($filenameSaved == "pl.pdf") {$filenameOut = $filenamePrefix."poland.pdf";}
	if ($filenameSaved == "mx.pdf") {$filenameOut = $filenamePrefix."mexico.pdf";}
	if ($filenameSaved == "hu.pdf") {$filenameOut = $filenamePrefix."hungary.pdf";}
	if ($filenameSaved == "it.pdf") {$filenameOut = $filenamePrefix."italy.pdf";}
	if ($filenameSaved == "id.pdf") {$filenameOut = $filenamePrefix."indonesia.pdf";}
	if ($filenameSaved == "ar.pdf") {$filenameOut = $filenamePrefix."argentina.pdf";}

	header('Content-disposition: attachment; filename='.$filenameOut);
	header('Content-type: application/pdf');
	echo $_GET["c"];
	readfile($_GET["c"]);
?>

..//reports/downloadzip.php<?php
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
				$file = 'pdf/'.$file.'.pdf';
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
				$zip->addFile($file, get_outfilename(substr($file, 4)));
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

	function get_outfilename($infile) {
		$filenamePrefix = "MPRI_";
		$filenameOut = $infile;
		if ($infile == "glb.pdf") {$filenameOut = $filenamePrefix."whitepaper.pdf";}
		if ($infile == "sg.pdf") {$filenameOut = $filenamePrefix."singapore.pdf";}
		if ($infile == "ca.pdf") {$filenameOut = $filenamePrefix."canada.pdf";}
		if ($infile == "us.pdf") {$filenameOut = $filenamePrefix."unitedstates.pdf";}
		if ($infile == "ke.pdf") {$filenameOut = $filenamePrefix."kenya.pdf";}
		if ($infile == "kr.pdf") {$filenameOut = $filenamePrefix."southkorea.pdf";}
		if ($infile == "jp.pdf") {$filenameOut = $filenamePrefix."japan.pdf";}
		if ($infile == "ae.pdf") {$filenameOut = $filenamePrefix."unitedarabemirates.pdf";}
		if ($infile == "gb.pdf") {$filenameOut = $filenamePrefix."unitedkingdom.pdf";}
		if ($infile == "sa.pdf") {$filenameOut = $filenamePrefix."saudiarabia.pdf";}
		if ($infile == "cn.pdf") {$filenameOut = $filenamePrefix."china.pdf";}
		if ($infile == "tw.pdf") {$filenameOut = $filenamePrefix."taiwan.pdf";}
		if ($infile == "au.pdf") {$filenameOut = $filenamePrefix."australia.pdf";}
		if ($infile == "ph.pdf") {$filenameOut = $filenamePrefix."thephilippines.pdf";}
		if ($infile == "my.pdf") {$filenameOut = $filenamePrefix."malaysia.pdf";}
		if ($infile == "hk.pdf") {$filenameOut = $filenamePrefix."hongkong.pdf";}
		if ($infile == "br.pdf") {$filenameOut = $filenamePrefix."brazil.pdf";}
		if ($infile == "nz.pdf") {$filenameOut = $filenamePrefix."newzealand.pdf";}
		if ($infile == "co.pdf") {$filenameOut = $filenamePrefix."colombia.pdf";}
		if ($infile == "th.pdf") {$filenameOut = $filenamePrefix."thailand.pdf";}
		if ($infile == "de.pdf") {$filenameOut = $filenamePrefix."germany.pdf";}
		if ($infile == "in.pdf") {$filenameOut = $filenamePrefix."india.pdf";}
		if ($infile == "ng.pdf") {$filenameOut = $filenamePrefix."nigeria.pdf";}
		if ($infile == "fr.pdf") {$filenameOut = $filenamePrefix."france.pdf";}
		if ($infile == "eg.pdf") {$filenameOut = $filenamePrefix."egypt.pdf";}
		if ($infile == "vn.pdf") {$filenameOut = $filenamePrefix."vietnam.pdf";}
		if ($infile == "za.pdf") {$filenameOut = $filenamePrefix."southafrica.pdf";}
		if ($infile == "tr.pdf") {$filenameOut = $filenamePrefix."turkey.pdf";}
		if ($infile == "ru.pdf") {$filenameOut = $filenamePrefix."russia.pdf";}
		if ($infile == "pl.pdf") {$filenameOut = $filenamePrefix."poland.pdf";}
		if ($infile == "mx.pdf") {$filenameOut = $filenamePrefix."mexico.pdf";}
		if ($infile == "hu.pdf") {$filenameOut = $filenamePrefix."hungary.pdf";}
		if ($infile == "it.pdf") {$filenameOut = $filenamePrefix."italy.pdf";}
		if ($infile == "id.pdf") {$filenameOut = $filenamePrefix."indonesia.pdf";}
		if ($infile == "ar.pdf") {$filenameOut = $filenamePrefix."argentina.pdf";}
		return $filenameOut;
	}
	
	//Get the requested files and zip them
	$files_to_zip = array();
	if (isset($_GET["c1"])) { $files_to_zip = explode ( ",", $_GET["c1"]); }
	if (count($files_to_zip) > 0) {
		$download_file = tempnam(getcwd().'/downloads', "rpt");
		$download_file = 'downloads/'.substr($download_file, strlen(getcwd())+11);
		$download_file = substr($download_file, 0, strlen($download_file)-4).".zip";
		//if true, good; if false, zip creation failed
		$result = create_zip($files_to_zip,$download_file);
	} else {
		// no files available
	}
	// Stream the file to the client 
	//$result = create_zip($files_to_zip,$download_file);

	//apache_setenv('no-gzip', '1');

	header("Content-Type: application/zip"); 
	header("Content-Length: " . filesize($download_file)); 
	header("Content-Disposition: attachment; filename=\"MasterCard_MPRI.zip\"");
	#header('Content-Disposition: attachment; filename="MasterCard_MPRI.zip"');
	header("Cache-Control: no-store, no-cache");
	readfile($download_file); 
	if (is_file($download_file)) unlink($download_file); 
?>

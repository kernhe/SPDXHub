<?php
    function upload_file($docFilePath) {
		$file = file_get_contents($docFilePath);
		match_doc($file, $docFilePath);
    }
    
    function match_doc($myString, $docFilePath){
    	include("Data_Source.php");
		$p_name = "NO ASSERTION";
		$p_file_name = "NO ASSERTION";
		$p_download_location = "NO ASSERTION";
		$p_copyright_text = "NO ASSERTION";
		$p_version = "NO ASSERTION";
		$p_description = "NO ASSERTION";
		$p_summary = "NO ASSERTION";
		$p_originator = "NO ASSERTION";
		$p_supplier = "NO ASSERTION";
		$p_license_concluded = "NO ASSERTION";
		$p_license_declared = "NO ASSERTION";
		$p_checksum = "NO ASSERTION";
		$check_algorithm = "NO ASSERTION";
		$p_home_page = "NO ASSERTION";
		$p_source_info = "NO ASSERTION";
		$p_license_comments = "NO ASSERTION";
		$p_verification_code = "NO ASSERTION";
		$p_verification_code_excluded_file = "NO ASSERTION";
		$create = "NO ASSERTION";
		$updated = "NO ASSERTION";
		
	  	$p_name = $docFilePath ?: NULL;
	  	
		if (preg_match("/<spdx:packageFileName>(.*?)<\/spdx:packageFileName>/", $myString, $matches)) {
		  	$p_file_name = $matches[0] ?: NULL;
		}	
		$p_download_location = $docFilePath ?: NULL;
		if (preg_match("/<spdx:copyrightText>(.*?)<\/spdx:copyrightText>/", $myString, $matches)) {
		  	$p_copyright_text = $matches[0] ?: NULL;
		}
		if (preg_match("/<spdx:versionInfo>(.*?)<\/spdx:versionInfo>/", $myString, $matches)) {
		  	$p_version = $matches[0] ?: NULL;
		}
		if (preg_match("/<spdx:description>(.*?)<\/spdx:description>/", $myString, $matches)) {
		  	$p_description = $matches[0] ?: NULL;
		}
		if (preg_match("/<spdx:summary>(.*?)<\/spdx:summary>/", $myString, $matches)) {
		  	$p_summary = $matches[0] ?: NULL;
		}
		if (preg_match("/<spdx:originator>(.*?)<\/spdx:originator>/", $myString, $matches)) {
		  	$p_originator = $matches[0] ?: NULL;
		}
		
		if (preg_match("/<spdx:supplier>(.*?)<\/spdx:supplier>/", $myString, $matches)) {
		  	$p_supplier = $matches[0] ?: NULL;
		}
		
		if (preg_match("/<spdx:licenseConcluded rdf:resource=\"http:\/\/spdx.org\/licenses\/(.*?)\"\/>/", $myString, $matches)) {
		  	$p_license_concluded = $matches[0] ?: NULL;
		}
		if (preg_match("/<spdx:licenseDeclared rdf:resource=\"http:\/\/spdx.org\/licenses\/(.*?)\"\/>/", $myString, $matches)) {
		  	$p_license_declared = $matches[0] ?: NULL;
		}
		if (preg_match("/<spdx:checksum rdf:nodeID=\"(.*?)\"\/>/", $myString, $matches)) {
		  	$p_checksum = $matches[0] ?: NULL;
		}
		$check_algorithm = NULL;
		if (preg_match("/<doap:homepage>(.*?)<\/doap:homepage>/", $myString, $matches)) {
		  	$p_home_page = $matches[0] ?: NULL;
		}
		$p_source_info = NULL;
		if (preg_match("/<spdx:licenseComments>(.*?)<\/spdx:licenseComments>/", $myString, $matches)) {
		  	$p_license_comments = $matches[0] ?: NULL;
		}
		if (preg_match("/<spdx:verificationCodeValue>(.*?)<\/spdx:verificationCodeValue>/", $myString, $matches)) {
		  	$p_verification_code = $matches[0] ?: NULL;
		}
		if (preg_match("/<packageVerificationCodeExcludedFile>(.*?)<\/packageVerificationCodeExcludedFile>/", $myString, $matches)) {
		  	$p_verification_code_excluded_file = $matches[0] ?: NULL;
		}
		if (preg_match("/<spdx:created>(.*?)<\/spdx:created>/", $myString, $matches)) {
		  	$create = $matches[0] ?: NULL;
		}
		$updated = NULL;
		
		
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
        
        //Query
        $sql  = "INSERT INTO `packages` (`package_name`, `package_file_name`, `package_download_location`, `package_copyright_text`, 
        		`package_version`, `package_description`, `package_summary`, `package_originator`, `package_supplier`,
				`package_license_concluded`, `package_license_declared`, `package_checksum`, `checksum_algorithm`,
				`package_home_page`, `package_source_info`, `package_license_comments`, `package_verification_code`,
				`package_verification_code_excluded_file`, `created_at`, `updated_at`) 
				VALUES ($p_name, $p_file_name, $p_download_location, $p_copyright_text, $p_version, $p_description,
				$p_summary, $p_originator, $p_supplier, $p_license_concluded, $p_license_declared, $p_checksum,
				$check_algorithm, $p_home_page, $p_source_info, $p_license_comments, $p_verification_code,
				$p_verification_code_excluded_file, $create, $updated)";
        
        //Execute Query

		if (mysql_query($sql)){
    		echo "New record created successfully";
		} else {
   		 	echo "Error: " . mysql_error();
		}
        //Close Connection
        mysql_close();
    }
    
?>

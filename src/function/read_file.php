<?php
    function upload_file($filePath, $docFile) {
		$file = file_get_contents($filePath);
		match_doc($file, $docFile, $filePath);
    }
    
    function match_doc($myString, $docFile, $filePath){
    	include("Data_Source.php");
    	//CREATOR
		$spdx_version = "";
		$data_license = "";
		$upload_file_name = "";
		$upload_content_type = "";
		$upload_file_size = "";
		$upload_updated_at = "";
		$document_comment = "";
		$created_at = "";
		$updated_at = "";
    	
    	// PACKAGE
		$p_name = "";
		$p_file_name = "";
		$p_download_location = "";
		$p_copyright_text = "";
		$p_version = "";
		$p_description = "";
		$p_summary = "";
		$p_originator = "";
		$p_supplier = "";
		$p_license_concluded = "";
		$p_license_declared = "";
		$p_checksum = "";
		$check_algorithm = "";
		$p_home_page = "";
		$p_source_info = "";
		$p_license_comments = "";
		$p_verification_code = "";
		$p_verification_code_excluded_file = "";
		$create = "";
		$updated = "";
		
		// CREATOR PARSE
		if (preg_match("/<spdx:specVersion>(?P<name>.*?)<\/spdx:specVersion>/", $myString, $matches)) {
		  	$spdx_version = $matches[1] ?: NULL;
		}	
		if (preg_match("/<spdx:dataLicense rdf:resource=\"http:\/\/spdx.org\/licenses\/(?P<name>.*?)\"\/>/", $myString, $matches)) {
		  	$data_license = $matches[1] ?: NULL;
		}	
		$upload_file_name = $docFile ?: NULL;
		if (preg_match("/<spdx:specVersion>(?P<name>.*?)<\/spdx:specVersion>/", $myString, $matches)) {
		  	$spdx_version = $matches[1] ?: NULL;
		}	
		if (preg_match("/\.(?P<name>.*)/", $docFile, $matches)) {
		  	$upload_content_type = $matches[1] ?: NULL;
		}	
		$upload_file_size = filesize($filePath);
		$upload_updated_at = NULL;
		$document_comment = NULL;
		if (preg_match("/<spdx:created>(?P<name>.*?)<\/spdx:created>/", $myString, $matches)) {
		  	$created_at = $matches[1] ?: NULL;
		}
		$updated_at = NULL;
				
		// PACKAGE PARSE
	  	$p_name = $docFile ?: NULL;
		if (preg_match("/<spdx:packageFileName>(?P<name>.*?)<\/spdx:packageFileName>/", $myString, $matches)) {
		  	$p_file_name = $matches[1] ?: NULL;
		}	
		$p_download_location = $filePath ?: NULL;
		if (preg_match("/<spdx:copyrightText>(?P<name>.*?)<\/spdx:copyrightText>/", $myString, $matches)) {
		  	$p_copyright_text = $matches[1] ?: NULL;
		}
		if (preg_match("/<spdx:versionInfo>(?P<name>.*?)<\/spdx:versionInfo>/", $myString, $matches)) {
		  	$p_version = $matches[1] ?: NULL;
		}
		if (preg_match("/<spdx:description>(?P<name>.*?)<\/spdx:description>/", $myString, $matches)) {
		  	$p_description = $matches[1] ?: NULL;
		}
		if (preg_match("/<spdx:summary>(?P<name>.*?)<\/spdx:summary>/", $myString, $matches)) {
		  	$p_summary = $matches[1] ?: NULL;
		}
		if (preg_match("/<spdx:originator>(?P<name>.*?)<\/spdx:originator>/", $myString, $matches)) {
		  	$p_originator = $matches[1] ?: NULL;
		}	
		if (preg_match("/<spdx:supplier>(?P<name>.*?)<\/spdx:supplier>/", $myString, $matches)) {
		  	$p_supplier = $matches[1] ?: NULL;
		}
		if (preg_match("/<spdx:licenseConcluded rdf:resource=\"http:\/\/spdx.org\/licenses\/(?P<name>.*?)\"\/>/", $myString, $matches)) {
		  	$p_license_concluded = $matches[1] ?: NULL;
		}
		if (preg_match("/<spdx:licenseDeclared rdf:resource=\"http:\/\/spdx.org\/licenses\/(?P<name>.*?)\"\/>/", $myString, $matches)) {
		  	$p_license_declared = $matches[1] ?: NULL;
		}
		if (preg_match("/<spdx:checksum rdf:nodeID=\"(?P<name>.*?)\"\/>/", $myString, $matches)) {
		  	$p_checksum = $matches[1] ?: NULL;
		}
		$check_algorithm = NULL;
		if (preg_match("/<doap:homepage>(?P<name>.*?)<\/doap:homepage>/", $myString, $matches)) {
		  	$p_home_page = $matches[1] ?: NULL;
		}
		$p_source_info = NULL;
		if (preg_match("/<spdx:licenseComments>(?P<name>.*?)<\/spdx:licenseComments>/", $myString, $matches)) {
		  	$p_license_comments = $matches[1] ?: NULL;
		}
		if (preg_match("/<spdx:verificationCodeValue>(?P<name>.*?)<\/spdx:verificationCodeValue>/", $myString, $matches)) {
		  	$p_verification_code = $matches[1] ?: NULL;
		}
		if (preg_match("/<packageVerificationCodeExcludedFile>(?P<name>.*?)<\/packageVerificationCodeExcludedFile>/", $myString, $matches)) {
		  	$p_verification_code_excluded_file = $matches[1] ?: NULL;
		}
		if (preg_match("/<spdx:created>(?P<name>.*?)<\/spdx:created>/", $myString, $matches)) {
		  	$create = $matches[1] ?: NULL;
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
				VALUES ('$p_name', '$p_file_name', '$p_download_location', '$p_copyright_text', '$p_version', '$p_description',
				'$p_summary', '$p_originator', '$p_supplier', '$p_license_concluded', '$p_license_declared', '$p_checksum',
				'$check_algorithm', '$p_home_page', '$p_source_info', '$p_license_comments', '$p_verification_code',
				'$p_verification_code_excluded_file', '$create', '$updated')";
        
        //Execute Query

		if (mysql_query($sql)){
    		echo "New record created successfully";
		} else {
   		 	echo "Error: " . mysql_error();
		}
		
        //Query
        $sql  = "INSERT INTO `spdx_docs` (`spdx_version`, `data_license`, `upload_file_name`, `upload_content_type`,
				`upload_file_size`, `upload_updated_at`, `document_comment`, `created_at`, `updated_at`) 
				VALUES('$spdx_version', '$data_license', '$upload_file_name', '$upload_content_type', '$upload_file_size',
				'$upload_updated_at', '$document_comment', '$created_at', '$updated_at')";
        
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

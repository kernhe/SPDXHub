<?php
    function getPackage($myFile, $docFile, $filePath){
    	// PACKAGE
    	$myString = "";
    	if (preg_match('/' . "<spdx:Package(?P<name>.*?)<\/spdx:Package>" . '/', $myFile, $matches)) {
			$myString = $matches[1] ?: NULL;
		}		
		
    	$packageArray = array(
			$p_name = $docFile ?: NULL,
			$p_file_name = $docFile ?: NULL,
			$p_download_location = $filePath ?: NULL,
			$p_copyright_text = "",
			$p_version = "",
			$p_description = "",
			$p_summary = "",
			$p_originator = "",
			$p_supplier = "",
			$p_license_concluded = "",
			$p_license_declared = "",
			$p_checksum = "",
			$check_algorithm = "",
			$p_home_page = "",
			$p_source_info = "",
			$p_license_comments = "",
			$p_verification_code = "",
			$p_verification_code_excluded_file = "",
			$create = "",
			$updated = "",
		);
		
		$rdf_regex = array(
			$p_name = NULL,
			$p_file_name = "<spdx:packageFileName>(?P<name>.*?)<\/spdx:packageFileName>",
			$p_download_location = NULL,
			$p_copyright_text = "<spdx:copyrightText>(?P<name>.*?)<\/spdx:copyrightText>",
			$p_version = "<spdx:versionInfo>(?P<name>.*?)<\/spdx:versionInfo>",
			$p_description = "<spdx:description>(?P<name>.*?)<\/spdx:description>",
			$p_summary = "<spdx:summary>(?P<name>.*?)<\/spdx:summary>",
			$p_originator = "<spdx:originator>(?P<name>.*?)<\/spdx:originator>",
			$p_supplier = "<spdx:supplier>(?P<name>.*?)<\/spdx:supplier>",
			$p_license_concluded = "<spdx:licenseConcluded rdf:resource=\"http:\/\/spdx.org\/licenses\/(?P<name>.*?)\"\/>",
			$p_license_declared = "<spdx:licenseDeclared rdf:resource=\"http:\/\/spdx.org\/licenses\/(?P<name>.*?)\"\/>",
			$p_checksum = "<spdx:checksum rdf:nodeID=\"(?P<name>.*?)\"\/>",
			$check_algorithm = NULL,
			$p_home_page = "<doap:homepage>(?P<name>.*?)<\/doap:homepage>",
			$p_source_info = NULL,
			$p_license_comments = "<spdx:licenseComments>(?P<name>.*?)<\/spdx:licenseComments>",
			$p_verification_code = "<spdx:verificationCodeValue>(?P<name>.*?)<\/spdx:verificationCodeValue>",
			$p_verification_code_excluded_file = "<packageVerificationCodeExcludedFile>(?P<name>.*?)<\/packageVerificationCodeExcludedFile>",
			$created = "<spdx:created>(?P<name>.*?)<\/spdx:created>",
			$updated = NULL,
		);
		
		$regex = array(
			'rdf' => $rdf_regex,
		);

    	for($x = 0; $x < sizeof($regex['rdf']); $x++){ 
    		if ($regex['rdf'][$x] == NULL){
    			continue;
    		}
    		if (preg_match('/' . $regex['rdf'][$x] . '/', $myString, $matches)) {
		  		$packageArray[$x] = $matches[1] ?: NULL;
			}
		}
		
		$query 	= 	"INSERT INTO `packages` (`package_name`, `package_file_name`, `package_download_location`, `package_copyright_text`, 
	        		`package_version`, `package_description`, `package_summary`, `package_originator`, `package_supplier`,
					`package_license_concluded`, `package_license_declared`, `package_checksum`, `checksum_algorithm`,
					`package_home_page`, `package_source_info`, `package_license_comments`, `package_verification_code`,
					`package_verification_code_excluded_file`, `created_at`, `updated_at`) 
					VALUES ('$packageArray[0]', '$packageArray[1]', '$packageArray[2]', '$packageArray[3]', '$packageArray[4]', '$packageArray[5]',
					'$packageArray[6]', '$packageArray[7]', '$packageArray[8]', '$packageArray[9]', '$packageArray[10]', '$packageArray[11]',
					'$packageArray[12]', '$packageArray[13]', '$packageArray[14]', '$packageArray[15]', '$packageArray[16]',
					'$packageArray[17]', '$packageArray[18]', '$packageArray[19]')";
					
		return $query;
    }
    
?>

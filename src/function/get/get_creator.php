<?php
	function getCreator($myString, $docFile, $filePath, $ID){
    	// CREATOR
		$c_generated_at = "";
		$c_creator_comments= "";
		$c_license_list_version = "";
		$c_spdx_doc_id = "";
		$c_creator = "";
		$c_created_at = "";
		$c_updated_at = "";
    	
		$rdf_regex = array(
			'list_ver' => "<spdx:licenseListVersion>(?P<name>.*?)<\/spdx:licenseListVersion>",
			'creator' => "<spdx:creator>Organization: (?P<name>.*?)<\/spdx:creator>",
			'created' => "<spdx:created>(?P<name>.*?)<\/spdx:created>",
		);
		
		$regex = array(
			'rdf' => $rdf_regex,
		);
    	
		// CREATOR
		$c_generated_at = NULL;
		$c_creator_comments= NULL;
		if (preg_match('/' . $regex['rdf']['list_ver'] . '/', $myString, $matches)) {
		  	$c_license_list_version = $matches[1] ?: NULL;
		}
		$c_spdx_doc_id = $ID;
		if (preg_match('/' . $regex['rdf']['creator'] . '/', $myString, $matches)) {
		  	$c_creator = $matches[1] ?: NULL;
		}
		if (preg_match('/' . $regex['rdf']['created'] . '/', $myString, $matches)) {
		  	$c_created_at = $matches[1] ?: NULL;
		}
		$c_updated_at = NULL;
		
		
        $query	= 	"INSERT INTO `creators` (`generated_at`, `creator_comments`, `license_list_version`, `spdx_doc_id`,  `creator`,
					`created_at`, `updated_at`) 
					VALUES('$c_generated_at', '$c_creator_comments', '$c_license_list_version', '$c_spdx_doc_id', '$c_creator',
					'$c_created_at', '$c_updated_at')";
					
		return $query;
        
    }
    
?>

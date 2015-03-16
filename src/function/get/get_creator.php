<?php
	function getCreator($myFile, $docFile, $filePath, $ID){
    	// CREATOR
    	$myString = "";
    	if (preg_match('/' . "<spdx:CreationInfo>(?P<name>.*?)<\/spdx:CreationInfo>" . '/', $myFile, $matches)) {
			$myString = $matches[1] ?: NULL;
		}

    	$creatorArray = array(
			$c_generated_at = "",
			$c_creator_comments= "",
			$c_license_list_version = "",
			$c_spdx_doc_id = $ID,
			$c_creator = "",
			$c_created_at = "",
			$c_updated_at = "",
		);
		
		$rdf_regex = array(
			$generated_at = NULL,
			$creator_comments = NULL,
			$license_list_version = "<spdx:licenseListVersion>(?P<name>.*?)<\/spdx:licenseListVersion>",
			$spdx_doc_id = NULL,
			$creator = "<spdx:creator>Organization: (?P<name>.*?)<\/spdx:creator>",
			$created_at = "<spdx:created>(?P<name>.*?)<\/spdx:created>",
			$updated_at = NULL,
		);
		
		$regex = array(
			'rdf' => $rdf_regex,
		);
    	
    	for($x = 0; $x < sizeof($regex['rdf']); $x++){ 
    		if ($regex['rdf'][$x] == NULL){
    			continue;
    		}
    		if (preg_match('/' . $regex['rdf'][$x] . '/', $myString, $matches)) {
		  		$creatorArray[$x] = $matches[1] ?: NULL;
			}
		}
		
        $query	= 	"INSERT INTO `creators` (`generated_at`, `creator_comments`, `license_list_version`, `spdx_doc_id`,  `creator`,
					`created_at`, `updated_at`) 
					VALUES('$creatorArray[0]', '$creatorArray[1]', '$creatorArray[2]', '$creatorArray[3]', '$creatorArray[4]',
					'$creatorArray[5]', '$creatorArray[6]')";
					
		return $query;
        
    }
    
?>

<?php
	function getCreator($myFile, $docFile, $filePath, $ID){
    	// CREATOR
    	if (preg_match('/' . "(?P<name><CreationInfo>.*<\/CreationInfo>)" . '/s', $myFile, $matches)) {
			$myString = $matches[1] ?: NULL;
		}	

    	$creatorArray = array(
    		$license_list_version = "",
			$creator = "",
			$creator_optional1 = "",
			$creator_optional2 = "",
			$created_date = "",
			$creator_comment = "",
		);
		
		$rdf_regex = array(
			$license_list_version = "<licenseListVersion>(?P<name>.*?)<\/licenseListVersion> ",
			$creator = "<creator>(?P<name>.*?)<\/creator>",
			$creator_optional1 = "<creator>(?P<name>.*?)<\/creator>",
			$creator_optional2 = "<creator>(?P<name>.*?)<\/creator>",
			$created_date = "<created>(?P<name>.*?)<\/created>",
			$creator_comment = "<rdfs:comment>(?P<name>.*?)<\/rdfs:comment>",
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
		
        $query	=	"UPDATE `spdx_file` 
        			SET `license_list_version` = '$creatorArray[0]', `creator` = '$creatorArray[1]', 
        			`creator_optional1` = '$creatorArray[2]', `creator_optional2` = '$creatorArray[3]', 
        			`created_date` = '$creatorArray[4]', `creator_comment` = '$creatorArray[5]'
					WHERE `spdx_pk` = " . $ID;
					
		return $query;
        
    }
    
?>

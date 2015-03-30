<?php
    function getSPDX($myFile, $docFile, $filePath){
    	//SPDX DOC
    	$myString = $myFile;
    	
    	$spdxArray = array (
			$version = "",
			$data_license = "",
			$document_name = "",
			$document_namespace = "",
			$external_dic_ref = "",
			$license_list_version = "",
			$document_comment = "",
			$creator = "",
			$creator_optional1 = "",
			$creator_optional2 = "",
			$created_date = "",
			$creator_comment = "",
		);
    	
		$rdf_regex = array(
			$version = "<spdx:specVersion>(?P<name>.*?)<\/spdx:specVersion>",
			$data_license = "<spdx:dataLicense rdf:resource=\"http:\/\/spdx.org\/licenses\/(?P<name>.*?)\"\/>",
			$document_name = "\.(?P<name>.*)",
			$document_namespace = NULL,
			$external_dic_ref = NULL,
			$license_list_version = NULL,
			$document_comment = NULL,
			$creator = NULL,
			$creator_optional1 = NULL,
			$creator_optional2 = NULL,
			$created_date = "<spdx:created>(?P<name>.*?)<\/spdx:created>",
			$creator_comment = NULL,
		);
		
		$regex = array(
			'rdf' => $rdf_regex,
		);	
		
    	for($x = 0; $x < sizeof($regex['rdf']); $x++){ 
    		if ($regex['rdf'][$x] == NULL){
    			continue;
    		}
    		if (preg_match('/' . $regex['rdf'][$x] . '/', $myString, $matches)) {
		  		$spdxArray[$x] = $matches[1] ?: NULL;
			}
		}
		
        $query	=	"INSERT INTO `spdx_file` (`version`, `data_license`, `document_name`, `document_namespace`,
					`external_dic_ref`, `license_list_version`, `document_comment`, `creator`, `creator_optional1`,
					`creator_optional2`, `created_date`, `creator_comment`) 
					VALUES('$spdxArray[0]', '$spdxArray[1]', '$spdxArray[2]', '$spdxArray[3]', '$spdxArray[4]',
					'$spdxArray[5]', '$spdxArray[6]', '$spdxArray[7]', '$spdxArray[8]', '$spdxArray[9]', '$spdxArray[10]',
					'$spdxArray[11]')";
					
		return $query;
        
    }
    
?>

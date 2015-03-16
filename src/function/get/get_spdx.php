<?php
    function getSPDX($myFile, $docFile, $filePath){
    	//SPDX DOC
    	$myString = $myFile;
    	
    	$spdxArray = array (
			$spdx_version = "",
			$data_license = "",
			$upload_file_name = $docFile ?: NULL,
			$upload_content_type = "",
			$upload_file_size = filesize($filePath),
			$upload_updated_at = "",
			$document_comment = "",
			$created_at = "",
			$updated_at = "",
		);
    	
		$rdf_regex = array(
			$spdx_version = "<spdx:specVersion>(?P<name>.*?)<\/spdx:specVersion>",
			$data_license = "<spdx:dataLicense rdf:resource=\"http:\/\/spdx.org\/licenses\/(?P<name>.*?)\"\/>",
			$upload_file_name = NULL,
			$upload_content_type = "\.(?P<name>.*)",
			$upload_file_size = NULL,
			$upload_updated_at = NULL,
			$document_comment = NULL,
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
		  		$spdxArray[$x] = $matches[1] ?: NULL;
			}
		}
		
			

        $query	=	"INSERT INTO `spdx_docs` (`spdx_version`, `data_license`, `upload_file_name`, `upload_content_type`,
					`upload_file_size`, `upload_updated_at`, `document_comment`, `created_at`, `updated_at`) 
					VALUES('$spdxArray[0]', '$spdxArray[1]', '$spdxArray[2]', '$spdxArray[3]', '$spdxArray[4]',
					'$spdxArray[5]', '$spdxArray[6]', '$spdxArray[7]', '$spdxArray[8]')";
					
		return $query;
        
    }
    
?>

<?php
    function getSPDX($myString, $docFile, $filePath){
    	//SPDX DOC
		$spdx_version = "";
		$data_license = "";
		$upload_file_name = "";
		$upload_content_type = "";
		$upload_file_size = "";
		$upload_updated_at = "";
		$document_comment = "";
		$created_at = "";
		$updated_at = "";
    	
		$rdf_regex = array(
			'spec_ver' => "<spdx:specVersion>(?P<name>.*?)<\/spdx:specVersion>",
			'data_lic' => "<spdx:dataLicense rdf:resource=\"http:\/\/spdx.org\/licenses\/(?P<name>.*?)\"\/>",
			'type' => "\.(?P<name>.*)",
			'created' => "<spdx:created>(?P<name>.*?)<\/spdx:created>",
		);
		
		$regex = array(
			'rdf' => $rdf_regex,
		);	
		
		// SPDX DOC PARSE
		if (preg_match('/' . $regex['rdf']['spec_ver'] . '/', $myString, $matches)) {
		  	$spdx_version = $matches[1] ?: NULL;
		}	
		if (preg_match('/' . $regex['rdf']['data_lic'] . '/', $myString, $matches)) {
		  	$data_license = $matches[1] ?: NULL;
		}	
		$upload_file_name = $docFile ?: NULL;
		if (preg_match('/' . $regex['rdf']['type'] . '/', $docFile, $matches)) {
		  	$upload_content_type = $matches[1] ?: NULL;
		}	
		$upload_file_size = filesize($filePath);
		$upload_updated_at = NULL;
		$document_comment = NULL;
		if (preg_match('/' . $regex['rdf']['created'] . '/', $myString, $matches)) {
		  	$created_at = $matches[1] ?: NULL;
		}
		$updated_at = NULL;
			

        $query	=	"INSERT INTO `spdx_docs` (`spdx_version`, `data_license`, `upload_file_name`, `upload_content_type`,
					`upload_file_size`, `upload_updated_at`, `document_comment`, `created_at`, `updated_at`) 
					VALUES('$spdx_version', '$data_license', '$upload_file_name', '$upload_content_type', '$upload_file_size',
					'$upload_updated_at', '$document_comment', '$created_at', '$updated_at')";
					
		return $query;
        
    }
    
?>

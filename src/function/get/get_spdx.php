<?php
    function getSPDX($myFile, $docFile, $fileType){
		
    	if (preg_match('/' . "(?P<name><spdx:SpdxDocument.*<\/spdx:SpdxDocument>)" . '/s', $myFile, $matches)) {
			$myString = $matches[1] ?: NULL;
		}
		else{
			return NULL;
		}

    	$spdxArray = array (
    		$spdx_id = "",
			$version = "",
			$data_license = "",
			$document_name = "",
			$document_namespace = "",
			$external_dic_ref = "",
			$document_comment = "",
		);
    	
		$rdf_regex = array(
			$spdx_id = "<spdx:SpdxDocument.*?ID=\"(?P<name>.*?)\".*>",
			$version = "<spdx:specVersion>(?P<name>.*?)<\/spdx:specVersion>",
			$data_license = "<spdx:dataLicense rdf:resource=\"http:\/\/spdx.org\/licenses\/(?P<name>.*?)\"\/>",
			$document_name = NULL,
			$document_namespace = "<spdx:SpdxDocument.*?about=\"(?P<name>.*?)\".*>",
			$external_dic_ref = NULL,
			$document_comment = NULL, #"<rdfs:comment>(?P<name>.*?)<\/rdfs:comment>",
		);
		
		$tag_regex = array(
			$spdx_id = "SPDXID:(?P<name>.*?)\n",
			$version = "SPDXVersion:(?P<name>.*?)\n",
			$data_license = "DataLicense:(?P<name>.*?)\n",
			$document_name = NULL,
			$document_namespace = "DocumentID:(?P<name>.*?)\n",
			$external_dic_ref = NULL,
			$document_comment = "DocumentComment:.*<text>(?P<name>.*?)<\/text>",
		);
		
		$regex = array(
			'rdf' => $rdf_regex,
			'tag' => $tag_regex,
		);	
		
		if (preg_match('/' . "(?P<name>.*?)\..*$" . '/', $docFile, $matches)) {
			$spdxArray[3] = $matches[1] ?: NULL;
		}
		
    	for($x = 0; $x < sizeof($regex[$fileType]); $x++){ 
    		if ($regex['rdf'][$x] == NULL){
    			continue;
    		}
    		if (preg_match('/' . $regex[$fileType][$x] . '/', $myString, $matches)) {
		  		$spdxArray[$x] = $matches[1] ?: NULL;
			}
		}

        $query	=	"INSERT INTO `spdx_file` (`spdx_id`, `version`, `data_license`, `document_name`, `document_namespace`,
					`external_dic_ref`, `document_comment`) 
					VALUES('$spdxArray[0]', '$spdxArray[1]', '$spdxArray[2]', '$spdxArray[3]', '$spdxArray[4]',
					'$spdxArray[5]', '$spdxArray[6]')";
					
		return $query;
        
    }
    
?>

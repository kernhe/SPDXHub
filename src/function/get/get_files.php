<?php
    function getFiles($myFile, $docFile, $docID, $packageID){	
		//FILES
    	$myString = "";
    	if (preg_match('/' . "(?P<name><spdx:referencesFile.*<\/spdx:referencesFile>)" . '/s', $myFile, $matches)) {
			$myString = $matches[1] ?: NULL;
		}		

		$fileArray = array(
			$filename = "",
			$filetype = "",
			$checksum = "",
			$license_concluded = "",
			$license_info_in_file = "",
			$license_comment = "",
			$file_copyright_text = "",
			$artifact_of_project = "",
			$artifact_of_homepage = "",
			$artifact_of_url = "",
			$file_comment = "",
			$file_notice = "",
			$file_contributor = "",
			$package_info_fk = $packageID,
			$spdx_fk = $docID,
		);
		
		$rdf_regex = array(
			$filename = "<spdx:fileName>(?P<name>.*?)<\/spdx:fileName>",
			$filetype = "<spdx:fileType rdf:resource=\"http:\/\/spdx.org\/rdf\/terms(?P<name>.*?)\"\/>",
			$checksum = "<spdx:checksumValue>(?P<name>.*?)<\/spdx:checksumValue>",
			$license_concluded = "<spdx:licenseConcluded rdf:resource=\"http:\/\/spdx.org\/licenses\/(?P<name>.*?)\"\/>",
			$license_info_in_file = "<spdx:licenseInfoInFile rdf:resource=\"http:\/\/spdx.org\/licenses\/(?P<name>.*?)\"\/>",
			$license_comment = "<spdx:licenseComments>(?P<name>.*?)<\/spdx:licenseComments>",
			$file_copyright_text = "<spdx:copyrightText>(?P<name>.*?)<\/spdx:copyrightText>",
			$artifact_of_project = NULL,
			$artifact_of_homepage = NULL,
			$artifact_of_url = NULL,
			$file_comment = NULL,
			$file_notice = NULL,
			$file_contributor = NULL,	
			$package_info_fk = NULL,
			$spdx_fk = NULL,
		);
		
		$regex = array(
			'rdf' => $rdf_regex,
		);

    	for($x = 0; $x < sizeof($regex['rdf']); $x++){ 
    		if ($regex['rdf'][$x] == NULL){
    			continue;
    		}
    		if (preg_match('/' . $regex['rdf'][$x] . '/', $myString, $matches)) {
		  		$fileArray[$x] = $matches[1] ?: NULL;
			}
		}
		
        $query	= 	"INSERT INTO `spdx_file_info` (`filename`,`filetype`,`checksum`,`license_concluded`,
	        		`license_info_in_file`,`license_comment`,`file_copyright_text`,`artifact_of_project`,`artifact_of_homepage`,
	        		`artifact_of_url`,`file_comment`,`file_notice`,`file_contributor`,`package_info_fk`,`spdx_fk`) 
	        		VALUES ('$fileArray[0]', '$fileArray[1]', '$fileArray[2]', '$fileArray[3]', '$fileArray[4]',
					'$fileArray[5]', '$fileArray[6]', '$fileArray[7]', '$fileArray[8]', '$fileArray[9]',
					'$fileArray[10]', '$fileArray[11]', '$fileArray[12]', '$fileArray[13]', '$fileArray[14]')";
					
		return $query;
    }
    
?>

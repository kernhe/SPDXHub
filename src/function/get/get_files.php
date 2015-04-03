<?php
    function getFiles($myFile, $docFile, $fileType, $docID, $packageID){	
		//FILES
    	$myString = "";	
    	if (preg_match('/' . "(?P<name><spdx:File.*<\/spdx:File>)" . '/s', $myFile, $matches)) {
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
			$filetype = "<spdx:fileType rdf:resource=\".*fileType_(?P<name>.*?)\"\/>",
			$checksum = "<spdx:checksumValue>(?P<name>.*?)<\/spdx:checksumValue>",
			$license_concluded = "<spdx:licenseConcluded rdf:resource=\"http:\/\/spdx.org\/licenses\/(?P<name>.*?)\"\/>",
			$license_info_in_file = NULL,
			$license_comment = "<spdx:licenseComments>(?P<name>.*?)<\/spdx:licenseComments>",
			$file_copyright_text = "<spdx:copyrightText>(?P<name>.*?)<\/spdx:copyrightText>",
			$artifact_of_project = "<doap:name>(?P<name>.*?)<\/doap:name>",
			$artifact_of_homepage = "<doap:homepage rdf:resource="(?P<name>.*?)"\/>"
			$artifact_of_url = NULL,
			$file_comment = "<rdfs:comment>(?P<name>.*?)<\/rdfs:comment>",
			$file_notice = "<noticeText>(?P<name>.*?)<\/noticeText>",
			$file_contributor = "<fileContributor>(?P<name>.*?)<\/fileContributor>",	
			$package_info_fk = NULL,
			$spdx_fk = NULL,
		);
		
		$tag_regex = array(
			$filename = "FileName:(?P<name>.*?)\n",
			$filetype = "FileType:(?P<name>.*?)\n",
			$checksum = "FileChecksum:(?P<name>.*?)\n",
			$license_concluded = "LicenseConcluded:(?P<name>.*?)\n",
			$license_info_in_file = NULL,
			$license_comment = "LicenseComments:.*<text>(?P<name>.*?)<\/text>",
			$file_copyright_text = "FileCopyrightText:.*<text>(?P<name>.*?)<\/text>",
			$artifact_of_project = "ArtifactOfProjectName:(?P<name>.*?)\n",
			$artifact_of_homepage = "ArtifactOfProjectURI:(?P<name>.*?)\n",
			$artifact_of_url = "ArtifactOfProjectURI:(?P<name>.*?)\n",
			$file_comment = "FileComment:.*<text>(?P<name>.*?)<\/text>",
			$file_notice = "FileNotice:.*<text>(?P<name>.*?)<\/text>",
			$file_contributor = "FileContributor:(?P<name>.*?)\n",
			$package_info_fk = NULL,
			$spdx_fk = NULL,
		);
		
		$regex = array(
			'rdf' => $rdf_regex,
			'tag' => $tag_regex,
		);

    	for($x = 0; $x < sizeof($regex[$fileType]); $x++){ 
    		if ($regex['rdf'][$x] == NULL){
    			continue;
    		}
    		if (preg_match('/' . $regex[$fileType][$x] . '/', $myString, $matches)) {
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

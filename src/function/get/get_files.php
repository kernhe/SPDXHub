<?php
    function getFiles($myFile, $docFile, $filePath){	
		//FILES
    	$myString = "";
    	if (preg_match('/' . "<spdx:referencesFile>(?P<name>.*?)<\/spdx:referencesFile>" . '/', $myFile, $matches)) {
			$myString = $matches[1] ?: NULL;
		}		

		$fileArray = array(
			$file_name = "",
			$file_type = "",
			$file_copyright_text = "",
			$artifact_of_project_name = "",
			$artifact_of_project_homepage = "",
			$artifact_of_project_uri = "",
			$f_license_concluded = "",
			$f_license_info_in_file = "",
			$file_checksum = "",
			$file_checksum_algorithm = "",
			$f_relative_path = "",
			$f_license_comments = "",
			$file_notice = "",
			$file_contributor = "",
			$file_dependency = "",
			$file_comment = "",
			$f_created_at = "",
			$f_updated_at = "",
		);
		
		$rdf_regex = array(
			$file_name = "<spdx:referencesFile>.*<spdx:fileName>(?P<name>.*?)<\/spdx:fileName>",
			$file_type = "<spdx:referencesFile>.*<spdx:fileType rdf:resource=\"http:\/\/spdx.org\/rdf\/terms(?P<name>.*?)\"\/>",
			$file_copyright_text = "<spdx:referencesFile>.*<spdx:copyrightText>(?P<name>.*?)<\/spdx:copyrightText>",
			$artifact_of_project_name = NULL,
			$artifact_of_project_homepage = NULL,
			$artifact_of_project_uri = NULL,
			$f_license_concluded = "<spdx:referencesFile>.*<spdx:licenseConcluded rdf:resource=\"http:\/\/spdx.org\/licenses\/(?P<name>.*?)\"\/>",
			$f_license_info_in_file = "<spdx:referencesFile>.*<spdx:licenseInfoInFile rdf:resource=\"http:\/\/spdx.org\/licenses\/(?P<name>.*?)\"\/>",
			$file_checksum = "<spdx:referencesFile>.*<spdx:checksumValue>(?P<name>.*?)<\/spdx:checksumValue>",
			$file_checksum_algorithm = "<spdx:referencesFile>.*<spdx:algorithm rdf:resource=\"http:\/\/spdx.org\/rdf\/terms#checksumAlgorithm_(?P<name>.*?)\"\/>",
			$f_relative_path = NULL,
			$f_license_comments = "<spdx:referencesFile>.*<spdx:licenseComments>(?P<name>.*?)<\/spdx:licenseComments>",
			$file_notice = NULL,
			$file_contributor = NULL,
			$file_dependency = NULL,
			$file_comment = NULL,
			$created = "<spdx:created>(?P<name>.*?)<\/spdx:created>",
			$f_updated_at = NULL,
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
		
        $query	= 	"INSERT INTO `package_files` (`file_name`,`file_type`,`file_copyright_text`,`artifact_of_project_name`,
	        		`artifact_of_project_homepage`,`artifact_of_project_uri`,`license_concluded`,`license_info_in_file`,`file_checksum`,
	        		`file_checksum_algorithm`,`relative_path`,`license_comments`,`file_notice`,`file_contributor`,`file_dependency`,
	        		`file_comment`,`created_at`,`updated_at`) 
	        		VALUES ('$fileArray[0]', '$fileArray[1]', '$fileArray[2]', '$fileArray[3]', '$fileArray[4]',
					'$fileArray[5]', '$fileArray[6]', '$fileArray[7]', '$fileArray[8]', '$fileArray[9]',
					'$fileArray[10]', '$fileArray[11]', '$fileArray[12]', '$fileArray[13]', '$fileArray[14]', '$fileArray[15]',
					'$fileArray[16]', '$fileArray[17]')";
					
		return $query;
    }
    
?>

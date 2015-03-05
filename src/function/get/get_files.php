<?php
    function getFiles($myString, $docFile, $filePath){	
		//FILES
		$file_name = "";
		$file_type = "";
		$file_copyright_text = "";
		$artifact_of_project_name = "";
		$artifact_of_project_homepage = "";
		$artifact_of_project_uri = "";
		$f_license_concluded = "";
		$f_license_info_in_file = "";
		$file_checksum = "";
		$file_checksum_algorithm = "";
		$f_relative_path = "";
		$f_license_comments = "";
		$file_notice = "";
		$file_contributor = "";
		$file_dependency = "";
		$file_comment = "";
		$f_created_at = "";
		$f_updated_at = "";
		
		$rdf_regex = array(
			'name' => "<spdx:referencesFile>.*<spdx:fileName>(?P<name>.*?)<\/spdx:fileName>",
			'type' => "<spdx:referencesFile>.*<spdx:fileType rdf:resource=\"http:\/\/spdx.org\/rdf\/terms(?P<name>.*?)\"\/>",
			'copyright' => "<spdx:referencesFile>.*<spdx:copyrightText>(?P<name>.*?)<\/spdx:copyrightText>",
			'concluded' => "<spdx:referencesFile>.*<spdx:licenseConcluded rdf:resource=\"http:\/\/spdx.org\/licenses\/(?P<name>.*?)\"\/>",
			'lic_in_file' => "<spdx:referencesFile>.*<spdx:licenseInfoInFile rdf:resource=\"http:\/\/spdx.org\/licenses\/(?P<name>.*?)\"\/>",
			'checksum' => "<spdx:referencesFile>.*<spdx:checksumValue>(?P<name>.*?)<\/spdx:checksumValue>",
			'algo' => "<spdx:referencesFile>.*<spdx:algorithm rdf:resource=\"http:\/\/spdx.org\/rdf\/terms#checksumAlgorithm_(?P<name>.*?)\"\/>",
			'lic_comments' => "<spdx:referencesFile>.*<spdx:licenseComments>(?P<name>.*?)<\/spdx:licenseComments>",
			'created' => "<spdx:created>(?P<name>.*?)<\/spdx:created>",
		);
		
		$regex = array(
			'rdf' => $rdf_regex,
		);

		//FILES
		if (preg_match('/' . $regex['rdf']['name'] . '/', $myString, $matches)) {
		  	$file_name = $matches[1] ?: NULL;
		}
		if (preg_match('/' . $regex['rdf']['type'] . '/', $myString, $matches)) {
		  	$file_type = $matches[1] ?: NULL;
		}
		if (preg_match('/' . $regex['rdf']['copyright'] . '/', $myString, $matches)) {
		  	$file_copyright_text = $matches[1] ?: NULL;
		}
		$artifact_of_project_name= NULL;
		$artifact_of_project_homepage = NULL;
		$artifact_of_project_uri = NULL;
		if (preg_match('/' . $regex['rdf']['concluded'] . '/', $myString, $matches)) {
		  	$f_license_concluded = $matches[1] ?: NULL;
		}
		if (preg_match('/' . $regex['rdf']['lic_in_file'] . '/', $myString, $matches)) {
		  	$f_license_info_in_file = $matches[1] ?: NULL;
		}
		
		if (preg_match('/' . $regex['rdf']['checksum'] . '/', $myString, $matches)) {
		  	$file_checksum = $matches[1] ?: NULL;
		}
		if (preg_match('/' . $regex['rdf']['algo'] . '/', $myString, $matches)) {
		  	$file_checksum_algorithm = $matches[1] ?: NULL;
		}
		$f_relative_path = NULL;
		if (preg_match('/' . $regex['rdf']['lic_comments'] . '/', $myString, $matches)) {
		  	$f_license_comments = $matches[1] ?: NULL;
		}
		$file_notice = NULL;
		$file_contributor = NULL;
		$file_dependency = NULL;
		$file_comment = NULL;
		if (preg_match('/' . $regex['rdf']['created'] . '/', $myString, $matches)) {
		  	$f_created_at = $matches[1] ?: NULL;
		}
		$f_updated_at = NULL;
		
        $query	= 	"INSERT INTO `package_files` (`file_name`,`file_type`,`file_copyright_text`,`artifact_of_project_name`,
	        		`artifact_of_project_homepage`,`artifact_of_project_uri`,`license_concluded`,`license_info_in_file`,`file_checksum`,
	        		`file_checksum_algorithm`,`relative_path`,`license_comments`,`file_notice`,`file_contributor`,`file_dependency`,
	        		`file_comment`,`created_at`,`updated_at`) 
	        		VALUES ('$file_name', '$file_type', '$file_copyright_text', '$artifact_of_project_name', '$artifact_of_project_homepage',
					'$artifact_of_project_uri', '$f_license_concluded', '$f_license_info_in_file', '$file_checksum', '$file_checksum_algorithm',
					'$f_relative_path', '$f_license_comments', '$file_notice', '$file_contributor', '$file_dependency', '$file_comment',
					'$f_created_at', '$f_updated_at')";
					
		return $query;
    }
    
?>

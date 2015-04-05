<SPDX-License-Identifier: Apache-2.0>
<!--
Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
-->
<?php
    function getFiles($myFile, $docFile, $fileType, $fileID, $docID){	
		//FILES
    	$myString = $myFile;	

		$licenseArray = array(
			$license_info_in_file = "",
			$package_info_fk = $packageID,
			$spdx_fk = $docID,
		);
		
		$rdf_regex = array(
			$license_info_in_file = NULL,
			$package_info_fk = NULL,
			$spdx_fk = NULL,
		);
		
		$tag_regex = array(
			$filename = "FileName:(?P<name>.*?)\n",
			$fspdx_id = "SPDXID:(?P<name>.*?)\n",
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
		
        $query	= 	"INSERT INTO `spdx_file_info` (`filename`,`fspdx_id`,`filetype`,`checksum`,`license_concluded`,
	        		`license_info_in_file`,`license_comment`,`file_copyright_text`,`artifact_of_project`,`artifact_of_homepage`,
	        		`artifact_of_url`,`file_comment`,`file_notice`,`file_contributor`,`package_info_fk`,`spdx_fk`) 
	        		VALUES ('$fileArray[0]', '$fileArray[1]', '$fileArray[2]', '$fileArray[3]', '$fileArray[4]',
					'$fileArray[5]', '$fileArray[6]', '$fileArray[7]', '$fileArray[8]', '$fileArray[9]',
					'$fileArray[10]', '$fileArray[11]', '$fileArray[12]', '$fileArray[13]', '$fileArray[14]','$fileArray[15]')";
					
		return $query;
    }
    
?>

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
	function getCreator($myFile, $docFile, $fileType, $ID){
    	// CREATOR
    	if (preg_match('/' . "(?P<name><spdx:CreationInfo>.*<\/spdx:CreationInfo>)" . '/s', $myFile, $matches)) {
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
			$license_list_version = "<spdx:licenseListVersion>(?P<name>.*?)<\/spdx:licenseListVersion> ",
			$creator = "<spdx:creator>(?P<name>.*?)<\/spdx:creator>",
			$creator_optional1 = "<spdx:creator>(?P<name>.*?)<\/spdx:creator>",
			$creator_optional2 = "<spdx:creator>(?P<name>.*?)<\/spdx:creator>",
			$created_date = "<spdx:created>(?P<name>.*?)<\/spdx:created>",
			$creator_comment = "<rdfs:comment>(?P<name>.*?)<\/rdfs:comment>",
		);
		
		$tag_regex = array(
			$license_list_version = "LicenseListVersion:(?P<name>.*?)\n",
			$creator = "Creator:(?P<name>.*?)\n",
			$creator_optional1 = "Creator:(?P<name>.*?)\n",
			$creator_optional2 = "Creator:(?P<name>.*?)\n",
			$created_date = "Created:(?P<name>.*?)\n",
			$creator_comment = "CreatorComment:.*<text>(?P<name>.*?)<\/text>",
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

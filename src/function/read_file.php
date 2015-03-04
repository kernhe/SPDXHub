<?php
    function upload_file($docFilePath) {
		$file = file_get_contents($docFilePath);
		match_doc($file);
    }
    
    function match_doc($myString){
	  	if (preg_match("/.*<spdx:name>(.*?)<\/spdx:name>/", $myString, $matches)) {
		  	echo $matches[0];
		}
		if (preg_match("/.*<spdx:versionInfo>(.*?)<\/spdx:versionInfo>/", $myString, $matches)) {
		  	echo $matches[0];
		}
		if (preg_match("/.*<spdx:downloadLocation>(.*?)<\/spdx:downloadLocation>/", $myString, $matches)) {
		  	echo $matches[0];
		}
		if (preg_match("/.*<spdx:summary>(.*?)<\/spdx:summary>/", $myString, $matches)) {
		  	echo $matches[0];
		}
		if (preg_match("/.*<spdx:packageFileName>(.*?)<\/spdx:packageFileName>/", $myString, $matches)) {
		  	echo $matches[0];
		}
		if (preg_match("/.*<spdx:description>(.*?)<\/spdx:description>/", $myString, $matches)) {
		  	echo $matches[0];
		}
		if (preg_match("/.*<spdx:copyrightText>(.*?)<\/spdx:copyrightText>/", $myString, $matches)) {
		  	echo $matches[0];
		}
		if (preg_match("/<spdx:licenseConcluded rdf:resource=.*licenses\/(.*?)\"/", $myString, $matches)) {
		  	echo $matches[0];
		}
    }
    
?>

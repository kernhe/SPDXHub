<?php
    function upload_file($filePath, $docFile) {
		$file = file_get_contents($filePath);
		if (preg_match('/' . ".*\.(?P<name>.*?)$" . '/', $docFile, $matches)) {
			$fileType = $matches[1] ?: NULL;
			$fileType = preg_replace('/[A-Z]/', '/[a-z]/', $fileType);
		}
		if ($fileType == 'rdf' | $fileType == 'tag'){
			match_doc($file, $docFile, $fileType);
			return 1;
		} else{
			return 0;
		}
    }
    
    function match_doc($myString, $docFile, $fileType){
    	include("Data_Source.php");
    	include ("get/get_package.php");
    	include ("get/get_files.php");
    	include ("get/get_creator.php");
    	include ("get/get_spdx.php");
		
		$docID;
		$packageID;
		$fileID;
		
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
        
        
        // Get SPDX Query
        $sql  = getSPDX($myString, $docFile, $fileType);
        if ($sql == NULL){exit;}
        
        //Execute SPDX Query
		if (mysql_query($sql)){
    		$docID = mysql_insert_id();
		} else {
   		 	echo "Error: " . mysql_error();
   		 	$docID = NULL;
		}
		
        // Get Creators
        $sql  = getCreator($myString, $docFile, $fileType, $docID);
        if ($sql == NULL){exit;}
        
        //Execute SPDX Query
		if (mysql_query($sql)){
		} else {
   		 	echo "Error: " . mysql_error();
		}
        
     
        // Get Package Query
        $sql  = getPackage($myString, $docFile, $fileType, $docID);
        if ($sql == NULL){exit;}
        
        //Execute Package Query
		if (mysql_query($sql)){
    		$packageID = mysql_insert_id();
		} else {
   		 	echo "Error: " . mysql_error();
   		 	$packageID = NULL;
		}
		
		// Get Files Loop/Query
    	if (preg_match_all('/' . "(?P<name><spdx:File.*?<\/spdx:File>)" . '/s', $myString, $files)) {
			#$myString = $matches[1] ?: NULL;
	    	for($x = 0; $x < sizeof($files[0]); $x++){ 
	    		$sql  = getFiles($files[0][$x], $docFile, $fileType, $docID, $packageID);
	    		if ($sql == NULL){break;}
	    		
			   	//Execute File Query
				if (mysql_query($sql)){
		    		$fileID = mysql_insert_id();
				} else {
		   		 	echo "Error: " . mysql_error();
		   		 	$fileID = NULL;
				}
	    		
			}
		}	
        #$sql  = getFiles($myString, $docFile, $fileType, $docID, $packageID);
        #if ($sql == NULL){exit;}
		#SQL EXECUTE		
		
        mysql_close();
    }
    
?>

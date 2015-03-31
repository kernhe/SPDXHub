<?php
    function upload_file($filePath, $docFile) {
		$file = file_get_contents($filePath);
		match_doc($file, $docFile, $filePath);
    }
    
    function match_doc($myString, $docFile, $filePath){
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
        $sql  = getSPDX($myString, $docFile, $filePath);
        
        //Execute SPDX Query
		if (mysql_query($sql)){
    		echo "New record created successfully";
    		$docID = mysql_insert_id();
		} else {
   		 	echo "Error: " . mysql_error();
   		 	$docID = NULL;
		}
        
     
        // Get Package Query
        $sql  = getPackage($myString, $docFile, $filePath, $docID);
        
        //Execute Package Query
		if (mysql_query($sql)){
    		echo "New record created successfully";
    		$packageID = mysql_insert_id();
		} else {
   		 	echo "Error: " . mysql_error();
   		 	$packageID = NULL;
		}
		
		// Get File Query
        $sql  = getFiles($myString, $docFile, $filePath, $docID, $packageID);
        
        //Execute File Query
		if (mysql_query($sql)){
    		echo "New record created successfully";
    		$fileID = mysql_insert_id();
		} else {
   		 	echo "Error: " . mysql_error();
   		 	$fileID = NULL;
		}
		
		
        mysql_close();
    }
    
?>

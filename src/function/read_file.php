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
        
        
        // Get Package Query
        $sql  = getPackage($myString, $docFile, $filePath);
        
        //Execute Package Query
		if (mysql_query($sql)){
    		echo "New record created successfully";
    		$packageID = mysql_insert_id();
		} else {
   		 	echo "Error: " . mysql_error();
   		 	$packageID = NULL;
		}
		
		
        // Get DOC Query
        $sql  = getSPDX($myString, $docFile, $filePath);
        
        //Execute DOC Query
		if (mysql_query($sql)){
    		echo "New record created successfully";
    		$docID = mysql_insert_id();
		} else {
   		 	echo "Error: " . mysql_error();
   		 	$docID = NULL;
		}
		
		
		// Get Creator Query
        $sql  = getCreator($myString, $docFile, $filePath, $docID);
        
        //Execute Creator Query
		if (mysql_query($sql)){
    		echo "New record created successfully";
		} else {
   		 	echo "Error: " . mysql_error();
		}
		
		
		// Get File Query
        $sql  = getFiles($myString, $docFile, $filePath);
        
        //Execute File Query
		if (mysql_query($sql)){
    		echo "New record created successfully";
    		$fileID = mysql_insert_id();
		} else {
   		 	echo "Error: " . mysql_error();
   		 	$fileID = NULL;
		}
		
		
		//Query
        $sql  = "INSERT INTO `doc_file_package_associations` (`spdx_doc_id`,`package_id`,`package_file_id`,`created_at`,`updated_at`) 
        		VALUES ('$docID', '$packageID', '$fileID', NOW(), NULL)";
        
        //Execute Query
		if (mysql_query($sql)){
    		echo "New record created successfully";
		} else {
   		 	echo "Error: " . mysql_error();
		}		
		
		
        mysql_close();
    }
    
?>

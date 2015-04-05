<SPDX-License-Identifier: Apache-2.0>
<!--
Copyright (C) 2014 University of Nebraska at Omaha.

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
(isset($_POST['scan_option']) ? $_POST['scan_option'] : null);
-->
<?php
	$title = "Upload";
	include("function/_header.php");
	include("function/Data_Source.php");
	include("function/read_file.php");
    $packagefilePath            = (isset($_FILES['package']["tmp_name"]) ? $_FILES['package']["tmp_name"] : null);
    $packagefileName            = (isset($_FILES['package']["name"]) ? $_FILES['package']["name"] : null);
    $docfilePath                = (isset($_FILES['document']["tmp_name"]) ? $_FILES['document']["tmp_name"] : null);
    $docfileName                = (isset($_FILES['document']["name"]) ? $_FILES['document']["name"] : null);
    $document_comment           = (isset($_POST['document_comment']) ? $_POST['document_comment'] : null);
    $creator                    = (isset($_POST['creator']) ? $_POST['creator'] : null);
    $creator_comment            = (isset($_POST['creator_comment']) ? $_POST['creator_comment'] : null);
    $pakage_version             = (isset($_POST['package_version']) ? $_POST['package_version'] : null);
    $package_supplier           = (isset($_POST['package_supplier']) ? $_POST['package_supplier'] : null);
    $package_originator         = (isset($_POST['package_originator']) ? $_POST['package_originator'] : null);
    $package_download_location  = (isset($_POST['package_download_location']) ? $_POST['package_download_location'] : null);
    $package_home_page          = (isset($_POST['package_home_page']) ? $_POST['package_home_page'] : null);
    $package_source_info        = (isset($_POST['package_source_info']) ? $_POST['package_source_info'] : null);
    $package_license_comments   = (isset($_POST['package_license_comments']) ? $_POST['package_license_comments'] : null);
    $package_description        = (isset($_POST['package_description']) ? $_POST['package_description'] : null);
    $scan_option 				= (isset($_POST['scan_option']) ? $_POST['scan_option'] : null);
    

    
    if(!empty($packagefilePath)){
        move_uploaded_file($packagefilePath,"uploads/$packagefileName");
    	while (!file_exists("uploads/$packagefileName")) sleep(1);
    
	    $commandLine = "$DoSOCS --scan --packagePath \"uploads/$packagefileName\"";
	    if(!empty($document_comment)) {
	        $commandLine .= " --documentComment \"$document_comment\"";
	    }
	    if(!empty($creator)) {
	        $commandLine .= " --creator \"$creator\"";
	    }
	    if(!empty($creator_comment)) {
	        $commandLine .= " --creatorComment \"$creator_comment\"";
	    }
	    if(!empty($pakage_version)) {
	        $commandLine .= " --packageVersion \"$pakage_version\"";
	    }
	    if(!empty($package_supplier)) {
	        $commandLine .= " --packageSupplier \"$package_supplier\"";
	    }
	    if(!empty($package_originator)) {
	        $commandLine .= " --packageOriginator \"$package_originator\"";
	    }
	    if(!empty($package_download_location)) {
	        $commandLine .= " --packageDownloadLocation \"$package_download_location\"";
	    }
	    if(!empty($package_home_page)) {
	        $commandLine .= " --packageHomePage \"$package_home_page\"";
	    }
	    if(!empty($package_source_info)) {
	        $commandLine .= " --packageSourceInfo \"$package_source_info\"";
	    }
	    if(!empty($package_license_comments)) {
	        $commandLine .= " --packageLicenseComments \"$package_license_comments\"";
	    }
	    if(!empty($package_description)) {
	        $commandLine .= " --documentComment \"$package_description\"";
	    }
	    
	    if(!empty($scan_option)) {
	        $commandLine .= " --scanOption \"$scan_option\"";
	        shell_exec($commandLine . ' 2>&1');
	    	echo '<div align="center"><h4><p class="text-success">Successfully uploaded document.</p></h4></div>';
	    }
	    else{
	    	echo '<div align="center"><h4><p class="text-danger">Error processing request.</p></h4></div>';
	    }
    }
    
   	if(!empty($docfilePath)){
   	    move_uploaded_file($docfilePath,"uploads/$docfileName");
    	while (!file_exists("uploads/$docfileName")) sleep(1);
    	
    	if (upload_file("uploads/$docfileName", "$docfileName")){
    		echo '<div align="center"><h4><p class="text-success">Successfully uploaded document.</p></h4></div>';
    	} else{
    		echo '<div align="center"><h4><p class="text-danger">Unable to upload document.</p></h4></div>';
    	}
   	}
   
	include("function/_footer.php");
?>

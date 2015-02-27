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
	include("function/headerfooter.php");
	include("function/Data_Source.php");
	incHeader("Upload");
    $filePath                   = $_FILES["package"]["tmp_name"];
    $fileName                   = $_FILES["package"]["name"];
    $document_comment           = $_POST['document_comment'];
    $creator                    = $_POST['creator'];
    $creator_comment            = $_POST['creator_comment'];
    $pakage_version             = $_POST['pacakge_version'];
    $package_supplier           = $_POST['package_supplier'];
    $package_originator         = $_POST['package_originator'];
    $package_download_location  = $_POST['package_download_location'];
    $package_home_page          = $_POST['package_home_page'];
    $package_source_info        = $_POST['package_source_info'];
    $package_license_comments   = $_POST['package_license_comments'];
    $package_description        = $_POST['package_description'];
    $scan_option 				= (isset($_POST['scan_option']) ? $_POST['scan_option'] : null);

    move_uploaded_file($filePath,"uploads/$fileName");
    while (!file_exists("uploads/$fileName")) sleep(1);
    
    $commandLine = "$DoSOCS --scan --packagePath \"uploads/$fileName\"";
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
    	echo "<div align=\"center\">Document successfully uploaded.</div>";
    }
    else{
    	echo "<div align=\"center\">Error processing request.</div>";
    }
   
	incFooter();
?>

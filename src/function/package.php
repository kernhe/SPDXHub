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
-->
<?php 
    function updatePackage( $spdx_doc_id, 
                            $pacakge_name = "", 
                            $package_version = "", 
                            $package_download_location = "", 
                            $pacakge_summary = "", 
                            $package_file_name = "", 
                            $package_supplier = "", 
                            $package_originator = "",
                            $package_description = "",
                            $package_copyright_text = "",
                            $package_license_concluded = "") {
        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
        
        //Query
        $sql  = "UPDATE packages, doc_file_package_associations
                 SET packages.package_name = '" . $pacakge_name . "',
                     packages.package_version = '" . $package_version . "',
                     packages.package_download_location = '" . $package_download_location . "',
                     packages.package_summary = '" . $pacakge_summary . "',
                     packages.package_file_name = '" . $package_file_name . "',
                     packages.package_supplier = '" . $package_supplier . "',
                     packages.package_originator = '" . $package_originator . "',
                     packages.package_description = '" . $package_description . "',
                     packages.package_copyright_text = '" . $package_copyright_text . "',
                     packages.package_license_concluded = '" . $package_license_concluded . "'
                   WHERE doc_file_package_associations.package_id = packages.id
                         AND doc_file_package_associations.spdx_doc_id=" . $spdx_doc_id;
        
        //Execute Query
        $qryUpdatePackage = mysql_query($sql);
        
        //Close Connection
        mysql_close();
    }
?>

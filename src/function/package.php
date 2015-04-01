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
                            $name = "", 
                            $version = "", 
                            $download_location = "", 
                            $summary = "", 
                            $filename = "", 
                            $supplier = "", 
                            $originator = "",
                            $description = "",
                            $package_copyright_text = "",
                            $license_concluded = "") {
        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
        
        //Query
        $sql  = "UPDATE spdx_package_info
                 SET packages.name = '" . $name . "',
                     packages.version = '" . $version . "',
                     packages.download_location = '" . $download_location . "',
                     packages.summary = '" . $summary . "',
                     packages.filename = '" . $filename . "',
                     packages.supplier = '" . $supplier . "',
                     packages.originator = '" . $originator . "',
                     packages.description = '" . $description . "',
                     packages.package_copyright_text = '" . $package_copyright_text . "',
                     packages.license_concluded = '" . $license_concluded . "'
                   WHERE spdx_package_info.spdx_fk = " . $spdx_doc_id;
        
        //Execute Query
        $qryUpdatePackage = mysql_query($sql);
		if (mysql_query($sql)) {
    		echo "New record created successfully";
		} else {
   		 	echo "Error: ";
		}
        //Close Connection
        mysql_close();
    }
?>

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
    function getPackageFiles($spdx_doc_id) {
        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());

        //Query
        $sql  = "SELECT DISTINCT pf.*, LENGTH( pf.relative_path ) - LENGTH( REPLACE( pf.relative_path,  '/',  '' ) ) AS level, le.license_fullname, le.license_identifier
               	FROM  spdx_file_info pf
               		LEFT OUTER JOIN spdx_license_list_insert AS le ON pf.license_info_in_file = le.license_identifier
               	WHERE pf.spdx_fk = " . $spdx_doc_id . "
                ORDER BY pf.relative_path";
        
        //Execute Query
        $qryPKGFiles = mysql_query($sql);
        
        //Close Connection
        mysql_close();
        
        return $qryPKGFiles;
    }
    
    function getPackageFile($fileId, $docId) {
        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
        
        //Query
        $sql  = "SELECT pf.*, le.license_identifier
                FROM spdx_file_info AS pf
                	LEFT OUTER JOIN spdx_license_list_insert AS le ON pf.license_info_in_file = le.license_identifier
                WHERE pf.file_info_pk = " . $fileId . " AND pf.spdx_fk = " . $docId;
        
        //Execute Query
        $qryPKGFile = mysql_query($sql);
        
        //Close Connection
        mysql_close();
        
        return $qryPKGFile;
    }
    function updateFile($fileId,
                        $file_copyright_text = "",
                        $filetype = "",
                        $artifact_of_project_name = "",
                        $artifact_of_project_homepage = "",
                        $artifact_of_project_uri = "",
                        $license_concluded = "",
                        $license_info_in_file = "",
                        $file_notice = "",
                        $file_contributor = "",
                        $file_comment = "") {

        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
        
        //Query
        $sql  = "UPDATE spdx_file_info
                 SET file_copyright_text = '" . $file_copyright_text . "',
                 	 filetype = '" . $filetype . "', 
                     artifact_of_project = '" . $artifact_of_project_name . "',
                     artifact_of_homepage = '" . $artifact_of_project_homepage . "',
                     artifact_of_url = '" . $artifact_of_project_uri . "',
                     license_concluded = '" . $license_concluded . "', 
                     license_info_in_file = '" . $license_info_in_file . "',
                     file_notice = '" . $file_notice . "', 
                     file_contributor = '" . $file_contributor . "',
                     file_comment = '" . $file_comment . "'
                 WHERE file_info_pk = " . $fileId;
        
        //Execute Query
        $updPKGFile = mysql_query($sql);
        
        //Close Connection
        mysql_close();
        
        return $updPKGFile;
    }
?>

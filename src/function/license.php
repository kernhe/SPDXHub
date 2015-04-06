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
    function getDocLicenses($spdx_doc_id) {
        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
        
        //Query
        $sql  = "SELECT dla.Id,
                        dla.spdx_doc_id,
                        dla.license_id,
                        dla.license_identifier,
                        dla.license_name,
                        dla.license_comments,
                        dla.created_at,
                        dla.updated_at
                FROM doc_license_associations AS dla
                WHERE dla.spdx_doc_id = " . $spdx_doc_id;
        
        //Execute Query
        $qryDocLicenses = mysql_query($sql);
        
        //Close Connection
        mysql_close();
        
        return $qryDocLicenses;
    }
    
    function getLicenseInfo($file_id, $license_id) {
        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
        
        //Query
        $sql  = "SELECT pf.file_info_pk, pf.filename, pf.license_info_in_file, pf.license_comment, le.license_identifier, le.license_fullname, le.osi_approved
				FROM spdx_file_info AS pf
					JOIN  spdx_license_list_insert le ON pf.license_info_in_file = le.license_identifier
				WHERE pf.file_info_pk = " . $file_id;
        
        //Execute Query
        $qryLicenseInfo = mysql_query($sql);
        
        //Close Connection
        mysql_close();
        
        return $qryLicenseInfo;
    }
    
    function updateLicenses($file_id, $license_comments = "") {
        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
        
        //Query
        $sql  = "UPDATE spdx_file_info 
                 SET license_comment = '" . $license_comments . "'
                 WHERE file_info_pk = " . $file_id;
                 
                 
        
        //Execute Query
        $updLicenseInfo = mysql_query($sql);
    
        
        //Close Connection
        mysql_close();
        
        return $updLicenseInfo;
    }
    
    function getLicenseCounts($spdxDocId) {
        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());

        $sql = "SELECT COUNT( license_identifier ) as numLicenses, license_fullname
               FROM spdx_file_info pf
               JOIN spdx_license_list_insert le ON pf.license_info_in_file = le.license_identifier
               WHERE spdx_fk = $spdxDocId
               GROUP BY license_fullname";

        return mysql_query($sql);
    }
    
    function getLicenseApproval_Count($spdxDocId) {
        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());

        $sql = 	"SELECT COUNT(license_identifier) as approvalCount, license_fullname
				FROM spdx_file_info sfi 
				JOIN spdx_license_list_insert slli ON sfi.license_info_in_file = slli.license_identifier
				WHERE slli.osi_approved = 1 AND sfi.spdx_fk = " . $spdxDocId . "
				GROUP BY license_fullname";

        return mysql_query($sql);
    }
    
    function getLicenseDisapproval_Count($spdxDocId) {
        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());

        $sql = 	"SELECT COUNT(license_identifier) as disapprovalCount, license_fullname
				FROM spdx_file_info sfi 
				JOIN spdx_license_list_insert slli ON sfi.license_info_in_file = slli.license_identifier
				WHERE slli.osi_approved = 0 AND sfi.spdx_fk = " . $spdxDocId . "
				GROUP BY license_fullname";

        return mysql_query($sql);
    }
    
    function getLicenseUnknown_Count($spdxDocId) {
        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());

        $sql = 	"SELECT COUNT(license_info_in_file) as unknownCount
			FROM spdx_file_info sfi 
			WHERE sfi.spdx_fk = " . $spdxDocId . " AND sfi.license_info_in_file NOT IN (SELECT license_identifier FROM spdx_license_list_insert )
			GROUP BY license_info_in_file";

        return mysql_query($sql);
    }
    

    
?>

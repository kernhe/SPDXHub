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
    function getSPDX_Doc($spdx_doc_id) {
        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());

        //Query
        $query = "SELECT sf.spdx_id
                        ,sf.version
                        ,sf.data_license
                        ,sf.document_name
                        ,sf.document_comment
                        ,sf.created_date
                        ,sf.creator
                        ,sf.created_date
                        ,sf.creator_comment
                        ,p.name
                        ,p.version
                        ,p.download_location
                        ,p.summary
                        ,p.filename
                        ,p.supplier
                        ,p.originator
                        ,p.checksum
                        ,p.verificationcode
                        ,p.description
                        ,p.package_copyright_text
                        ,p.license_declared
                        ,p.license_concluded

                 FROM spdx_file sf
                      LEFT OUTER JOIN spdx_package_info p ON p.spdx_fk = sf.spdx_pk

                WHERE sf.spdx_pk = " . $spdx_doc_id . "

                GROUP BY sf.spdx_id
                        ,sf.version
                        ,sf.data_license
                        ,sf.document_name
                        ,sf.document_comment
                        ,sf.created_date
                        ,sf.creator
                        ,sf.created_date
                        ,sf.creator_comment
                        ,p.name
                        ,p.version
                        ,p.download_location
                        ,p.summary
                        ,p.filename
                        ,p.supplier
                        ,p.originator
                        ,p.checksum
                        ,p.verificationcode
                        ,p.description
                        ,p.package_copyright_text
                        ,p.license_declared
                        ,p.license_concluded";
        
        //Execute Query
        $qrySPDX_Doc = mysql_query($query);
        
        //Close Connection
        mysql_close();
        
        return $qrySPDX_Doc;
    }
  
   function getSPDX_DocList($name = "") {
        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
        $query = "SELECT spdx_pk,
                         document_name,
                         created_date
                  FROM spdx_file ";
       	if($name != "") {
       		$query .= "WHERE document_name LIKE '%" . $name . "%' ";
       	}
	    $query .= "ORDER BY document_name ASC";
        //Execute Query
        $qrySpdxDocs = mysql_query($query);
        
        //Close Connection
        mysql_close();
        return $qrySpdxDocs;
    }
	function getLicenseVerifier($name = "",  $spdxapproved = "",  $spdxnotapproved = "",  $notinlist = "") {
        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());

        $query = 	"SELECT sf.spdx_pk,
                         sf.document_name,
                         sf.created_date
				FROM spdx_file sf 
				JOIN spdx_license_list_insert slli ON sf.data_license = slli.license_identifier
				";
		if($name != "") {
       		$query .= "WHERE sf.document_name LIKE '%" . $name . "%' ";
       	}	
		if($spdxapproved == "1" && $spdxnotapproved == "0") {
       		if($notinlist == "1") {	
			$query .= "AND sf.data_license NOT IN (SELECT license_identifier FROM spdx_license_list_insert )";
			}
			else{
			$query .= "AND slli.osi_approved IS NOT NULL";
			}
       	}	
		else if($spdxapproved == "0" && $spdxnotapproved == "1") {
       		if($notinlist == "1") {	
			$query .= "AND sf.data_license NOT IN (SELECT license_identifier FROM spdx_license_list_insert )";
			}
			else{
				$query .= "AND slli.osi_approved IS NULL";
			}
			
			
       	}	
		else if($spdxapproved == "1" && $spdxnotapproved == "1") {
       		
			if($notinlist == "1") {	
			$query .= "AND sf.data_license NOT IN (SELECT license_identifier FROM spdx_license_list_insert )";
			}
			else{
				$query .= "AND slli.osi_approved";
			}
       	}
		
		
		//$query .= " GROUP BY sf.document_name";		

        return mysql_query($query);
    }
	
	 function getSPDX_LicenseList() {
        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());

        $query = "SELECT license_fullname, license_identifier 
                  FROM spdx_license_list_insert";


        //Execute Query
        $qrySpdxList = mysql_query($query);
        
        //Close Connection
        mysql_close();
        return $qrySpdxList;

    }
    
    function updateSPDX_Doc($spdx_doc_id, $document_comment = "", $spdx_version = "", $data_license = "", $creator = "", $creator_comment = "") {
        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());

        //Query
        $sql  = "UPDATE spdx_file 
                SET document_comment = '" . $document_comment . "', 
                    version = '" . $spdx_version ."', 
                    data_license = '" . $data_license . "', 
                    creator = '" . $creator . "', 
                    creator_comment = '" . $creator_comment . "' 
                WHERE spdx_pk = " . $spdx_doc_id;

        //Execute Query
        $qryUpdateDoc = mysql_query($sql);
		if (mysql_query($sql)) {
		} else {
   		 	echo "Error: " . mysql_error();
		}
		
        //Close Connection
        mysql_close();
    } 
    

?>

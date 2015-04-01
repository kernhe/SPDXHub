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
		
        $query .= "ORDER BY created_date ASC";

        //Execute Query
        $qrySpdxDocs = mysql_query($query);
        
        //Close Connection
        mysql_close();
        return $qrySpdxDocs;

    }
	function getSPDX_DocListAdv($name ="", $date_cr_fr = "",$date_cr_to = "", $date_md_fr = "",$date_md_to ="") {
        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());

        $query = "SELECT id,
                         upload_file_name,
                         created_at, updated_at 
                  FROM spdx_docs ";

       	if($name != "") {
       		$query .= "WHERE upload_file_name LIKE '%" . $name . "%' ";
       	}
		if($date_cr_fr != "" && $date_cr_to != "") {
       		$query .= "AND WHERE created_at BETWEEN #" . $date_cr_fr . "# AND #" . $date_cr_to . "#";
       	}
		if($date_md_fr != "" && $date_md_to != "") {
       		$query .= "AND WHERE updated_at BETWEEN #" . $date_md_fr . "# AND #" . $date_md_to . "#";
       	}
        $query .= "ORDER BY created_at ASC";

        //Execute Query
        $qrySpdxDocs = mysql_query($query);
        
        //Close Connection
        mysql_close();
        return $qrySpdxDocs;

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

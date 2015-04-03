<?php 
    function getPackageFiles($spdx_doc_id) {
        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());

        //Query
        $sql  = "SELECT DISTINCT pf.*,
                                 dfpa.relative_path,
                                 LENGTH( dfpa.relative_path ) - LENGTH( REPLACE( dfpa.relative_path,  '/',  '' ) ) AS level,
                                 dfpa.package_id,
                                 dla.license_id,
                                 le.licensename
                 FROM package_files pf
                      INNER JOIN doc_file_package_associations AS dfpa ON pf.id = dfpa.package_file_id
                      LEFT OUTER JOIN licensings AS l ON pf.id = l.package_file_id
                      LEFT OUTER JOIN doc_license_associations AS dla ON l.doc_license_association_id = dla.id
                      LEFT OUTER JOIN spdx_license_list_insert AS le ON dla.license_id = le.id
                 WHERE dfpa.spdx_doc_id = " . $spdx_doc_id . "
                 ORDER BY dfpa.relative_path";
        
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
        $sql  = "SELECT pf.Id,
                        file_name,
                        file_type,
                        file_copyright_text,
                        artifact_of_project_name,
                        artifact_of_project_homepage,
                        artifact_of_project_uri,
                        license_concluded,
                        license_info_in_file,
                        file_checksum,
                        file_checksum_algorithm,
                        dfpa.relative_path,
                        pf.license_comments,
                        file_notice,
                        file_contributor,
                        file_dependency,
                        file_comment,
                        pf.created_at,
                        pf.updated_at,
                        dla.license_id,
                        dla.license_identifier
                FROM package_files AS pf
                     LEFT OUTER JOIN licensings AS l ON pf.id = l.package_file_id
                     LEFT OUTER JOIN doc_license_associations AS dla ON dla.Id = l.doc_license_association_id
                     LEFT OUTER JOIN doc_file_package_associations AS dfpa ON pf.id = dfpa.package_file_id
                WHERE pf.Id = " . $fileId . " AND dla.spdx_doc_id = " . $docId;
        
        //Execute Query
        $qryPKGFile = mysql_query($sql);
        
        //Close Connection
        mysql_close();
        
        return $qryPKGFile;
    }
    function updateFile($fileId,
                        $file_copyright_text = "",
                        $artifact_of_project_name = "",
                        $artifact_of_project_homepage = "",
                        $artifact_of_project_uri = "",
                        $license_concluded = "",
                        $license_info_in_file = "",
                        $license_comments = "",
                        $file_notice = "",
                        $file_contributor = "",
                        $file_dependency = "",
                        $file_comment = "") {

        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
        
        //Query
        $sql  = "UPDATE package_files
                 SET file_copyright_text = '" . $file_copyright_text . "',
                     artifact_of_project_name = '" . $artifact_of_project_name . "',
                     artifact_of_project_homepage = '" . $artifact_of_project_homepage . "',
                     artifact_of_project_uri = '" . $artifact_of_project_uri . "',
                     license_concluded = '" . $license_concluded . "', 
                     license_info_in_file = '" . $license_info_in_file . "',
                     license_comments = '" . $license_comments . "',
                     file_notice = '" . $file_notice . "', 
                     file_contributor = '" . $file_contributor . "',
                     file_dependency = '" . $file_dependency . "',
                     file_comment = '" . $file_comment . "',
                     updated_at = Now()
                 WHERE Id = " . $fileId;
        
        //Execute Query
        $updPKGFile = mysql_query($sql);
        
        //Close Connection
        mysql_close();
        
        return $updPKGFile;
    }
?>

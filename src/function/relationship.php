<SPDX-License-Identifier: Apache-2.0>
<!--
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
    function addPackageRelationShip(
    					$spdxID,
                        $spdx_id1 = "",
                        $spdx_id2 = "",
                        $relationship_id = "") {

        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
                
        //Query
        $sql  = "INSERT INTO relationship (`spdx_id1`, `spdx_id2`, `relationship_id`, `spdx_fk`)
        		 VALUES ( '$spdxID', '$spdx_id1', '$spdx_id2', '$relationship_id')";
        
        $result = mysql_query($sql);
        
        //Close Connection
        mysql_close();
        
        return $result;
    }
    
   function getRelationship_List($id) {
        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
        $query = "SELECT sf.document_name,
                         relationship_type
                  FROM relationship r
                  JOIN spdx_file sf ON sf.spdx_pk = r.spdx_id2
                  JOIN spdx_relationship_insert ri ON r.relationship_id = ri.relationship_id_pk
				  WHERE spdx_fk LIKE '%" . $id . "%' AND spdx_id1 LIKE '%" . $id . "%'";
		
        $query .= "ORDER BY spdx_id1 ASC";
        //Execute Query
        $qrySpdxDocs = mysql_query($query);
        
        //Close Connection
        mysql_close();
        return $qrySpdxDocs;
    }
?>

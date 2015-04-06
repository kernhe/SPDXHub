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
    function addPackageAnnotation(
    					$spdxID,
                        $annotator_name = "",
                        $annotator_comment = "",
                        $annotation_type = "") {

        //Create Database connection
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("cannot connect server " . mysql_error());
        mysql_select_db("$db_name")or die("cannot select DB " . mysql_error());
        
        if($annotator_name == ""){
        	$annotator_name = "Anonymous";
        }
        
        //Query
        $sql  = "INSERT INTO spdx_annotations_create (`annotator`, `annotator_date`, `annotator_type`, `annotator_comment`, `spdx_fk`)
        		 VALUES ( '$annotator_name', NOW(), '$annotation_type', '$annotator_comment', '$spdxID')";
        
        $result = mysql_query($sql);
        
        //Close Connection
        mysql_close();
        
        return $result;
    }
?>

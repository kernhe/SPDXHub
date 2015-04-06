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
	$title = "License";
    include("function/_header.php");
    include("function/license.php");
    include("function/annotate.php");
    
    $licenseId = $_GET['license_id'];
    $spdxId    = $_GET['doc_id'];
    $fileID	   = $_GET['file_id'];
    
    if(array_key_exists('action',$_POST)){
        if($_POST["action"] == "update"){
            updateLicenses($fileID,
                           $_POST['license_comments']);
        	addPackageAnnotation(	
        					$spdxId,
        					$_POST["annotator_name"],
        					$_POST["annotator_comment"],
        					"EDIT");
        }
    }
    $lic = mysql_fetch_assoc(getlicenseInfo($fileID,$licenseId));
?>
<script>
    $(document).ready(function() {
    	$("#edit_doc").click(function () {
    		$('.edit').show();
        	$('.view').hide();
        });
    });
</script>
<div class="container">
    <?php 
        if(array_key_exists('action',$_POST)) {
            if($_POST["action"] == "update") {
                echo '<div align="center"><h4><p class="text-success">Successfully Updated License</p></h4></div>';
            }
        }
    ?>
    <form id="spdx_form" action="license.php?license_id=<?php echo $licenseId; ?>&doc_id=<?php echo $spdxId;?>&file_id=<?php echo $fileID;?>" method="post">
        <input type="hidden" name="action" value="update"/>
        <table id="tblMain" class="table table-bordered table-striped table-doc">
            <thead>
                <tr>
                    <th colspan=2>
                        <?php echo $lic["license_fullname"]; ?>
                        <div style="display:inline-block;float:right;">
                            <button id="edit_doc"     type="button"  class="btn btn-primary view"/>Edit</button>
                            <button id="save_doc"     type="submit"  class="btn btn-primary edit" style="display:none;">Save</button>
                        </div>
                    </th>
                </tr>
                <tr style="border-bottom: solid; border-top:solid; border-color: #d3d3d3; border-width: 3px;">
                    <td colspan=1 class="edit" style="display:none;">
                    	<textarea name="annotator_name" class='form-control' placeholder='Annotator Name'></textarea>
                    </td>
                    <td colspan=1 class="edit" style="display:none;">
                    	<textarea name="annotator_comment" class='form-control' placeholder="Annotation Comment"></textarea>
                    </td>
                </tr>
                
            </thead>
            <tbody>
                <tr>
                    <td title="License Identifier for this license in this SPDX document.">License Identifier</td>
                    <td><?php echo $lic["license_identifier"]; ?></td>
                </tr>
                <tr>
                    <td title="Any addtional information on this license in this SPDX document.">License Comments</td>
                    <td class="edit" style="display:none;">
                        <textarea name="license_comments" class='form-control'><?php echo $lic["license_comment"]; ?></textarea>
                    </td>
                    <td class="view"><?php echo $lic["license_comment"]; ?></td>
                </tr>
                <tr>
                    <td title="Any addtional information on this license in this SPDX document.">OSI Approved</td>
                    <td><?php echo $lic["osi_approved"]; ?></td>
                </tr>
                <tr>
                    <td title="File this license was identified in.">File</td>
                    <td><a href="file.php?file_id=<?php echo $lic['file_info_pk'];?>&doc_id=<?php echo $spdxId; ?>"><?php echo $lic["filename"]; ?></a></td>
                </tr>
            </tbody>
        </table>
    </form>
    <div align="center">
    	<a href="spdx_doc.php?doc_id=<?php echo $spdxId; ?>">Back to Document</a>
    </div>
</div>
<?php
    include("function/_footer.php");
?>

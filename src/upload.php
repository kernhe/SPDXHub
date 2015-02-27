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
    include("function/headerfooter.php");
    incHeader("Upload Package");
?>

<script>
	var index;
	var id_list = ["txtDocumentComment", "txtCreator", "txtAreaCreatorComment", "txtPackageVersion", "txtPackageSupplier", "txtPackageOriginator", "txtPackageDownalodLocation", "txtPackageHomePage", "txtPackageSourceInfo", "txtPackageLicenseComments", "txtPackageDescription", "selectScanOption"];
	var hide_list = document.getElementsByClassName('hideable')
	
	function enableForm(buttonToDisable) {
		document.getElementById(buttonToDisable).disabled = true;
		document.getElementById("submit").disabled = false;
		if(buttonToDisable == "fileDocumentFile"){
			for (index = 0; index < id_list.length; ++index) {
    			document.getElementById(id_list[index]).disabled = false;
			}
		}
	}
	function disableForm() {
		document.getElementById("fileDocumentFile").disabled = false;
		document.getElementById("filePackageFile").disabled = false;
		document.getElementById("submit").disabled = true;
		for (index = 0; index < id_list.length; ++index) {
    		document.getElementById(id_list[index]).disabled = true;
		}
	}
	
	function toggleView(style) {
		window.scrollTo(0, 0);
		for (index = 0; index < hide_list.length; ++index) {
    		hide_list[index].style.display = style;
		}
	}
</script>

<div class="col-md-8 col-md-offset-2">
    <form action="upload_action.php" method="POST" enctype="multipart/form-data" >
         <div class="form-group"  style="display:inline-block;min-width:200px;">
            <label for="packageFile">Package</label>
            <input type="file" onchange="enableForm('fileDocumentFile')" name="package" id="filePackageFile"/>
        </div>   
        <div class="form-group" style="display:inline-block;min-width:200px;">             
        	<label for="packageFile">SPDX Document</label>             
        	<input type="file" onchange="enableForm('filePackageFile'), toggleView('none')" name="document" id="fileDocumentFile"/>         
       	</div>
        <div class="form-group hideable">
            <label for="txtDocComment">Document Comment</label>
            <textarea name="document_comment" id="txtDocumentComment" class="form-control" disabled></textarea>
        </div>
        <div class="form-group hideable">
            <label for="">Creator</label>
            <input type="text" name="creator" id="txtCreator" class="form-control" disabled/>
        </div>
        <div class="form-group hideable">
            <label for="txtAreaCreatorComment">Creator Comment</label>
            <textarea id="txtAreaCreatorComment" name="creator_comment" class="form-control" disabled></textarea>
        </div>
        <div class="form-group hideable">
            <label for="packageVersion">Package Version</label>
            <input type="text" name="pacakge_version" id="txtPackageVersion" class="form-control" disabled/>
        </div>
        <div class="form-group hideable">
            <label for="txtPackageSupplier">Package Supplier</label>
            <input type="text" name="package_supplier" id="txtPackageSupplier" class="form-control" disabled/>
        </div>
        <div class="form-group hideable">
            <label for="txtPackageOriginator">Package Originator</label>
            <input type="text" id="txtPackageOriginator" name="package_originator" class="form-control" disabled/>
        </div>
        <div class="form-group hideable">
            <label for="txtPackageDownalodLocation">Package Download Location</label>
            <input type="text" id="txtPackageDownalodLocation" name="package_download_location" class="form-control" disabled/>
        </div>
        <div class="form-group hideable">
            <label for="txtPackageHomePage">Package Home Page</label>
            <input type="text" id="txtPackageHomePage" name="package_home_page" class="form-control" disabled/>
        </div>
        <div class="form-group hideable">
            <label for="txtPackageSourceInfo">Package Source Info</label>
            <input type="text" id="txtPackageSourceInfo" name="package_source_info" class="form-control" disabled/>
        </div>
        <div class="form-group hideable">
            <label for="txtPackageLicenseComments">Package License Comments</label>
            <input type="text" id="txtPackageLicenseComments" name="package_license_comments" class="form-control" disabled/>
        </div>
        <div class="form-group hideable">
            <label for="txtPackageDescription">Package Description</label>
            <input type="text" id="txtPackageDescription" name="package_description" class="form-control" disabled/>
        </div>
        <div class="form-group hideable" >
            <label for="txtScanOption" >Scan Option</label>
            <select name="scan_option" id="selectScanOption"  size="2" class="form-control" disabled>
            <option value="fossology">fossology</option>
            <option value="fossology+ninka">fossology+ninka</option></select>
        </div>
        <input type="submit" value="submit" id="submit" style="width:100px;float:left;clear:left;margin-right:5px;" disabled>
        <input type="reset" onclick="disableForm(), toggleView('block')" value="reset" style="width:65px;">
    </form>
</div>
<?php
    incFooter(); 
?>


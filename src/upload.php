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
	$title = "Upload";
    include("inc/_header.php");
    include("js/upload.js");
?>


<div class="col-md-8 col-md-offset-2">

    <form action="upload_action.php" method="POST" enctype="multipart/form-data">
		<div class="form-selection">
			<label for="" style="display:block; font-size:2.5em; margin-bottom: 20px;">Upload Type</label>
			<button type="reset" class="btn select-btn" id="package-btn" onclick="toggleDocView('none'), toggleFormView('block'),  disableForm()">Package</button>
			<button type="reset" class="btn select-btn" id="doc-btn" onclick="toggleFormView('none'), toggleDocView('block'), disableForm()">Document</button>	
		</div>	    
	    
	    <div class="form-menu">
	         <div class="form-group" style="min-width:200px;margin-bottom:20px">
	            <label for="packageFile">Package</label>
	            <input type="file" onchange="enableForm()" name="package" id="filePackageFile"/>
	        </div>   
	        <div class="doc-group" style="min-width:200px;margin-bottom:20px">             
	        	<label for="packageFile">SPDX Document</label>             
	        	<input type="file" onchange="enableForm(), toggleView('none')" name="document" id="fileDocumentFile"/>         
	       	</div>
	        <div class="form-group">
	            <label for="txtDocComment">Document Comment</label>
	            <textarea name="document_comment" id="txtDocumentComment" class="form-control" disabled></textarea>
	        </div>
	        <div class="form-group">
	            <label for="">Creator</label>
	            <input type="text" name="creator" id="txtCreator" class="form-control" disabled/>
	        </div>
	        <div class="form-group">
	            <label for="txtAreaCreatorComment">Creator Comment</label>
	            <textarea id="txtAreaCreatorComment" name="creator_comment" class="form-control" disabled></textarea>
	        </div>
	        <div class="form-group">
	            <label for="packageVersion">Package Version</label>
	            <input type="text" name="pacakge_version" id="txtPackageVersion" class="form-control" disabled/>
	        </div>
	        <div class="form-group">
	            <label for="txtPackageSupplier">Package Supplier</label>
	            <input type="text" name="package_supplier" id="txtPackageSupplier" class="form-control" disabled/>
	        </div>
	        <div class="form-group">
	            <label for="txtPackageOriginator">Package Originator</label>
	            <input type="text" id="txtPackageOriginator" name="package_originator" class="form-control" disabled/>
	        </div>
	        <div class="form-group">
	            <label for="txtPackageDownalodLocation">Package Download Location</label>
	            <input type="text" id="txtPackageDownalodLocation" name="package_download_location" class="form-control" disabled/>
	        </div>
	        <div class="form-group">
	            <label for="txtPackageHomePage">Package Home Page</label>
	            <input type="text" id="txtPackageHomePage" name="package_home_page" class="form-control" disabled/>
	        </div>
	        <div class="form-group">
	            <label for="txtPackageSourceInfo">Package Source Info</label>
	            <input type="text" id="txtPackageSourceInfo" name="package_source_info" class="form-control" disabled/>
	        </div>
	        <div class="form-group">
	            <label for="txtPackageLicenseComments">Package License Comments</label>
	            <input type="text" id="txtPackageLicenseComments" name="package_license_comments" class="form-control" disabled/>
	        </div>
	        <div class="form-group">
	            <label for="txtPackageDescription">Package Description</label>
	            <input type="text" id="txtPackageDescription" name="package_description" class="form-control" disabled/>
	        </div>
	        <div class="form-group">
	            <label for="txtScanOption" >Scan Option</label>
	            <select name="scan_option" id="selectScanOption"  size="2" class="form-control" disabled>
	            <option value="fossology">fossology</option>
	            <option value="fossology+ninka">fossology+ninka</option></select>
	        </div>
	        <div class="form-group doc-group" id="submission-group">
	        	<input type="submit" class="btn" value="submit" id="submit" style="width:100px;margin-right:10px;" disabled>
	        	<input type="reset" class="btn" onclick="toggleFormView('none'), toggleDocView('none'), disableForm()" value="reset" style="width:65px;">
	  		</div> 
	  	</div> 
    </form>
</div>
<?php
    include("inc/_footer.php");
?>


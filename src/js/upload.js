<SCRIPT LANGUAGE="JavaScript">
	var index;
	var id_list = ["txtDocumentComment", "txtCreator", "txtAreaCreatorComment", "txtPackageVersion", "txtPackageSupplier", "txtPackageOriginator", "txtPackageDownalodLocation", "txtPackageHomePage", "txtPackageSourceInfo", "txtPackageLicenseComments", "txtPackageDescription", "selectScanOption"];
	var form_elements = document.getElementsByClassName('form-group')
	var doc_elements = document.getElementsByClassName('doc-group')

	
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
	
	function toggleFormView(style) {
		window.scrollTo(0, 0);
		for (index = 0; index < form_elements.length; ++index) {
    		form_elements[index].style.display = style;
		}
	}

	function toggleDocView(style) {
		window.scrollTo(0, 0);
		for (index = 0; index < doc_elements.length; ++index) {
    		doc_elements[index].style.display = style;
		}
	}
</SCRIPT>
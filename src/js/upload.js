<SCRIPT LANGUAGE="JavaScript">
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
</SCRIPT>
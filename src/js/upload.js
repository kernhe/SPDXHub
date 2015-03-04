<SCRIPT LANGUAGE="JavaScript">
	var index;
	var id_list = ["txtDocumentComment", "txtCreator", "txtAreaCreatorComment", "txtPackageVersion", "txtPackageSupplier", "txtPackageOriginator", "txtPackageDownalodLocation", "txtPackageHomePage", "txtPackageSourceInfo", "txtPackageLicenseComments", "txtPackageDescription", "selectScanOption"];
	var form_elements = document.getElementsByClassName('form-group')
	var doc_elements = document.getElementsByClassName('doc-group')

	
	function enableForm() {
		document.getElementById("submit").disabled = false;
		for (index = 0; index < id_list.length; ++index) {
    			document.getElementById(id_list[index]).disabled = false;
		}
	}
	function disableForm() {
		window.scrollTo(0, 0);
		document.getElementById("fileDocumentFile").disabled = false;
		document.getElementById("filePackageFile").disabled = false;
		document.getElementById("submit").disabled = true;
		for (index = 0; index < id_list.length; ++index) {
    		document.getElementById(id_list[index]).disabled = true;
		}
	}
	
	function toggleFormView(style) {
		window.scrollTo(0, 0);
			$('.form-group').each(function(i, obj) {
			 	this.style.display = style;
			});
	}

	function toggleDocView(style) {
		window.scrollTo(0, 0);
		$('.doc-group').each(function(i, obj) {
		 	this.style.display = style;
		});
	}

</SCRIPT>
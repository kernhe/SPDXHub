<?php
    function upload_file($docFilePath) {
		$file = file_get_contents($docFilePath);
		echo $file;
    }
?>

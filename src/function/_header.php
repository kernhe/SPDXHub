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
<!DOCTYPE html>
<html lang="en" ng-app="dashApp">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title; ?></title>
        <link href="css/dashboard.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/upload_style.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/demo_table.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
         <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        
        <script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>
 
       <script type="text/javascript">
		
		// hide / show toggler for subparts in spdx_doc page
		$(document).ready(function(){
			$("#CreatingInfo").click(function(){
				$("#CreatingInfoContent").slideToggle();
			});
			$("#PackInfo").click(function(){
				$("#PackInfoContent").slideToggle();
			});
			$("#tfiles").click(function(){
				$("#tfilesContent").slideToggle();
			});
			$("#License").click(function(){
				$("#LicenseContent").slideToggle();
			});
			$("#Relation").click(function(){
				$("#RelationContent").slideToggle();
			});
			$("#Annotations").click(function(){
				$("#AnnotationsContent").slideToggle();
			});
		});
		</script>
   </head>
    

<body>
    <!-- 


    Please leave header as is for now. I need to figure out how to make the navigation work correctly. 


     -->
    <header class="navbar navbar-default navbar-fixed-top bs-docs-nav" id="top" role="banner" > 
        <div class="container">
            <div class="navbar-header">
              <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <nav class="collapse navbar-collapse bs-navbar-collapse"><!-- navbar-collapse  -->
                <ul class="nav navbar-nav">
                 	<li><a href="index.php">Home</a></li>
                 	<li><a href="https://fossologyspdx.ist.unomaha.edu/" target="_blank">Fossology+SPDX</a></li>
                 	<li><a href="About.php">About</a></li>   
                </ul>
                <a class="upload btn btn-primary navbar-upload pull-right" role="button" href="upload.php">Upload</a>
            </nav>
        </div>
    </header>
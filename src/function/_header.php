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
		<script src="js/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/jquery-ui.js" type="text/javascript"></script>    
        <script src="js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
       <script type="text/javascript">
		$(document).ready(function(){
						$.datepicker.regional[""].dateFormat = 'dd/mm/yy';
						$.datepicker.setDefaults($.datepicker.regional['']);
			 $('#mytablesorter').dataTable({
				
				"aoColumns": [ null,
					{ "sWidth": "200px" },
					null,null, null,
					null
				]
			} )
				  .columnFilter({ sPlaceHolder: "head:before",
					aoColumns: [ null,null,
							 { type: "date-range" },
							{ type: "date-range"  },null,null
						]
		
				});
		});

		</script>
   </head>
    <body>
        
        <div class="navbar navbar-default navbar-static-top">
            <div class="navbar-inner">
               <div class="container-fluid">
                   <a class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                    </a>
                    <div class="container-fluid nav-collapse">
                        <ul class="nav">
                     	<li><a class="navbar-brand" href="index.php">Home</a></li>
                     	<li><a class="navbar-brand" href="https://fossologyspdx.ist.unomaha.edu/" target="_blank">Fossology+SPDX</a></li>
                     	<li><a class="navbar-brand" href="About.php">About</a></li>   
                     	<li><a class="navbar-brand navbar-upload" href="upload.php">Upload</a></li>   
                        </ul>
                    </div>
                </div>
            </div>
        </div>
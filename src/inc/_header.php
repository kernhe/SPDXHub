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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title; ?></title>
        <link href="css/dashboard.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
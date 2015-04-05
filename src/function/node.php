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
(isset($_POST['scan_option']) ? $_POST['scan_option'] : null);
-->
<?php
	class Node{
		 
		private $value;
		private $parentNode;
		private $path='';
		private $childNodes = array();
	
	
		public function __construct( ) {
	
		}
	
		public function getValue(){
			return $this->value;
		}
		 
		public function setValue($value){
			$this->value = $value;
			if($this->parentNode != null){
				$path = $this->parentNode->path.'/'.$value;
			}
		}
		 
		public function getParent(){
			return $this->parentNode;
		}
		 
		public function setParent($parent){
			$this->parentNode = $parent;
			$parent->addChild($this);
			if($this->value != null){
				$this->path = $this->parentNode->path.'/'.$this->value;
			}
		}
		 
		public function getPath(){
			return $this->path;
		}
		 
		public function setPath($path){
			$this->path = $path;
		}
		public function getChildNodes(){
			return $this->childNodes;
		}
		 
		public function hasChildNodes(){
			if($this->childNodes != null && count($this->childNodes) > 0)
				return true;
			return false;
		}
		 
		public function addChild($childNode){
			array_push($this->childNodes,$childNode);
		}
		 
		public  function getChildWithvalue($value){
			if(count($this->childNodes) == 0)
				return null;
			foreach($this->childNodes as $childNode){
				if($childNode->value == $value){
					return $childNode;
				}
			}
		}
	}
?>
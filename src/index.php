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
  $title = "SPDX";
  include("function/_header.php");
  include("function/spdx_doc.php");
  include("function/license.php");
  $name = "";
  if(array_key_exists('doc_name',$_POST)) {
    $name = $_POST['doc_name'];
  }
?>

<div class="container search">
  
  <div class="col-xs-12 search-inner">
    <form class="" action="index.php" method="post" >
      <input type="search" class="form-control" placeholder="Search" value="<?php echo $name; ?>" name="doc_name"/>
      <button type="submit" class="btn btn-default">Search</button>
  	</form>
  </div>

</div>

<div class="container adv-search"> 
  <div  class="col-xs-12 bkg"> 
    
    <div class="col-xs-12 adv-search-header">
      <h4>Advanced Search</h4>
    </div>
    
    <div class="col-xs-12 adv-search-inner">
      
      <div class="col-xs-12 col-md-6  ">
        <h5>Licences</h5>
        <form>
          <ul class="license-filter">
            <li>
              <input id="" name="outline" type="checkbox" value="1" />
              <label title="SPDX approved" for="">SPDX approved</label>
            </li>
            <li>
              <input id="" name="No200" type="checkbox" value="1" />
              <label title="SPDX Not Approved" for="">SPDX Not Approved</label>
            </li>
            <li>
              <input id="uri-verbose2" name="" type="checkbox" value="1" />
              <label title="Not in SPDX list" for="">Not in SPDX list</label>
            </li>
          </ul>
        </form>
      </div>

      <div class="col-xs-12 col-md-6">   
        
        <h5>Identifier</strong></h><span id="identifier">Identifier</span> 
        
        <select class="LicenseListDropDown" name="charset">
          <option value="(license identifier)" selected="selected">license name</option>
          <?php
          $resultlist = getSPDX_LicenseList();
            while($row = mysql_fetch_assoc($resultlist)) {
              echo '<option value="' . $row['license_identifier'] . '">';
              echo $row['license_fullname'];
              echo '</option>';
             }
          ?>
        </select>                
      </div>
    </div>

  </div>
</div>
        
<div class="container">
 	<div class="col-xs-12">	 
       
    <table id="tablesorter" class="table table-striped  display"> <!-- table-striped -->
        
        <thead> 
          <tr>
            <th>#</th>
            <th>Document Name</th>
            <th>Created on</th>
            <th>Licences</th>
            <th>Action</th>
          </tr>
        </thead>
  
        <tbody>
          <?php
            
            $result = getSPDX_DocList($name);
            $count = 0;
            while($row = mysql_fetch_assoc($result)) {
                $approval = getLicenseApproval_Count($row['spdx_pk']);
                $row_2 = mysql_fetch_assoc($approval);
                if ($row_2['approvalCount'] == NULL){
                	$row_2['approvalCount'] = 0;
                }
                
                $disapproval = getLicenseDisapproval_Count($row['spdx_pk']);
                $row_3 = mysql_fetch_assoc($disapproval);
                if ($row_3['disapprovalCount'] == NULL){
                	$row_3['disapprovalCount'] = 0;
                }
                
                echo '<tr>';
                echo     '<td>';
                echo         ++$count; //$row['spdx_pk']
                echo     '</td>';
                echo     '<td>';
                echo         '<a  class="document-name" href="spdx_doc.php?doc_id=' . $row['spdx_pk'] . '">' . $row['document_name'] . '</a>';
                echo     '</td>';
                echo     '<td>';
                echo         date('m/d/Y', strtotime($row['created_date'])); 
                echo     '</td>'; 
                
				echo '<td id="breakdown">';
                echo 	'<div>';
                echo 		'<span class="b-one">' . $row_2['approvalCount'] . '</span>';
                echo 		'<span class="b-two">' . $row_3['disapprovalCount'] . '</span>';
                echo 		'<span class="b-three">0</span>';
                echo 	'</div>';
                echo '</td>';

                echo     '<td id="action">';
                echo         '<div>';
                echo             '<button type="button" class="btn btn-info" onclick="window.location=\'spdx_doc.php?doc_id=' . $row['spdx_pk'] . '\'">View Details</button>';
                echo             '<button type="button" class="btn btn-default" onclick="window.open(\'download.php?doc_id=' . $row['spdx_pk'] . '&format=RDF&doc_name=' . $row['document_name'] . '\',\'_blank\');">Download RDF</button>';
                echo             '<button type="button" class="btn btn-default" onclick="window.open(\'.php?doc_id=' . $row['spdx_pk'] . '&format=TAG&doc_name=' . $row['document_name'] . '\',\'_blank\');">Download TAG</button>';
                echo         '</div>';
                echo     '</td>';
                echo '</tr>';
            }
          ?>
        </tbody>
    </table>


  </div>     
</div>
 

<?php include("function/_footer.php"); ?>

<script>


  $( ".LicenseListDropDown" )
    .change(function () {
      var str = "";
      $( "select option:selected" ).each(function() {
        str += $( this ).val() + " ";
      });
      $( "#identifier" ).text( str );
    }).change();
</script>
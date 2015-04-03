<div class="container" >

  <div class="col-xs-12 blue-bord" style="height: 50px">
<?php
    $title = "SPDX";
    include("function/_header.php");
    include("function/spdx_doc.php");
    $name = "";
    if(array_key_exists('doc_name',$_POST)) {
    	$name = $_POST['doc_name'];
    }
?>
    
  </div>


  <div class="col-xs-12 col-md-6 red-bord">
       <form action="index.php" method="post" >
    		<input type="text" class="" size="60" tabindex="2" autofocus="autofocus" placeholder="Search" value="<?php 		echo $name; ?>" name="doc_name"/>
    		<button type="submit" class="btn pull-right">Search</button>
    	</form>
  </div>
  
  <div class="col-xs-12 blue-bord">
    <h4 class="search-header">Advanced Search</h4>
  </div>

  <div class="col-xs-12 col-md-6 red-bord">   
    <h6>Identifier</strong></h6>
    <div id="identifier">Identifier</div> 
    
    <select class="LicenseListDropDown" name="charset">
      <option value="(license identifier)" selected="selected">license name</option>
      <?php
      $resultlist = getSPDX_LicenseList();
        while($row = mysql_fetch_assoc($resultlist)) {
          echo '<option value="' . $row['license_identifier'] . '">';
          echo         $row['license_fullname'];
          echo '</option>';
         }
      ?>
    </select>                

<<<<<<< HEAD

=======
    <div><strong>Identifier</strong></div>
    <div id="identifier">Identifier</div> 
>>>>>>> 24fe6ef1519c7a6ba266dbcfe46da778030408eb
  </div>


  <div class="col-xs-12 col-md-6  red-bord">
    <form>
      <h5>Licences</h5>
      <!-- <label for="uri-charset"><strong>Licences</strong></label> -->

      <input id="" name="outline" type="checkbox" value="1" />
      <label title="SPDX approved" for="">SPDX approved</label>

      <input id="" name="No200" type="checkbox" value="1" />
      <label title="SPDX Not Approved" for="">SPDX Not Approved</label>

      <input id="uri-verbose2" name="" type="checkbox" value="1" />
      <label title="Not in SPDX list" for="">Not in SPDX list</label>
    </form>
  </div>
 
</div>

<div class="container">
  <div class="col-xs-12">  
    
  </div>
</div>
        
<div class="container">
 	<div class="col-xs-12">	 
       
    <table id="tablesorter" class="table display">
        <thead> 
          <tr>
            <th>#</th>
            <th>Document Name</th>
            <th>Created on</th>
            <!-- <th>Last updated</th> -->
            <th>Licences</th>
            <th>Action</th>
          </tr>
        </thead>
  
        <tbody>
        <?php
          
          $result = getSPDX_DocList($name);
                    while($row = mysql_fetch_assoc($result)) {
                        echo '<tr>';
                        echo     '<td>';
                        echo         $row['spdx_pk'];
                        echo     '</td>';
                        echo     '<td>';
                        echo         '<a href="spdx_doc.php?doc_id=' . $row['spdx_pk'] . '">' . $row['document_name'] . '</a>';
                        echo     '</td>';
                        echo     '<td>';
                        echo         date('m/d/Y', strtotime($row['created_date'])); 
                        echo     '</td>';
						echo     '<td>';
						echo         '<img src="../src/images/flags.jpg" width="83" height="26" />';
						echo     '</td>';
                        echo     '<td style="text-align:right;">';
                        echo         '<div>';
                        echo             '<button type="button" class="btn" onclick="window.open(\'download.php?doc_id=' . $row['spdx_pk'] . '&format=RDF&doc_name=' . $row['document_name'] . '\',\'_blank\');">Download RDF</button>';
                        echo             '<button type="button" class="btn" onclick="window.open(\'download.php?doc_id=' . $row['spdx_pk'] . '&format=TAG&doc_name=' . $row['document_name'] . '\',\'_blank\');">Download TAG</button>';
                        echo             '<button type="button" class="btn" onclick="window.open(\'download.php?doc_id=' . $row['spdx_pk'] . '&format=JSON&doc_name=' . $row['document_name'] . '\',\'_blank\');">Download JSON</button>';
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
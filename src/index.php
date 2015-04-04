
<?php
  $title = "SPDX";
  include("function/_header.php");
  include("function/spdx_doc.php");
  $name = "";
  if(array_key_exists('doc_name',$_POST)) {
    $name = $_POST['doc_name'];
  }
?>

<div class="container search">
  
  <div class="col-xs-12">
    <h4 class="search-header">Advanced Search</h4>
  </div>

  <div class="col-xs-12 search-inner">
    <form class="" action="index.php" method="post" >
    	<span class="col-xs-10 col-sm-8 col-md-6"><!-- autofocus="autofocus" -->
        <input type="search" class="form-control" placeholder="Search" value="<?php echo $name; ?>" name="doc_name"/>
        <button type="submit" class="btn pull-right">Search</button>
      </span>
  	</form>
  </div>

</div>

<div class="container adv-search"> 
    
  <div class="col-xs-12">
   <!--  <form>
      <input type="text" />
      <button type="submit">Search</button>
    </form> -->

    <h4 class="search-header">Advanced Search</h4>
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
        
<div class="container">
 	<div class="col-xs-12">	 
       
    <table id="tablesorter" class="table table-striped table-hover display">
        
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
                echo     '</td>'; ?>
		            <!-- '<img src="../src/images/flags.jpg" width="83" height="26" />';  -->
                  <td id="breakdown">
                    <div>
                      <span class="b-one"></span>
                      <span class="b-two"></span>
                      <span class="b-three"></span>
                    </div>
                  </td>
                <?php
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
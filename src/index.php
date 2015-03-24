    <?php
    $title = "SPDX";
    include("function/_header.php");
    include("function/spdx_doc.php");
    $name = "";
	$date_cr_fr = "";
	$date_cr_to = "";
	$date_md_fr = "";
	$date_md_to = "";
    if(array_key_exists('doc_name',$_POST)) {
    	$name = $_POST['doc_name'];
    }
	if(array_key_exists('datepicker1',$_POST)) {
    	$name = $_POST['datepicker1'];
    }
	 if(array_key_exists('datepicker2',$_POST)) {
    	$name = $_POST['datepicker2'];
    }
	if(array_key_exists('datepicker3',$_POST)) {
    	$name = $_POST['datepicker3'];
    }
	 if(array_key_exists('datepicker4',$_POST)) {
    	$name = $_POST['datepicker4'];
    }
	
?>
    

    <div class="container">

      <div class="row search-block">
        
        <div class="col-sm-6">
       
        
          <form action="index.php" method="post" >
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for..." value="<?php echo $name; ?>" name="doc_name"/>
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
              </span>
            </div>
           </form>
          
          <div class="col-sm-6">
            <label class="switch">
              <input type="checkbox" class="switch-input">
              <span class="switch-label" data-on="On" data-off="Off">Name</span>
              <span class="switch-handle">License</span>
            </label>
          </div>
          <div class="col-sm-12">
            <div class="draw-line"></div>
          </div>
    
     
      
      <div class="row">
      </div>



       <div class="col-sm-12">
            
              <legend id="moreOptions"><img src="images/arrow-closed.png" /> More Options</legend>
				<form action="index.php" method="post" >
                <table id="toggleTable">
                    <tbody>

                      <tr>
                        <td colspan="5"><label for="uri-charset"><strong>Licences</strong></label></td>

                     <input type="radio" name="group" id="urigroup_no" value="0" checked="checked" />
                    <label for="docnumber">Document Name</label>
                    <input type="radio" name="group" id="docnumber" value="1" />
                    <label for="docnumname">Document ID</label>
                    <label for="uri-charset"><strong>Licences</strong></label></td>

                      </tr>
                      <tr>
                        <td><input id="" name="outline" type="checkbox" value="1" />
                            <label title="SPDX approved" for="">SPDX approved</label></td>
                        <td colspan="2"><input id="" name="No200" type="checkbox" value="1" />
                            <label title="SPDX Not Approved" for="">SPDX Not Approved</label></td>
                      <td width="170"><input id="uri-verbose2" name="" type="checkbox" value="1" />
                            <label title="Not in SPDX list" for="">Not in SPDX list</label></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th width="242"> License name</th>
                      <td colspan="2"><select class="LicenseListDropDown" name="charset">
                            <option value="(license identifier)" selected="selected">(license names)</option>
                            <?php
                       		 $resultlist = getSPDX_LicenseList();
                        		while($row = mysql_fetch_assoc($resultlist)) {
                          
									echo '<option value="' . $row['license_identifier'] . '">';
									echo         $row['license_fullname'];
									echo     '</option>';
                      	 		 }
                        ?>
                          </select>                        </td>
                        <td><div align="center"><strong>Identifier</strong></div></td>
                        <td width="162"><div id="identifier">Identifier</div></td>
                      </tr>
                      <tr>
                        <th colspan="5">&nbsp;</th>
                      </tr>
                      <tr>
                        <th colspan="5"><table border="0">
                          <tr>
                            <td width="101"><strong>Date created</strong></td>
                            <td width="88">&nbsp;</td>
                            <td width="71"><strong>from</strong></td>
                            <td width="99"><input type="text" name="datepicker1" id="datepicker1" value = "<?php echo $date_cr_fr; ?>" /></td>
                            <td width="35"><div align="right"><strong>to </strong></div></td>
                            <td width="82"><input type="text" name="datepicker2" id="datepicker2" value = "<?php echo $date_cr_fr; ?>" /></td>
                          </tr>
                        </table></th>
                      </tr>
                      <tr>
                        <th colspan="5"><table border="0">
                          <tr>
                            <td width="101"><strong>Last edited</strong></td>
                            <td width="88">&nbsp;</td>
                            <td width="71"><strong>from</strong></td>
                            <td width="99"><input type="text" id="datepicker3" value = "<?php echo $date_md_fr; ?>"></td>
                            <td width="35"><div align="right"><strong>to </strong></div></td>
                            <td width="82"><input type="text" id="datepicker4" value = "<?php echo $date_md_to; ?>"></td>
                          </tr>
                        </table>  <p align="right">
        <button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-refresh"></span> Refresh
        </button>
      </p>                     </th>
                      </tr>
                    </tbody>
                  </table></form> 
               
                <br />
                <div class="col-sm-12">
                <div class="draw-line"></div>
              </div>
                </div>
              </fieldset>
            </div></td>
          </tr>
          <tr> 
        

      <div class="row">
        <div class="col-sm-12">
          <table class="table table-striped  table-responsive sortable">
            
            <thead>
              <tr>
              	<th>#</th>
                <th>Document Name</th>
                <th>Created on</th>
                <th>Last updated</th>
                <th class="sorttable_nosort">Licences</th>
                <th class="sorttable_nosort" align="center">Action</th>
              </tr>
            </thead> 

            <tbody>
              <?php
                $count = 0;
                $result = getSPDX_DocList($name, $date_cr_fr, $date_cr_to , $date_md_fr ,$date_md_to);
                while(($row = mysql_fetch_assoc($result)) && $count < 10) {
                    echo '<tr>';
					echo     '<td>';
                    echo       $count+1;
                    echo     '</td>';
                    echo     '<td>';
                    echo         '<a href="spdx_doc.php?doc_id=' . $row['id'] . '">' . $row['upload_file_name'] . '</a>';
                    echo     '</td>';
                    echo     '<td>';
                    echo         date('m/d/Y', strtotime($row['created_at'])); 
                    echo     '</td>';
					echo     '<td>';
                    echo         date('m/d/Y', strtotime($row['updated_at'])); 
                    echo     '</td>';
			        echo     '<td>';
                    echo         '<img src="../src/images/flags.jpg" width="83" height="26" />';
                    echo     '</td>';
                    echo     '<td>';
                    echo         '<div>';
                    echo             '<button type="button" class="btn" onclick="window.location=\'spdx_doc.php?doc_id=' . $row['id'] . '\'">View Details</button>';
                    echo             '<button type="button" class="btn">Download</button>'; 
                    echo         '</div>';
                    echo     '</td>';
                    echo '</tr>';

                    $count++;
                }
                ?>
            </tbody>
          </table>
        </div>
      </div>

        <?php include("function/_footer.php"); ?>

	<script>
			$("#toggleTable").hide();
			$(document).ready(function(){
				$("#moreOptions").click(function(){
					$("#toggleTable").toggle();
				});

			});
			

$( ".LicenseListDropDown" )
  .change(function () {
    var str = "";
    $( "select option:selected" ).each(function() {
      str += $( this ).val() + " ";
    });
    $( "#identifier" ).text( str );
  })
  .change();
</script>
<script>
function myFunction() {
    var x = document.getElementById("myBtn").value;
    document.getElementById("demo").innerHTML = x;
}
</script>
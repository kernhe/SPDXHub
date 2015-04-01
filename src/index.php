<?php
    $title = "SPDX";
    include("function/_header.php");
    include("function/spdx_doc.php");
    $name = "";

    if(array_key_exists('document_name',$_POST)) {
    	$name = $_POST['document_name'];
    }
?>
<legend id="moreOptions"><img src="images/arrow-closed.png" /> More Options</legend>
			
<table id="toggleTable">
                    <tbody>

                      <tr>
                        <td colspan="5"><label for="uri-charset"><strong>Licences</strong></label></td>
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
                        <th width="242">License name</th>
                      <td colspan="2"><select class="LicenseListDropDown" name="charset">
                            <option value="(license identifier)" selected="selected">(license names)</option>
                            <?php
                       		 $resultlist = getSPDX_LicenseList();
                        		while($row = mysql_fetch_assoc($resultlist)) {
                          
									echo '<option value="' . $row['license_identifier'] . '">';
									echo         $row['license_fullname'];
									echo '</option>';
                      	 		 }
                        ?>
                          </select>                        </td>
                        <td><div align="center"><strong>Identifier</strong></div></td>
                        <td width="140"><div id="identifier">Identifier</div></td>
                      </tr>
                     
                     
                    </tbody>
</table>
        

          <br />
<div id="container">
 			 <table id = "mytablesorter" class="display">
            
            <thead>
              <tr>
              	<th></th>
                <th style="width:200px"></th>
                <th style="width:150px">Created on</th>
                <th style="width:150px">Last updated</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
              <tr>
              	<th>#</th>
                <th>Document Name</th>
                <th>Created on</th>
                <th>Last updated</th>
                <th>Licences</th>
                <th>Action</th>
              </tr>
            </thead>  

            <tbody>
              <?php
                $count = 0;
				
				$result = getSPDX_DocList($name);
				
                while($row = mysql_fetch_assoc($result)) {
                    echo '<tr>';
					echo     '<td>';
                    echo       $count+1;
                    echo     '</td>';
                    echo     '<td>';
                    echo         '<a href="spdx_doc.php?doc_id=' . $row['spdx_pk'] . '">' . $row['document_name'] . '</a>';
                    echo     '</td>';
                    echo     '<td>';
                    echo         date('m/d/Y', strtotime($row['created_date'])); 
                    echo     '</td>';
					echo     '<td>';
                    echo         date('m/d/Y', strtotime($row['created_date'])); 
                    echo     '</td>';
			        echo     '<td>';
                    echo         '<img src="../src/images/flags.jpg" width="83" height="26" />';
                    echo     '</td>';
                    echo     '<td>';
                    echo         '<div>';
                    echo             '<button type="button" class="btn" onclick="window.location=\'spdx_doc.php?doc_id=' . $row['spdx_pk'] . '\'">View Details</button>';
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
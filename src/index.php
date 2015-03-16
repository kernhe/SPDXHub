    <?php
    $title = "SPDX";
    include("inc/_header.php");
    include("function/spdx_doc.php");
    $name = "";
    if(array_key_exists('doc_name',$_POST)) {
    	$name = $_POST['doc_name'];
    }
?>
    <!-- <button type="button" class="btn btn-primary" onclick="window.location='upload.php'" style="display:inline-block;width:11.5%;margin-left:10px;">Upload Package</button> -->

    <div class="container">

        <table width="100%" border="0">
          <tr>
            <td><div class="row search-block">
              <div class="col-sm-12">
                <form action="index.php" method="post" >
                  <!-- style="width:100%;" -->
                  <input type="text" class="form-control " tabindex="2" autofocus="autofocus" placeholder="Search" value="<?php echo $name; ?>" name="doc_name"/>
                  <!-- style="display:inline-block;width:70%;"  -->
                  <button type="submit" class="btn pull-right">Search</button>
                </form>
                <div class="draw-line"></div>
              </div>
              <div class="col-sm-12">
                <div class="draw-line"></div>
              </div>
              <br />
            </div></td>
          </tr>
          <tr>
            <td><div class="col-sm-12">
            
              <legend id="moreOptions"><img src="images/arrow-closed.png" /> More Options</legend>

                <div class="row">
                <table id="toggleTable">
                    <tbody>
                      <tr>
                        <td colspan="5"><input type="radio" name="group" id="group_no" value="0" checked="checked" />
                            <label for="docnumber">Document Name</label>
                            <input type="radio" name="group" id="docnumber" value="1" />
                            <label for="docnumname">License Name</label></td>
                      </tr>
                      <tr>
                        <td colspan="5"><label for="uri-charset"><strong>Licences</strong></label></td>
                      </tr>
                      <tr>
                        <td><input id="uri-outline" name="outline" type="checkbox" value="1" />
                            <label title="Show an Outline of the document" for="uri-outline">SPDX approved</label></td>
                        <td colspan="2"><input id="uri-No200" name="No200" type="checkbox" value="1" />
                            <label title="Validate also pages for which the HTTP status code indicates an error" for="uri-No200">SPDX Not Approved</label></td>
                      <td width="170"><input id="uri-verbose2" name="uri-verbose" type="checkbox" value="1" />
                            <label title="Verbose Output" for="uri-verbose2">Not in SPDX list</label></td>
                        <td><label title="Verbose Output" for="uri-verbose"></label></td>
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
                            <td width="99"><input type="text" id="datepicker1" value = "mm/dd/yyyy" /></td>
                            <td width="35"><div align="right"><strong>to </strong></div></td>
                            <td width="82"><input type="text" id="datepicker2" value = "mm/dd/yyyy" /></td>
                          </tr>
                        </table></th>
                      </tr>
                      <tr>
                        <th colspan="5"><table border="0">
                          <tr>
                            <td width="101"><strong>Last edited</strong></td>
                            <td width="88">&nbsp;</td>
                            <td width="71"><strong>from</strong></td>
                            <td width="99"><input type="text" id="datepicker3" value = "mm/dd/yyyy"></td>
                            <td width="35"><div align="right"><strong>to </strong></div></td>
                            <td width="82"><input type="text" id="datepicker4" value = "mm/dd/yyyy"></td>
                          </tr>
                        </table>                        </th>
                      </tr>
                    </tbody>
                  </table>
                
                <br />
                <div class="col-sm-12">
                <div class="draw-line"></div>
              </div>
                </div>
              </fieldset>
            </div></td>
          </tr>
          <tr>
            <td><div class="row">
              <div class="row">
                <div class="col-sm-12">
                  <table width = "100%" class="sortable">
                    <thead>
                      <tr bgcolor="#00FFFF">
                        <th width="19%">Document #</th>
                        <th width="29%">Document Name</th>
                        <th width="15%">Created On</th>
                        <th width="14%" class="sorttable_nosort">Licences</th>
                        <th width="23%" class="sorttable_nosort" align="center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $count = 0;
                        $result = getSPDX_DocList($name);
                        while(($row = mysql_fetch_assoc($result)) && $count < 10) {
                            echo '<tr>';
                            echo     '<td>';
                            echo         $row['id'];
                            echo     '</td>';
                            echo     '<td>';
                            echo         '<a href="spdx_doc.php?doc_id=' . $row['id'] . '">' . $row['upload_file_name'] . '</a>';
                            echo     '</td>';
                            echo     '<td>';
                            echo         date('m/d/Y', strtotime($row['created_at'])); 
                            echo     '</td>';
							echo     '<td>';
                            echo         '<img src="../src/images/flags.jpg" width="83" height="26" />';
                            echo     '</td>';
                            echo     '<td style="text-align:right;">';
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
            </div></td>
          </tr>
        </table>

        <?php include("inc/_footer.php"); ?>

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